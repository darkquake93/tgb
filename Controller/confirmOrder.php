<?php
require_once '../Model/dBcon.php';
require_once '../Model/Customer.php';
require_once '../Model/CustomerOrder.php';
require_once '../Model/Order_Item.php';
require_once '../Model/BasketItem.php';
require_once '../Model/dataAccessCust.php';
session_start();


$co = insertCustomerOrder($_SESSION['custObj']->Customer_id);
$co_idA = getCustomerOrderById($_SESSION['custObj']->Customer_id);
$co_id = $co_idA[0]->CO_id;
$wItems = getBasket();


echo insertOrderItems($co_id, $wItems);
?>
