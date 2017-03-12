<!DOCTYPE html>
 <html>
<?php
    $title='10 Green Bottles - Register';
    require_once '../Controller/authHeader.php';
    require_once '../Model/browseWines.php';
?>

<script>$(function(){menuSelect('register')})</script>

<h2>~ Register ~</h2>

  <div class="login" id="login">
  <form action="../Model/reg.php" method="post" id="loginform">
   <p>First Name: <input type="text" name="name"></p> <br>
   <p>Last Name: <input type="text" name="surname"></p><br>
   <p>E-mail: <input type="text" name="email"></p><br>
   <p>Phone: <input type="text" name="phone"></p><br>
   <p>Username: <input type="text" name="username"></p><br>
   <p>Password: <input type="text" name="password1" id="password1"></p><br>
   <p id="validate-status"></p><br>
   <p>Repeat Password: <input type="text" name="password2" id="password2"></p><br>

   <input type="submit" value="Create Account" id="logSub">
  </form>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="../Controller/valid.js"></script>
</body>

</html>
