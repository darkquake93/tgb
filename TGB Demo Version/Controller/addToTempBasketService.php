<?php
require_once '../Model/tempBasket.php';
session_start();
$quan = $_POST['quan'];
$wine_id = $_POST['wine_id'];
// $temp = new tempBasket();
// $temp->wine_id = $wine_id;
// $temp->quan = $quan;

$temp = array();
array_push($temp, $quan);
array_push($temp, $wine_id);
var_dump($temp);
if(!$_SESSION['tempBasket'])
{
  $_SESSION['tempBasket'];

}

$_SESSION['wine_id']['quan'] = ;
var_dump($_SESSION);

require_once '../index.php';
?>
