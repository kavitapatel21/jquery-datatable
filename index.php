<!DOCTYPE html>
<html>
<head>
   <title>PHP - Jquery Datatables Example</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
<br>
<div class="success" id="success" align="center"></div>
<div class="container">
<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Insert Details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="form34" class="form-control validate">
          <label data-error="wrong" data-success="right" for="form34" name="name">Fullname</label>
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="form29" class="form-control validate">
          <label data-error="wrong" data-success="right" for="form29" name="email">Email</label>
        </div>

        <div class="md-form">
          <i class="fas fa-pencil prefix grey-text"></i>
          <input type="tel" id="form29" class="form-control validate">
          <label data-error="wrong" data-success="right" for="form8" name="contact">Contactno</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-unique" name="send" id="send">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
      </div>
    </div>
  </div>
</div>
</div>
</body>
<script type="text/javascript">
  $(document).ready(function() {
    //display data
    var userDataTable=$('#my-example').DataTable({
       dataType    : 'json',
        "bProcessing": true,
        "sAjaxSource": "ajaxdata.php",
        "aoColumns": [
              { mData: 'id' } ,
              { mData: 'fullname' },
              { mData: 'email' },
              { mData: 'contactno' },
              { mData: 'action' },
            ]
      });  
 
  // Delete record
    $('#my-example').on('click','.deleteUser',function(){
        var id = $(this).data('id');
            var ele = $(this).parent().parent();  
            // AJAX request
            
            $.ajax({
              url: 'delete.php',
              type: 'post',
              data: {id: id}, 
              success: function() {
                ele.fadeOut().remove();
                $("#success").show().html('<div class="alert alert-warning"<strong>Successfully !</strong> record deleted.</div>').fadeOut(1000);		
                userDataTable.ajax.reload();
                
                        },
            });
        
    });

    //Insert data form popup
    $('#my-example').on('click','.insertUser',function(){
      $('#modalContactForm').modal('show');      
    });

    //Insert data
    $('#my-example').on('click','.insertUser',function(){
      $('#modalContactForm').modal('show');
        var id = $(this).data('id');
            // AJAX request
            $.ajax({
              url: 'insert.php',
              type: 'post',
              data: {id: id}, 
              success: function() {
                alert("data inserted");
                        },
            });
        
    });

  });
</script>
