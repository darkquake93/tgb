<?php
header('Content-Type: application/json');
require_once('../Model/browseWines.php');
$name = $_REQUEST['name'];
$cat = $_REQUEST['cat'];
echo getWineByNameJson($cat, $name);
?>
