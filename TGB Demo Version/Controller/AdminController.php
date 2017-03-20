<?php
require_once '../Model/dataAccessCust.php';
require_once '../Model/dataAccessAdmin.php';
require_once '../Model/dataAccessCust.php';

if($_POST['mth'] == 'confirmOrder')
{
   $distID =  $_POST['distOptions'];
   $distID = substr($distID, 0, 1);
  $date =  $_POST['date'];

    $items = getOrderItemsByCustomerOrderId($_POST['CO_id']);
      updateCOrderStock($_POST['CO_id'], $date);
      insertCustomerOrderLog($_POST['CO_id'], $date, $_POST['user_id']);
      $wines = getBasketItemsById($_POST['CO_id']);
      
      deleteCustomerOrderById($_POST['CO_id']);
      var_dump($wines);
      foreach($wines as $item)
      {
        echo insertCustomerOrderLogItem($item->CO_id, $item->Wine_id, $item->Quantity);
      }
    //var_dump($items);
       $items[0]->Quantity;
      foreach ($items as $item) {
        updateStock($distID, $item->Wine_id, $item->Quantity);
        updateAllUPStock($distID, $item->Quantity, $item->Wine_id);

      }
}

?>
