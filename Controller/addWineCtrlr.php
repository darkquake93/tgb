<?php
require_once('../Model/dataAccessAdmin.php');
echo addWine($_POST["Cat"],$_POST["SubCat"],$_POST["Name"],$_POST["Descr"],$_POST["Price"] );
?>
