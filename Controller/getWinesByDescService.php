<?php
header('Content-Type: application/json');
require_once('../Model/dataAccessCust.php');
$desc = $_REQUEST['desc'];
$cat = $_REQUEST['cat'];
echo getWineByDescJson($cat, $desc);
?>
