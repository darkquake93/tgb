<?php

session_start();
$php_base = "/home/k1336511/www/AD/TGB";
require_once $php_base.'/Model/dataAccessCust.php';
//
// session_destroy();
// unset($_SESSION);
// session_regenerate_id(true);

// ******* FOR LEWIS write into large function and call needed functions out of it pass up a string to select
if($_GET['type'] == 'add')
{

   addToTempBasket();
}



function addToTempBasket()
{
$quan = $_POST['quan'];
$wine_id = $_POST['wine_id'];
$item = $wine_id.':'.$quan;
if(empty($_SESSION['tempBasket']))
{
$_SESSION['tempBasket'] = "";
$_SESSION['tempBasket'] = $item;
} else
{
  $_SESSION['tempBasket'].= ','.$item;
}
require_once '../index.php';
}

function getBasketCount()
{
  $bStr = $_SESSION['tempBasket'];
   $bStr = split(",", $bStr);
    return $bNum = count($bStr);
}
function getIdTemp(){

  $itmArr = split(',',$_SESSION['tempBasket']);
  $bskArr = array();
$itmT = array();
  $i = 0;
  foreach($itmArr as $itm)
  {


array_push($bskArr, split(':', $itm));
 $i++;

  }
 //var_dump($bskArr);
 return $bskArr;

}
?>
