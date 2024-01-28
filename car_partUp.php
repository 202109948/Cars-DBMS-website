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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['carName']) && !empty($_POST['carName'])) {
 
        $carName = $conn->real_escape_string($_POST['carName']);

        $updateQuery = "UPDATE car_part SET ";
        $validData = true; 

        foreach ($_POST as $key => $value) {

            if ($key !== 'carName' && !empty($value)) {
                $expectedType = getColumnType($conn, 'car_part', $key);
                if ($expectedType) {
                    if (!isValidDataType($value, $expectedType)) {
                        $validData = false;
                        echo "Invalid data type for $key. Expected type: $expectedType.<br>";
                        break;
                    }

                    $escapedValue = $conn->real_escape_string($value);
                    $updateQuery .= "$key = '$escapedValue', ";
                } else {
                    echo "Error fetching column information for $key.<br>";
                    $validData = false;
                    break;
                }
            }
        }

        if ($validData) {

            $updateQuery = rtrim($updateQuery, ', ');

            $updateQuery .= " WHERE car = '$carName';";

            $conn->query($updateQuery);

            if ($conn->affected_rows > 0) {
                echo "Record updated successfully";
            } else {
                echo "No records updated. carName does not exist.";
            }
        }
    } else {
        echo "The car name not set";
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
        case 'decimal':
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