<?php
header('Content-Type: application/json');
require_once("browseWines.php");
$subcat = $_REQUEST['subcat'];
$cat = $_REQUEST['cat'];
echo getWineBySubCatJson($subcat, $cat);
?>
