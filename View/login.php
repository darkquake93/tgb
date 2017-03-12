<?php

    $php_base = "/home/k1336511/www/AD/TGB";
    $base     = "/k1336511/AD/TGB";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        require_once "$php_base/Model/dBcon.php";
        require_once "$php_base/Model/Customer.php";

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $username = $_POST['username'];
        $password = sha1($_POST['password']);

        $query = $conn->prepare("SELECT Customer_id, Name, Surname, Email, Phone, Username, Pass FROM Customer WHERE Username=? AND Pass=?");
        $query->execute([$username,$password]);
        $custInfo = $query->fetchAll(PDO::FETCH_CLASS, "Customer");

        if (!session_id()) {
            session_start();
        }

        if(empty($custInfo)){

            // SET ERROR MSG AND CONTINUE AS IF NOT POSTED
            if (isset($_SESSION['badLoginCount'])) {
                $_SESSION['badLoginCount']++;
                $_SESSION['errorMsg'] = "Invalid Login.  Please retry (" . $_SESSION['badLoginCount'] . ' attempts)';
            } else {
                $_SESSION['badLoginCount'] = 1;
                $_SESSION['errorMsg'] = "Invalid Login.  Please retry";
            }

        } else {
            $_SESSION['Customer_id'] = $custInfo[0]->Customer_id;
            header("Location: $base");
            exit();
        }

    }

?>
<!DOCTYPE html>
<html>

<?php
    $title='10 Green Bottles - Login';
    require_once "$php_base/Controller/authHeader.php";
?>
    <script>$(function(){menuSelect('signin')})</script>
    <h2>~ Login ~</h2>

    <section id="content">
       <div id="login">
           <form method="post" id="loginform">
                <p>Username: <input type="text" name="username"></p>
                <p>Password: <input type="password" name="password"></p>
                <input type="submit" value="Log In" id="logSub">
           </form>
       </div>
    </section>

<?php include 'footer.php' ?>
</html>
