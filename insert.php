<?php
        $db_host = 'localhost'; // Server Name
        $db_user = 'root'; // Username
        $db_pass = ''; // Password
        $db_name = 'jqueryex'; // Database Name
       
$conn=mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$fname=$_POST["empName"];
$email=$_POST["empEmail"];
$contact=$_POST["empcontact"];
$sql="select * from users where ( email='$email');";

      $res=mysqli_query($conn,$sql);

      if (mysqli_num_rows($res) > 0) {
        
        $row = mysqli_fetch_assoc($res);
        if($email==isset($row['email']))
        {
                echo '<script>alert("email already exist")</script>';
        }
      }
else{

$sql = "INSERT INTO users (fullname,email,contactno,flag)
VALUES ('".$fname."', '".$email."', '".$contact."','1')";
$result = $conn->query($sql);
}

?>