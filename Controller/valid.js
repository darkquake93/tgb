
 $(document).ready(function() {
  $("#password2").keyup(validate);
});
 function validate() {
  var password1 = $("#password1").val();
  var password2 = $("#password2").val();

    
 
    if(password1 == password2) {
       $("#validate-status").text("Valid"); 
        $("#validate-status").css('color', 'green');
        $("#password2").css('color', 'green');
    }
     else if(password1.empty() && password2.empty())
         {
             $("validate-status").hide();
         }
   
    else  {
        $("#validate-status").text("Invalid"); 
         $("#validate-status").css('color', 'red');
           $("#password2").css('color', 'red');
    }
   
    
}