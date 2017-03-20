
<!DOCTYPE html>
 <html>
 
<?php
    $title='10 Green Bottles - Login';
    require_once '../Controller/authHeader.php';
?>

<script>$(function(){
        menuSelect('signin');
    })</script>

   <body class="body" id="index">
       <div class="login" id="login">
       <form action="../Model/auth.php" method="post" id="loginform">
        <p>Username: <input type="text" name="username"></p> <br>
        <p>Password: <input type="password" name="password"></p><br>
        <input type="submit" value="Log In" id="logSub">
       </form>

       </div>
   </body>


 </html>
