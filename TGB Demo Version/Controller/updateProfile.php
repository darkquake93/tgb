<?php $title='Updating Profile..';
//session_start();
require_once('../Model/Customer.php');
require_once('../Model/dBcon.php');
//$custSess = $_SESSION['custObj'];
//$custId = $custSess->Customer_id;

$form_firstName =  $_GET['firstName'] ;
$form_lastName =  $_GET['lastName'] ;
$form_email =  $_GET['email'] ;
$form_phone =  $_GET['phone'] ;
$form_username =  $_GET['username'] ;
$form_password =  sha1($_GET['password']) ;

$form_line1 =  $_GET['line1'] ;
$form_line2 =  $_GET['line2'] ;
$form_postcode =  $_GET['postcode'] ;

$sql=$conn->query("UPDATE Customer SET Name = '$form_firstName', Surname = '$form_lastName', Email = '$form_email', Phone = '$form_phone', Username = '$form_username', Pass = '$form_password' WHERE Customer_id = $Customer_id ");

//$sql->execute();

function createBill() {$sql=$conn->query("INSERT INTO Bill_Adr (Name, Addressln1, Addressln2, Postcode) Name = '$form_firstName', Addressln1 = '$form_line1', Addressln2 = '$form_line2', Postcode = '$form_postcode' WHERE Customer_id = $Customer_id "); }

function updateBill() {$sql=$conn->query("UPDATE Bill_Adr SET Name = '$form_firstName', Addressln1 = '$form_line1', Addressln2 = '$form_line2', Postcode = '$form_postcode' WHERE Customer_id = $Customer_id "); }

?>
