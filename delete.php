<?php
        $db_host = 'localhost'; // Server Name
        $db_user = 'root'; // Username
        $db_pass = ''; // Password
        $db_name = 'jqueryex'; // Database Name
       
$conn=mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$id  = $_POST["id"];

$sql = "UPDATE users SET flag=0 WHERE id = '".$id."'";
$result = $conn->query($sql);
?>
