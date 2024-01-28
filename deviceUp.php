<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hasan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getColumnType($conn, $tableName, $columnName) {
    $query = "SHOW COLUMNS FROM $tableName LIKE '$columnName'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        return $row['Type'];
    }

    return false;
}

function getPrimaryKeyColumn($conn, $tableName) {
    $query = "SHOW KEYS FROM $tableName WHERE Key_name = 'PRIMARY'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['Column_name'];
    }

    return null;
}

function getReferenceTableOptions($conn, $referenceTable) {
    $options = [];

    if ($referenceTable) {
        $primaryKeyColumn = getPrimaryKeyColumn($conn, $referenceTable);

        if ($primaryKeyColumn) {
            $query = "SELECT $primaryKeyColumn FROM $referenceTable";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $options[] = (int) $row[$primaryKeyColumn];
                }
            }
        }
    }

    return $options;
}

$pk = getPrimaryKeyColumn($conn, "device");
$options = getReferenceTableOptions($conn, "device");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['n']) && !empty($_POST['n'])) {
        $n = $conn->real_escape_string($_POST['n']);
        $updateQuery = "UPDATE device SET ";
        $validData = true;

        foreach ($_POST as $key => $value) {
            if ($key !== 'n' && !empty($value)) {
                $expectedType = getColumnType($conn, 'device', $key);

                if ($expectedType) {
                    if (!isValidDataType($value, $expectedType)) {
                        $validData = false;
                        echo "Invalid data type for $key. Expected type: $expectedType.<br>";
                        break;
                    }

                    if ($key == $pk && in_array($value, $options)) {
                        $validData = false;
                        echo "You have entered an already existing primary key: $value!<br>";
                        break;
                    }
                } else {
                    echo "Error fetching column information for $key.<br>";
                    $validData = false;
                    break;
                }

                $escapedValue = $conn->real_escape_string($value);
                $updateQuery .= "$key = '$escapedValue', ";
            }
        }

        if ($validData) {
            $updateQuery = rtrim($updateQuery, ', ');
            $updateQuery .= " WHERE no = '$n';";

            $conn->query($updateQuery);

            if ($conn->affected_rows > 0) {
                echo "Record updated successfully";
            } else {
                echo "No records updated. The device number you entered does not exist.";
            }
        } else {
            echo "Invalid data provided.";
        }
    } else {
        echo "The device number is not set";
    }
} else {
    echo "Invalid request method";
}

$conn->close();

function isValidDataType($value, $expectedType) {
    switch ($expectedType) {
        case 'int(11)':
        case 'tinyint':
        case 'smallint':
        case 'mediumint':
        case 'bigint':
            return is_numeric($value);
        case 'float':
        case 'double':
        case 'decimal(10.0)':
            return is_numeric($value) || is_float($value);
        case 'char':
        case 'varchar(20)':
        case 'text':
        case 'longtext':
            return is_string($value);
        default:
            return false;
    }
}
?>