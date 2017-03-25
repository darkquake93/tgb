<?php
require_once('Billing.php');
require_once('Customer.php');
require_once('dBcon.php');

$billSess = $_SESSION['billObj'];
$custSess = $_SESSION['custObj'];

//require_once(__DIR__.'/../Classes/Wine.php');
//require_once(__DIR__.'/../dBcon.php');
//$conn = new PDO('mysql:host=kunet.kingston.ac.uk; dbname=db_k1336511', "k1336511", "93Sniper");
$bQuery = $conn->query("SELECT Bill_id, Customer_id, Name, Addressln1, Addressln2, Postcode FROM Bill_Adr WHERE Customer_id='$custSess->Customer_id;'");
$bQuery->execute();
$bill = $bQuery->fetchAll(PDO::FETCH_CLASS, "Bill_Adr");

?>
