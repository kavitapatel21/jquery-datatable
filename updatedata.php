<?php
        $db_host = 'localhost'; // Server Name
        $db_user = 'root'; // Username
        $db_pass = ''; // Password
        $db_name = 'jqueryex'; // Database Name
       
$conn=mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$id = 0;
// echo $request;
 if(isset($_POST['id'])){
     $id = mysqli_escape_string($conn,$_POST['id']);
 }

 // Check id
 $record = mysqli_query($conn,"SELECT id FROM users WHERE id=".$id);
 if(mysqli_num_rows($record) > 0){
   // echo 'hi';
     $fullname = mysqli_escape_string($conn,trim($_POST['fullname']));
     $email = mysqli_escape_string($conn,trim($_POST['email']));
     $contactno = mysqli_escape_string($conn,trim($_POST['contactno']));
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

     if( $fullname != '' && $email != '' && $contactno != ''){

        $query= mysqli_query($conn,"UPDATE users SET fullname='".$fullname."',email='".$email."',contactno='".$contactno."' WHERE id=".$id);
        // echo $query;
         $result = $conn->query($query);
         echo json_encode( array("status" => 1,"message" => "Record updated.") );
         exit;
     }else{
         echo json_encode( array("status" => 0,"message" => "Please fill all fields.") );
         exit;
     }
    }
}
    ?>