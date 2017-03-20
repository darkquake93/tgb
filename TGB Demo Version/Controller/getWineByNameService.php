<?php
header('Content-Type: application/json');
require_once('../Model/dataAccessCust.php');
$name = $_REQUEST['name'];
$cat = $_REQUEST['cat'];
echo getWineByNameJson($cat, $name);
?>
