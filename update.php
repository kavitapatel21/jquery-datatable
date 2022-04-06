<?php
        $db_host = 'localhost'; // Server Name
        $db_user = 'root'; // Username
        $db_pass = ''; // Password
        $db_name = 'jqueryex'; // Database Name
       
$conn=mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$request = 1;
//fetch data
if($request == 1){
    $id = 0;

    if(isset($_POST['id'])){
        $id = mysqli_escape_string($conn,$_POST['id']);
    }
    $record = mysqli_query($conn,"SELECT * FROM users WHERE id=".$id);
    $response = array();

    if(mysqli_num_rows($record) > 0){
        $row = mysqli_fetch_assoc($record);
        $response = array(
            "fullname" => $row['fullname'],
            "email" => $row['email'],
            "contactno" => $row['contactno'],
        );    
echo json_encode( array("status" => 1,"data" => $response) );
        exit;
    }else{
        echo json_encode( array("status" => 0) );
        exit;
    }
}

// Update user
if($request == 2){
    $id = 0;
    echo $request;
    if(isset($_POST['id'])){
        $id = mysqli_escape_string($conn,$_POST['id']);
    }

    // Check id
    $record = mysqli_query($conn,"SELECT id FROM users WHERE id=".$id);
    if(mysqli_num_rows($record) > 0){

        $fullname = mysqli_escape_string($conn,trim($_POST['fullname']));
        $email = mysqli_escape_string($conn,trim($_POST['email']));
        $contactno = mysqli_escape_string($conn,trim($_POST['contactno']));

        if( $name != '' && $email != '' && $contactno != ''){

           $query= mysqli_query($conn,"UPDATE users SET fullname='".$fullname."',email='".$email."',contactno='".$contactno."' WHERE id=".$id);
            echo $query;
            echo json_encode( array("status" => 1,"message" => "Record updated.") );
            exit;
        }else{
            echo json_encode( array("status" => 0,"message" => "Please fill all fields.") );
            exit;
        }
        
    }else{
        echo json_encode( array("status" => 0,"message" => "Invalid ID.") );
        exit;
    }
}
?>