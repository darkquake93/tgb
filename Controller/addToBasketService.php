<?php
header('Content-Type: application/json');
require_once('../Model/manageBasket.php');
$user_id =  $_REQUEST['user_id'];
$wine_id = $_REQUEST['wine_id'];
$quan = $_REQUEST['quan'];
echo addWineToBasketJson($wine_id, $user_id, $quan);
?>
