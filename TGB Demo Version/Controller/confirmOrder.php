<?php
require_once '../Model/dBcon.php';
require_once '../Model/Customer.php';
require_once '../Model/CustomerOrder.php';
require_once '../Model/Order_Item.php';
require_once '../Model/BasketItem.php';
require_once '../Model/dataAccessCust.php';
require_once '../Model/dataAccessAdmin.php';
session_start();


$co = insertCustomerOrder($_SESSION['custObj']->Customer_id);
$co_idA = getCoidObj($_SESSION['custObj']->Customer_id);
var_dump($co_idA);
// $idArr = array();
// foreach($co_idA as $item)
// {
// array_push($idArr, $item->CO_id);
// }
// var_dump($idArr);
foreach($co_idA as $item)
{
  $orders = checkIfAdminOrderExists($item->CO_id);
if(!$orders)
{
   createAdminOrder($item->CO_id, $_SESSION['custObj']->Customer_id);
}
 $items = checkIfOrderItemExists($item->CO_id);
 if(!$items)
 {
   $wItems = getBasket();
   insertOrderItems($item->CO_id, $wItems);
 }
 deleteBasket($_SESSION['custObj']->Customer_id);
}

require_once '../index.php';
// //echo createAdminOrder($co_id);
// echo insertOrderItems($co_id, $wItems);
?>
