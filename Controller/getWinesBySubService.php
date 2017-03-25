<?php
header('Content-Type: application/json');
require_once('../Model/dataAccessCust.php');
$subcat = $_REQUEST['subcat'];
$cat = $_REQUEST['cat'];
echo getWineBySubCatJson($subcat, $cat);
?>
