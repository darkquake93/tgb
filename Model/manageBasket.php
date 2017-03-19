<?php
require_once('dBcon.php');
require_once('BasketItem.php');
require_once '../Model/dataAccessCust.php';
require_once '../Model/Customer.php';
session_start();

if($_REQUEST['function'] = 'del')
{

  removeItemFromBasket($_REQUEST['wine_id']);
  require_once '../View/basket.php';
}
else
{
  echo "Error!!!!";
}
?>
