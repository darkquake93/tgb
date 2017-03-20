<?php
require_once "dBcon.php";
require_once "Customer.php";
session_start();
$username = $_POST['username'];
$password = sha1($_POST['password']);
$err = "";
$username = stripslashes($username);
$password = stripslashes($password);


$query = $conn->query("SELECT Customer_id, Name, Surname, Email, Phone, Username, uType FROM Customer WHERE Username='$username' and pass='$password'");
$query->execute();
if($query->rowCount() > 0){



// $userInfo = $query->fetchAll(PDO::FETCH_CLASS, "Customer");
// var_dump($userInfo);
//
// echo $userInfo[0]->Name;
// echo $userInfo[0]->Surname;


//var_dump($userInfo);




$userInfo = $query->fetchAll(PDO::FETCH_CLASS, "Customer");
$_SESSION['custObj'] = $userInfo[0];
$title='10 Green Bottles - Never enough wine!';
$cUser = $_SESSION['custObj'];
$temp = $cUser->Customer_id;






$cookie_name = "user_id";
$cookie_value = $temp;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

//
//  echo "<script type=\"text/javascript\">
//  var d = new Date();
//  var days=5;
//     d.setTime(d.getTime() + (days*24*60*60*1000));
//     var expires = \"\"+d.toUTCString();
//
// document.cookie = user_id=\"$temp\" +
// '; expires='+ expires + '; path=/';
// </script>
//  ";
// $_SESSION['name'] = $userInfo[0]->Name;
// $_SESSION['surname'] = $userInfo[0]->Surname;
// $_SESSION['email'] = $userInfo[0]->Email;
// $_SESSION['phone']= $userInfo[0]->Phone;
// $_SESSION['username'] = $userInfo[0]->Username;
// $_SESSION['customer_ID'] = $userInfo[0]->Customer_ID;
 //header('Location: ../Pages/home.php');
 require_once("../index.php");
}
else
{
  echo "<script language=\"JavaScript\">\n";
echo "alert('Username or Password is incorrect, please try again.');\n";
echo "window.location='../View/login.php'";
echo "</script>";

}

?>
