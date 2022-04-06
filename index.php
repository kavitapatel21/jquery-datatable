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
<div id="employeeModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="employeeForm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Add/Edit User</h4>
                            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group"><label for="name" class="control-label">Name</label>
                                <input type="text" class="form-control" id="empName" name="empName" placeholder=""
                                    required>
                            </div>
                            
                            <div class="form-group"><label for="name" class="control-label">Email</label>
                                <input type="text" class="form-control" id="empEmail" name="empEmail" placeholder=""
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="contactno" class="control-label">Contact No</label>
                                <input type="number" class="form-control" id="empcontact" name="empcontact"
                                    placeholder="">
                            </div>
 
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="empId" id="empId" value="0" />
                            <input type="hidden" name="action" id="action" value="" />
                            <input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div id="employeModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="employeForm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Add/Edit User</h4>
                            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group"><label for="name" class="control-label">Name</label>
                                <input type="text" class="form-control" id="emppName" name="emppName" placeholder=""
                                    required>
                            </div>
                            
                            <div class="form-group"><label for="name" class="control-label">Email</label>
                                <input type="text" class="form-control" id="emppEmail" name="emppEmail" placeholder=""
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="contactno" class="control-label">Contact No</label>
                                <input type="number" class="form-control" id="emppcontact" name="emppcontact"
                                    placeholder="">
                            </div>
 
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="emppId" id="emppId" value="0" />
                            <input type="hidden" name="action" id="action" value="" />
                            <input type="button" name="btn_save" id="btn_save" class="btn btn-info" value="Save" />
                            
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
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
      $('#employeeModal').modal('show');      
    });

    //Insert data
    $("#employeeModal").on('submit','#employeeForm', function(){
            $.ajax({
              url: 'insert.php',
              type: 'post',
              data: $(this).serialize(), 
              success: function(){
                $('#employeeModal').modal('hide');
                  userDataTable.ajax.reload();
              }    
    });
  });

  // Fetch record
  $('#my-example').on('click','.updateuser',function(){
                var id = $(this).data('id');
                $('#emppId').val(id);
                // AJAX request
                $.ajax({
                    url: 'update.php',
                    type: 'post',
                    data: {request:1,id: id,},
                    dataType: 'json',
                    success: function(response){
                      if(response.status == 1){
                        $('#employeModal').modal('show');    
                            $('#emppName').val(response.data.fullname);
                            $('#emppEmail').val(response.data.email);
                            $('#emppcontact').val(response.data.contactno);
                      }
                      else{
                        alert("Invalid ID.");
                        } 
                    }
                });
            });

            //Update user
            $("#employeModal").on('click','#btn_save', function(){
              var id = $('#emppId').val();
              var fullname = $('#emppName').val().trim();
              var email = $('#emppEmail').val().trim();
              var contactno= $('#emppcontact').val().trim();

            $.ajax({
              url: 'updatedata.php',
              type: 'post',
              data: {
                    id: id,
                    fullname: fullname,
                    email: email,
                    contactno: contactno,
                    },
              //dataType: 'json',                       
              success: function(response){
               // console.log(response.status);
                            if(response.status == 1){
                               // alert(response.message);
                                // Empty the fields
                                $('#emppName','#emppEmail','#emppcontact').val('');
                                $('#emppId').val(0);
                                // Close modal
                               // alert('call');
                                $('#employeModal').modal('hide');
                                // Reload DataTable
                               userDataTable.ajax.reload();
    
                            }else{
                                alert(response.message);
                            }
                          }
    });
  }); 
});
</script>
