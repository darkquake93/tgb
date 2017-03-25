<?php
 require_once 'dBcon.php';
 require_once 'Wine.php';
 require_once 'BasketItem.php';
require_once 'AdminOrder.php';
require_once 'Distcent.php';

 function addWine($Category,$subCat,$Name,$Descr,$Price) {
    global $conn;
     $sql = $conn->prepare('INSERT INTO Wine (Wine_id, Category, subCategory, Name, Descr, Price, Purchases)
     VALUES(DEFAULT, ?, ?, ?, ?, ?, 0);');
     $sql->execute([$Category,$subCat,$Name,$Descr,$Price]);
     return "Wine Created";
 }

 function editWine($Category,$subCat,$Name,$Descr,$Price) {
    global $conn;
     $sql2 = $conn->prepare('UPDATE Wine SET Wine_id = DEFAULT, Category = ?, subCategory = ?, Name = ?, Descr = ?, Price = ?, Purchases = 0');
    try {
     $sql2->execute([$Category,$subCat,$Name,$Descr,$Price]);
        return "Wine Updated";
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
  }
  function deleteWine($Wine_id) {
    global $conn;
     $sql2 = $conn->prepare('DELETE FROM Wine WHERE Wine_id = ?');
    try {
     $sql2->execute([$Wine_id]);
        return "Wine Deleted";
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
  }

    function getAdminOrders(){
      global $conn;
      $sql = $conn->prepare('SELECT * FROM AdminOrder');
      $sql->execute();
      $orders = $sql->fetchAll(PDO::FETCH_CLASS, 'AdminOrder');
      return $orders;
    }

    function updateStockUP($wine_id, $quan){
      global $conn;
      $sql = $conn->prepare('UPDATE Stock SET UPAmount = UPAmount - ? WHERE Wine_id = ?');
      $sql->execute([$quan, $wine_id]);
      return "Updated";
    }
    function updateAllStock($dist_id, $quan)
    {
      global $conn;
      $sql = $conn->prepare('UPDATE Stock SET Amount = Amount + ? WHERE Dist_id <> ?');
      $sql->execute([$quan, $dist_id]);
      return "Updated";
    }
    function updateAllUPStock($dist_id, $quan, $wine_id)
    {
      global $conn;
      $sql = $conn->prepare('UPDATE Stock SET UPAmount = UPAmount + ? WHERE Dist_id <> ? AND Wine_id = ?');
      $sql->execute([$quan, $dist_id, $wine_id]);
      return "Updated";
    }
    function updateStock($dist_id, $wine_id, $quan) {
      global $conn;
      $sql = $conn->prepare('UPDATE Stock SET Amount = Amount - ? WHERE Wine_id = ? AND Dist_id = ?');
      $sql->execute([$quan, $wine_id, $dist_id]);
      return "Updated";
    }


    function createAdminOrder($Co_id, $user_id)
    {
      global $conn;
      $sql = $conn->prepare('INSERT INTO AdminOrder (AdminOrder_id, CO_id, Customer_id, DelDate) VALUES (DEFAULT, ?, ?, DEFAULT)');
          try {
      $sql->execute([$Co_id, $user_id]);
      return "Wine Updated";
  } catch(PDOException $e) {
      return $e->getMessage();
  }


    }

    function checkIfAdminOrderExists($Co_id)
    {
      global $conn;
      $sql = $conn->prepare('SELECT * FROM AdminOrder WHERE Co_id = ?');
      $sql->execute([$Co_id]);
      $orders  = $sql->fetchAll(PDO::FETCH_CLASS, 'AdminOrder');
      return $orders;
    }
    function getDistCentres()
    {
      global $conn;
      $sql = $conn->prepare('SELECT * FROM Distcent');
      $sql->execute();
      $centres  = $sql->fetchAll(PDO::FETCH_CLASS, 'Distcent');
      return $centres;
    }

    function updateCOrderStock($co_id, $date)
    {
      global $conn;
      $sql = $conn->prepare('UPDATE CustomerOrder SET DelDate = ? WHERE CO_id = ?');
      $sql->execute([$date, $co_id]);
      return "Customer Order DelDate Updated!";
    }
    function insertCustomerOrderLog($co_id, $date, $user_id)
    {
      global $conn;
      $sql = $conn->prepare('INSERT INTO CustomerOrderLog (COL_id, CO_id, Customer_id, DelDate) VALUES (DEFAULT, ? , ?, ?)');
      $sql->execute([$co_id, $user_id, $date]);
      return "Order inserted into log";
    }

    function deleteCustomerOrderById($co_id)
    {
      global $conn;
      $sql = $conn->prepare('DELETE FROM CustomerOrder WHERE CO_id = ?');
      $sql->execute([$co_id]);
      return "Customer Order Deleted!";
    }

    function insertCustomerOrderLogItem($co_id, $wine_id, $quan)
    {
      global $conn;
      $sql = $conn->prepare('INSERT INTO CustomerOrderLogItem (COLI_id, CO_id, Wine_id, Quantity) VALUES (DEFAULT, ? , ?, ?)');
      $sql->execute([$co_id, $wine_id, $quan]);
      return "Order inserted into log item";
    }


?>
