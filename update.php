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
?>