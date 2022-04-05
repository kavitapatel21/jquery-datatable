<!DOCTYPE html>
<html>
<head>
   <title>PHP - Jquery Datatables Example</title>
   <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
</head>

<body>
<table id="my-example">
    <thead>
        <tr>
        <th>Id</th>
        <th>Fullname</th>
        <th>Email</th>
        <th>Contact No</th>
        <th>Action</th>
        </tr>
    </thead>
</table>
</body>
<script type="text/javascript">
  $(document).ready(function() {
      $('#my-example').dataTable({
       dataType    : 'json',
        "bProcessing": true,
        "sAjaxSource": "ajaxdata.php",
        "aoColumns": [
              { mData: 'id' } ,
              { mData: 'fullname' },
              { mData: 'email' },
              { mData: 'contactno' }
            ]
      });  
  });
</script>