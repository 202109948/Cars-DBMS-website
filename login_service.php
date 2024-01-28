<?php
session_start();

$uname = $_POST['uname'];
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

$sql = "select * from `login` where username = '$uname' and password = '$enc_pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0){
    $_SESSION['username'] = $uname;
    echo "success";
} 
else{
    echo "error";
}
?>
