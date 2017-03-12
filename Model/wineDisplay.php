<?php
require_once('Wine.php');
require_once('dBcon.php');

//require_once(__DIR__.'/../Classes/Wine.php');
//require_once(__DIR__.'/../dBcon.php');
//$conn = new PDO('mysql:host=kunet.kingston.ac.uk; dbname=db_k1336511', "k1336511", "93Sniper");
$rWQuery = $conn->query("SELECT Wine_id, Category, subCategory, Name, Descr, Price, Purchases FROM Wine WHERE Category='Red' ORDER BY RAND() LIMIT 2");
$rWQuery->execute();
$redW = $rWQuery->fetchAll(PDO::FETCH_CLASS, "Wine");

?>
