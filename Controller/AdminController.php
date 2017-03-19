<?php
require_once '../Model/dataAccessCust.php';
require_once '../Model/dataAccessAdmin.php';
require_once '../Model/dataAccessCust.php';

if($_POST['mth'] == 'confirmOrder')
{
   $items = getOrderItemsByCustomerOrderId($_POST['CO_id']);
     foreach ($items as $item) {
       updateStock($item->Wine_id, $item->Quantity);
     }
}

?>
