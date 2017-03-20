<?php
header('Content-Type: application/json');
require_once "../Model/dataAccessCust.php";
$priceRange = $_REQUEST['priceRange'];
$cat = $_REQUEST['cat'];
echo getWinesByPriceRangeJson($priceRange, $cat);

?>
