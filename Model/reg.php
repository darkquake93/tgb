<?php
require_once "dBcon.php";
require_once "Customer.php";
$php_base = "/home/k1415390/www/Workshop 2/Project 1.6";
session_start();
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['password1'];
$password = sha1($password);

$cUser = new Customer();
$cUser->Name = $name;
$cUser->Surname = $surname;
$cUser->Email = $email;
$cUser->Phone = $phone;
$cUser->Username = $username;

$query = $conn->query("INSERT INTO Customer VALUES (DEFAULT, '$name', '$surname', '$email', '$phone', '$username', '$password')");
$_SESSION['custObj'] = $cUser;
// $_SESSION['name'] = $name;
// $_SESSION['surname'] = $surname;
// $_SESSION['email'] = $email;
// $_SESSION['phone']= $phone;
// $_SESSION['username'] = $username;
// echo "<script language=\"JavaScript\">\n";
// echo "alert('Account Created!');\n";
// echo "window.location='../Pages/login.php'";
// echo "</script>";
// header("Location: ../Pages/home.php");
require_once($php_base.'/index.php');




?>
