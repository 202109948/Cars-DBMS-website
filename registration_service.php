<html>
<?php

$name = $_POST['name'];
$passaword = $_POST['passaword'];


$enc_pass = md5($passaword);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hasan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$select = "select * from `login` where username = '$name'";
$re = $conn->query($select);

if ($re->num_rows > 0){
    echo "Failed";
}
 else {

$sql = "insert into `login` (`username`, `password`) values('".$name."','".$enc_pass."')";
$result = $conn->query($sql);

echo "success";
}
?>
</html>