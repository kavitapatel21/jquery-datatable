<?php
        $db_host = 'localhost'; // Server Name
        $db_user = 'root'; // Username
        $db_pass = ''; // Password
        $db_name = 'jqueryex'; // Database Name
       
$conn=mysqli_connect($db_host, $db_user, $db_pass, $db_name);

        $sql = "SELECT * FROM users WHERE flag=1 order by id asc";
        $result = $conn->query($sql);

        $data = array();
while($row = $result->fetch_array(MYSQLI_ASSOC)){
        //Update Button
        $updateButton = "<button class='btn btn-sm btn-primary updateuser' data-id='".$row['id']."'>Update</button>";
        // Insert Button
      $insertButton = "<button class='btn btn-sm btn-info insertUser' data-id='".$row['id']."' data-toggle='modal' data-target='#updateModal' >Add</button>";
     // Delete Button
     $deleteButton = "<button class='btn btn-sm btn-danger deleteUser' data-id='".$row['id']."'>Delete</button>";
     $action =$insertButton." ".$deleteButton." ".$updateButton ;
     $data[] = array(
       "id" => $row['id'],
       "fullname" => $row['fullname'],
       "email" => $row['email'],
       "contactno" => $row['contactno'],
       "action" => $action
     );
   }
$results = ["sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
        	"aaData" => $data ];
echo json_encode($results);
?>