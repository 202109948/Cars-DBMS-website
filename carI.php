<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hasan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM car";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    foreach ($row as $key => $value) {
        $isForeignKey = isForeignKey($conn, 'car', $key);

        if ($isForeignKey) {
            $referenceTable = getForeignKeyReferenceTable($conn, 'car', $key);
            $options = getReferenceTableOptions($conn, $referenceTable);

            echo "<select class ='me-2'  id=\"$key\">";
echo "<option value='' selected disabled>Select $key</option>";
foreach ($options as $option) {
    echo "<option value=\"$option\">$option</option>";
}
echo "</select>";

        } else {
            echo "<input class ='me-2' type=\"text\" id=\"$key\" placeholder=\"$key\"/>";
        }
    }
    echo "<button class='Button' id=\"ex\">Insert</button>";
} else {
    echo "0 results";
}

$conn->close();

function isForeignKey($conn, $tableName, $columnName) {
    $query = "SHOW CREATE TABLE $tableName";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        return strpos($row['Create Table'], "FOREIGN KEY (`$columnName`)") !== false;
    }

    return false;
}

function getForeignKeyReferenceTable($conn, $tableName, $columnName) {
    $query = "SHOW CREATE TABLE $tableName";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $createTableStatement = $row['Create Table'];

        $matches = [];
        preg_match("/FOREIGN KEY \(`$columnName`\) REFERENCES `(.+?)`/", $createTableStatement, $matches);

        if (isset($matches[1])) {
            return $matches[1];
        }
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
                    $options[] = $row[$primaryKeyColumn];
                }
            }
        }
    }

    return $options;
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
?>

<script>
    $(document).ready(function(){
        $("#ex").click(function(){
            var data = {};
            $("select, input").each(function() {
                var id = $(this).attr("id");
                var value = $(this).val();
                data[id] = value;
            });

            $.post("carIn.php", data, function(response){
                $("#result").empty();
          $("#alert").empty().hide().html(response).fadeIn(500);
            });
        });
    });
</script>

</body>
</html>
