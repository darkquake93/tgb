<?php
 require_once 'dBcon.php';
 require_once 'Wine.php';
 require_once 'BasketItem.php';
require_once 'AdminOrder.php';

 function addWine($Category,$subCat,$Name,$Descr,$Price) {
    global $conn;
     $sql = $conn->prepare('INSERT INTO Wine (Wine_id, Category, subCategory, Name, Descr, Price, Purchases)
     VALUES(DEFAULT, ?, ?, ?, ?, ?, 0 );');
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

    function updateStock($wine_id, $quan) {
      global $conn;
      $sql = $conn->prepare('UPDATE Stock SET Amount = Amount - ? WHERE Wine_id = ?');
      $sql->execute([$quan, $wine_id]);
      return "Updated";
    }





?>
