<!DOCTYPE html>
<html>
<head>
   <title>PHP - Jquery Datatables Example</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </head>
  <form id="payment_form" name="payment_form">
                   
                    
        <div class="contact-form mt-2">
            <input type="text" placeholder="Nom et Prénom*" name="fullname"/>
            <input type="text" placeholder="Téléphone" name="contactno"/>
        </div>
    
   
        <div class="contact-form mt-2">
            <input type="text" placeholder="e-mail*" name="email" />
            <input type="text" placeholder="GSM" name="phone_hidden" />
        </div>
        <div class="contact-form mt-2">
        <input type="button" name="save" id="reserv-now" class="reserv-now" value="Save" />
        </div>
    
</form>
<script>
$(document).ready(function() {
$("form[name='payment_form']").validate({
        rules: {
          
            fullname: "required",
            contactno: "required",
            email: "required",
           
            },
        messages: {
           
            fullname: "Please enter your name",
            contactno: "please enter phone number",
            email: "Please enter email Address"
            
        }
    });

    $(document).on('click', '.reserv-now', function(){
        var form = $("form[name='payment_form']");
        
        if (form.valid()) {
            $.ajax({
              url: 'insert.php',
              type: 'post',
              data: $(this).serialize(), 
              success: function(){
               alert("success");
              }    
            });

        }
    });
});
    </script>
    </html>