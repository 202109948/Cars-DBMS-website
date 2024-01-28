<html>
<head>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hasan";

$Cid = $_POST['Cid'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM customer WHERE id = '$Cid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='m-3'>";

    $row = $result->fetch_assoc();
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<th>$key</th>";
    }
    echo "</tr>";

    $result->data_seek(0); 
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<h3 style=\"color:black\">0 results</h3>";
}

$conn->close();
?>

</body>
</html>
