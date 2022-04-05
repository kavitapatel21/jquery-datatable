<?php
        $db_host = 'localhost'; // Server Name
        $db_user = 'root'; // Username
        $db_pass = ''; // Password
        $db_name = 'jqueryex'; // Database Name
       
$conn=mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$id  = $_POST["id"];
$fname=$_POST["name"];
$email=$_POST["email"];
$contact=$_POST["contact"];
$sql = "INSERT INTO users (fullname,email,contactno)
VALUES ('".$fname."', '".$email."', '".$contact."') SET flag=1 WHERE id='".$id."'";
$result = $conn->query($sql);


?>