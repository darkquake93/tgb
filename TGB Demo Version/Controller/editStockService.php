<?php
header('Content-Type: application/json');
require_once '../Model/dataAccessAdmin.php';
if($_REQUEST['mth'] == 'updateStock'){
  $wine_id = $_REQUEST['wine_id'];
  $quan = $_REQUEST['quan'];
  echo $wine_id;
  echo $quan;
  echo updateStockUP($wine_id, $quan);
}

?>
