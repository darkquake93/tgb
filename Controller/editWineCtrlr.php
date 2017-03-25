<?php
require_once('../Model/dataAccessAdmin.php');
echo $_POST["Cat"].", ".$_POST["SubCat"].", ".$_POST["Name"].", ".$_POST["Descr"].", ".$_POST["Price"].", ".$_POST["Wine_id"];
echo editWine($_POST["Cat"],$_POST["SubCat"],$_POST["Name"],$_POST["Descr"],$_POST["Price"],$_POST["Wine_id"] );
?>
