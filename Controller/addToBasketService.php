<?php
//header('Content-Type: application/json');
require_once('../Model/manageBasket.php');
require_once '../Model/dataAccessCust.php';
require_once '../Model/dBcon.php';
session_start();
$user_id =  $_REQUEST['user_id'];
$wine_id = $_REQUEST['wine_id'];
$quan = $_REQUEST['quan'];
$user_id = (String)$user_id;
$wine_id = (String)$wine_id;
echo $user_id;
echo $wine_id;
echo addWineToBasketJson($wine_id, $user_id, $quan);
// echo updateWineQuantityJson($user_id, $wine_id, $quan);
//  echo $item = checkIfBasketWineExistsJson($user_id, $wine_id);
// $item = json_decode($item);
// var_dump($item);
// if($item == 'Issue')
// {
//   echo addWineToBasketJson($wine_id, $user_id, $quan);
// }
// else {
//   $quan = $quan + $item->Quantity;
//
// }

?>
