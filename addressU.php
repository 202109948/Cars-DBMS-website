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

$sql = "SELECT * FROM address";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    foreach ($row as $key => $value) {
        echo "<input class='me-2' type=\"text\" id=\"$key\" placeholder=\"$key\"/>";   
    }
    echo "<button class='Button' id=\"ex\">Update</button>";
} else {
    echo "0 results";
}

$conn->close();
?>

<script>
    $(document).ready(function(){
        $("#ex").click(function(){
            var data = {};
            $("input").each(function() {
                var id = $(this).attr("id");
                var value = $(this).val();
                data[id] = value;
            });

            $.post("addressup.php", data, function(response){
                $("#result").empty();
          $("#alert").empty().hide().html(response).fadeIn(500);
            });
        });
    });
</script>

</body>
</html>
