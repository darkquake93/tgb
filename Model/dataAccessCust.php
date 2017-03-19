<?php
 require_once 'dBcon.php';
 require_once 'Wine.php';
 require_once 'BasketItem.php';
require_once 'ShoppingBasket.php';
require_once 'Order_Item.php';

//Basket Q
 function getBasket()
 {

   global $conn;
   $user_id = $_SESSION['custObj']->Customer_id;
   $sql = $conn->prepare("SELECT ShoppingBasket.Quantity, Wine.Wine_id, Wine.Category, Wine.subCategory, Wine.Name, Wine.Descr, Wine.Price, Wine.Purchases
     FROM Wine, Customer, ShoppingBasket WHERE Customer.Customer_id = ?
     AND Customer.Customer_id = ShoppingBasket.Customer_id AND Wine.Wine_id = ShoppingBasket.Wine_id");
     $sql->execute([$user_id]);
     $basketWine = $sql->fetchAll(PDO::FETCH_CLASS, "BasketItem");
     return $basketWine;
 }

  function removeItemFromBasket($wine_id)
 {
   $user_id = $_SESSION['custObj']->Customer_id;
   global $conn;
   $sql = $conn->prepare("DELETE FROM ShoppingBasket WHERE Customer_id = ? AND Wine_id = ?");
     $sql->execute([$user_id, $wine_id]);
     return "Item removed";
 }

 function getBasketTotalPrice()
 {
   $basketWine = getBasket();
   $totalPrice = 00.00;
   $totalItemPrice = 00.00;

   foreach($basketWine as $item)
   {

     $totalItemPrice = $item->Price * $item->Quantity;
     $totalPrice = $totalPrice + $totalItemPrice;
   }


   $totalPrice = number_format($totalPrice, 2);
   if($totalPrice == '0.00')
   {
     return "No Items In Basket";
   }
   return $totalPrice;
 }

function getTotalPriceOfBasketItem($item)
 {
  return number_format($item->Price*$item->Quantity, 2);
 }


//Address Q
 function getBillAddress($user_id)
 {


   global $conn;

   $stmt = $conn->prepare('
   SELECT Bill_id, Customer_id, Name, Addressln1, Addressln2, Postcode
   FROM Bill_Adr WHERE Customer_id = ?');
   $stmt->execute([$user_id]);
   $bAddr = $stmt->fetchAll(PDO::FETCH_CLASS, "Bill_Adr");
   return $bAddr;
 }

 function getDelAddress($user_id)
 {


   global $conn;

   $stmt = $conn->prepare('SELECT Del_id, Customer_id, Name, Addressln1, Addressln2, Postcode
   FROM Del_Adr WHERE Customer_id = ?');
     $stmt->execute([$user_id]);
     $dAddr = $stmt->fetchAll(PDO::FETCH_CLASS, 'Bill_Adr');
     return $dAddr;



 }




//Order Q

 function insertCustomerOrder($user_id){

   global $conn;
   $sql = $conn->prepare('INSERT INTO CustomerOrder (CO_id, Customer_id, DelDate)
     VALUES(DEFAULT, ?, "01/01/2018" );');
     $sql->execute([$user_id]);
 }

 function getCustomerOrderById($user_id){
   global $conn;
     $sql = $conn->prepare('SELECT CO_id, Customer_id, DelDate FROM CustomerOrder WHERE Customer_id = ?');
     $sql->execute([$user_id]);
     $customerOrder = $sql->fetchAll(PDO::FETCH_CLASS, 'CustomerOrder');
     return $customerOrder;
 }

  function insertOrderItems($co_id, $wItems){
 global $conn;
 $sql = $conn->prepare('INSERT INTO Order_Item (CO_id, Wine_id) VALUES (?, ?)');
 foreach($wItems as $item){
 $wine_id = $item->Wine_id;

 $wine_id = (string)$wine_id;

 $sql->execute([$co_id, $wine_id]);
 }
 return "Success!";
 }

  function getOrderItemsByCustomerOrderId($co_id){
   global $conn;
   $sql = $conn->prepare('SELECT CO_id, Wine_id, Quantity FROM Order_Item WHERE CO_id = ?');
   $sql->execute([$co_id]);
   $items = $sql->fetchAll(PDO::FETCH_CLASS, 'Order_Item');
   return $items;
 }

 //  function insertOrderItems($co_id, $wItems){
 // global $conn;
 // $sql = $conn->prepare('INSERT INTO Order_Item (CO_id, Wine_id) VALUES (?, ?)');
 // foreach($wItems as $item){
 // $wine_id = $item->Wine_id;
 //
 // $wine_id = (string)$wine_id;
 //
 // $sql->execute([$co_id, $wine_id]);
 // }
 // return "Success!";
 // }

 //  function getOrderItemsByCustomerOrderId($co_id){
 //   global $conn;
 //   $sql = $conn->prepare('SELECT CO_id, Wine_id FROM Order_Item WHERE CO_id = ?');
 //   $sql->execute([$co_id]);
 //   $items = $sql->fetchAll(PDO::FETCH_CLASS, 'Order_Item');
 //   return $items;
 // }

 //wine Q

function displayWine(){
  global $conn;
 $rWQuery = $conn->query("SELECT Wine_id, Category, subCategory, Name, Descr, Price, Purchases FROM Wine WHERE Category='Red' ORDER BY RAND() LIMIT 2");
 $rWQuery->execute();
 $redW = $rWQuery->fetchAll(PDO::FETCH_CLASS, "Wine");
 return $redW;
}

function getWineByCatRed(){
  global $conn;

  $rWinesQ = $conn->query("SELECT * FROM Wine WHERE Category = 'Red' ORDER BY Purchases DESC");
  $rWinesQ->execute();
  $rWines = $rWinesQ->fetchAll(PDO::FETCH_CLASS, "Wine");
  return $rWines;
}

function getWineByCatWhite(){
  global $conn;

  $wWinesQ = $conn->query("SELECT * FROM Wine WHERE Category = 'White' ORDER BY Purchases DESC");
  $wWinesQ->execute();
  $wWines = $wWinesQ->fetchAll(PDO::FETCH_CLASS, "Wine");
  return $wWines;
}

function getWineByCatSparkling(){
  global $conn;
  $sWinesQ = $conn->query("SELECT * FROM Wine WHERE Category = 'Sparkling' ORDER BY Purchases DESC");
  $sWinesQ->execute();
  $sWines = $sWinesQ->fetchAll(PDO::FETCH_CLASS, "Wine");
  return $sWines;
}

function getWinesBySubCat($subcat, $cat)
{
  global $conn;
  $sql = $conn->prepare('SELECT * FROM Wine WHERE Category= ? AND subCategory = ? ');
  $sql->execute([$cat,$subcat]);
  $srWines = $sql->fetchAll(PDO::FETCH_CLASS, "Wine");
  return $srWines;
}

function getWineBySubCatJson($subcat, $cat)
{
  $wines = getWinesBySubCat($subcat, $cat);
  return json_encode($wines);
}

 function getWineById($id)
{
  global $conn;
 $id = (int)$id;
  $sql = $conn->prepare("SELECT Wine_id, Category, subCategory, Name, Descr, Price, Purchases FROM Wine WHERE Wine_id = ?");
    $sql->execute([$id]);
    $wine = $sql->fetchAll(PDO::FETCH_CLASS, "Wine");
    return $wine;
}


function getWineByName($cat, $name)
{
  global $conn;
  $sql = $conn->prepare('SELECT * FROM Wine WHERE Category= ? AND Name =?');
  $sql->execute([$cat, $name]);
  $wine = $sql->fetchAll(PDO::FETCH_CLASS, "Wine");
  return $wine;
}

function getWineByDesc($cat, $desc)
{
  global $conn;
  $sql = $conn->prepare("SELECT * FROM Wine WHERE Category= ? AND Descr LIKE '$desc' ");
  $sql->execute([$cat]);
  $wine = $sql->fetchAll(PDO::FETCH_CLASS, "Wine");
  return $wine;
}

function getWineByNameJson($cat, $name)
{
  $wine = getWineByName($cat, $name);
  return json_encode($wine);
}

function getWineByDescJson($cat, $desc)
{
  $wine = getWineByDesc($cat, $desc);
  return json_encode($wine);
}

function getWinesByPriceRange($priceRange, $cat)
{
  global $conn;
 //$cat = (int)$cat;
  $sql = $conn->prepare('SELECT * FROM Wine WHERE Category = ? AND Price < ?');
  $sql->execute([$cat, $priceRange]);
  $rangeWine = $sql->fetchAll(PDO::FETCH_CLASS, "Wine");
  return $rangeWine;

}

function getWinesByPriceRangeJson($priceRange, $cat)
{
  $rangeWine = getWinesByPriceRange($priceRange, $cat);
  return json_encode($rangeWine);
}
function checkIfBasketWineExists($user_id, $wine_id)
{
  global $conn;
  $sql = $conn->query("SELECT * FROM ShoppingBasket WHERE Customer_id = '$user_id' AND Wine_id = '$wine_id'");
  $sql->execute();
  $item = $sql->fetchAll(PDO::FETCH_CLASS, 'ShoppingBasket');
  var_dump($item);
  if(!$item)
  {
    return "Issue";
  }
  return $item;
}

function checkIfBasketWineExistsJson($user_id, $wine_id)
{
  $item = checkIfBasketWineExists($user_id, $wine_id);
  return json_encode($item);
}
function updateWineQuantity($user_id, $wine_id, $quan)
{
  global $conn;
  $sql = $conn->prepare('UPDATE ShoppingBasket SET Quantity = ? WHERE Customer_id =? And Wine_id = ?');
  $sql->execute([$quan, $user_id, $wine_id]);
  return 'Updated';
}

function updateWineQuantityJson($user_id, $wine_id, $quan){
  $message = updateWineQuantity($user_id, $wine_id, $quan);
  return $message;
}
function addWineToBasket($user_id, $wine_id, $quan)
{
global $conn;
$sql = $conn->prepare('INSERT INTO `ShoppingBasket`(`Customer_id`, `Wine_id`, `Quantity`) VALUES (?,?,?)');
$sql->execute([$user_id,$wine_id,$quan]);
return 'Success';
}

function addWineToBasketJson($wine_id, $user_id, $quan)
{
  $status = addWineToBasket($user_id, $wine_id, $quan);
  return json_encode($status);
}
//basketitem Q




 function getTotalPrice()
{
  $basketWine = getBasket();
  $totalPrice = 00.00;
  $totalItemPrice = 00.00;

  foreach($basketWine as $item)
  {

    $totalItemPrice = $item->Price * $item->Quantity;
    $totalPrice = $totalPrice + $totalItemPrice;
  }


  $totalPrice = number_format($totalPrice, 2);
  if($totalPrice == '0.00')
  {
    return "No Items In Basket";
  }
  return $totalPrice;
}

 function getTotalPriceOfItem($item)
{
 return number_format($item->Price*$item->Quantity, 2);
}

?>
