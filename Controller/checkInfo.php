<?php
require_once '../Model/Bill_Adr.php';
require_once '../Model/Del_Adr.php';
require_once '../Model/Customer.php';
require_once '../Model/dataAccessCust.php';
require_once '../Model/dBcon.php';
session_start();


$dAddr = getDelAddress($_SESSION['custObj']->Customer_id);
$bAddr = getBillAddress($_SESSION['custObj']->Customer_id);



  // global $conn;
  // $user_id = $_SESSION['custObj']->Customer_id;
  // $stmt = $conn->prepare('SELECT Bill_id, Customer_id, Name, Addressln1, Addressln2, Postcode
  // FROM Bill_Adr WHERE Customer_id = ?');
  //   $stmt->execute([$user_id]);
  //   $bAddr = $stmt->fetchAll(PDO::FETCH_CLASS, 'Bill_Adr');

        if(!$bAddr)
        {
          $sql = $conn->prepare('INSERT INTO Bill_Adr (Bill_id, Customer_id, Name, Addressln1, Addressln2, Postcode) VALUES (DEFAULT, ?, "", "", "", "")');
          $sql->execute([$user_id]);

          $bAddr = $sql->fetchAll(PDO::FETCH_CLASS, 'Bill_Adr');


        }


        $_SESSION['BilAdr'] =  $bAddr[0];
        if($_SESSION['BilAdr']->Name == "")
        {
          $_SESSION['BilAdr']->Name  =  'Please enter your name';
        }
        if($_SESSION['BilAdr']->Addressln1 == "")
        {
          $_SESSION['BilAdr']->Addressln1 = 'Please enter your address';
        }
         if($_SESSION['BilAdr']->Addressln2 == "")
        {
          $_SESSION['BilAdr']->Addressln2 =  'Please enter your address';
        }
         if($_SESSION['BilAdr']->Postcode == "")
        {
          $_SESSION['BilAdr']->Postcode =  'Please enter your postcode';
        }


  // global $conn;
  // $user_id = $_SESSION['custObj']->Customer_id;
  // $stmt = $conn->prepare('SELECT Del_id, Customer_id, Name, Addressln1, Addressln2, Postcode
  // FROM Del_Adr WHERE Customer_id = ?');
  //   $stmt->execute([$user_id]);
  //   $dAddr = $stmt->fetchAll(PDO::FETCH_CLASS, 'Bill_Adr');

    if(!$dAddr)
    {
      $sql = $conn->prepare('INSERT INTO Del_Adr (Del_id, Customer_id, Name, Addressln1, Addressln2, Postcode) VALUES (DEFAULT, ?, "", "", "", "")');
      $sql->execute([$user_id]);

      $dAddr = $sql->fetchAll(PDO::FETCH_CLASS, 'Del_Adr');


    }


    $_SESSION['DelAdr'] =  $dAddr[0];
    if($_SESSION['DelAdr']->Name == "")
    {
      $_SESSION['DelAdr']->Name  =  'Please enter your name';
    }
    if($_SESSION['DelAdr']->Addressln1 == "")
    {
      $_SESSION['DelAdr']->Addressln1 = 'Please enter your address';
    }
     if($_SESSION['DelAdr']->Addressln2 == "")
    {
      $_SESSION['DelAdr']->Addressln2 =  'Please enter your address';
    }
     if($_SESSION['DelAdr']->Postcode == "")
    {
      $_SESSION['DelAdr']->Postcode =  'Please enter your postcode';
    }
    require_once '../View/checkout.php';
?>
