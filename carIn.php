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

function getNumberOfColumns($conn, $tableName) {
    $query = "SHOW COLUMNS FROM $tableName";
    $result = $conn->query($query);

    if ($result) {
        return $result->num_rows;
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $columnNames = [];
    $columnValues = [];
    $columns = getNumberOfColumns($conn, "car");

    foreach ($_POST as $key => $value) {
        if (!empty($value) && $key != 'carName') {
            $expectedType = getColumnType($conn, 'car', $key);

            if ($expectedType) {
                if (!isValidDataType($value, $expectedType)) {
                    die("Invalid data type for $key. Expected type: $expectedType.");
                }
            } else {
                die("Error fetching column information for $key.");
            }

            $columnNames[] = $key;
            $columnValues[] = "'" . $conn->real_escape_string($value) . "'";
        }
    }
    
    if (!empty($columnNames) && !empty($columnValues)) {
        $primaryKeyColumn = getPrimaryKeyColumn($conn, 'car');
        $primaryKeyValue = $_POST[$primaryKeyColumn];

        if (primaryKeyExists($conn, 'car', $primaryKeyColumn, $primaryKeyValue)) {
            echo "Record with the same primary key already exists.";
        } 
        else if(count($columnValues) != $columns){
            echo "Make sure to fill all the blanks. <br>";
    }
            else {
            $columnNamesString = implode(', ', $columnNames);
            $columnValuesString = implode(', ', $columnValues);

            $insertQuery = "INSERT INTO car ($columnNamesString) VALUES ($columnValuesString)";
            $conn->query($insertQuery);

            if ($conn->affected_rows > 0) {
                echo "Record inserted successfully";
            } else {
                echo "Failed to insert record.";
            }
        }
    } else {
        echo "No valid data provided.";
    }
} else {
    echo "Invalid request method";
}

$conn->close();

function getPrimaryKeyColumn($conn, $tableName) {
    $query = "SHOW KEYS FROM $tableName WHERE Key_name = 'PRIMARY'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['Column_name'];
    }

    return null;
}

function primaryKeyExists($conn, $tableName, $primaryKeyColumn, $primaryKeyValue) {
    $query = "SELECT 1 FROM $tableName WHERE $primaryKeyColumn = '$primaryKeyValue' LIMIT 1";
    $result = $conn->query($query);

    return ($result->num_rows > 0);
}
?>
