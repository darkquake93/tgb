<?php
require_once('dBcon.php');
require_once('BasketItem.php');


function getBasket()
{
  global $conn;
  $user_id = $_SESSION['custObj']->Customer_id;
  $sql = $conn->prepare("SELECT ShoppingBasket.Quantity, Wine.Wine_id, Wine.Category, Wine.subCategory, Wine.Name, Wine.Descr, Wine.Price, Wine.Purchases
    FROM Wine, Customer, ShoppingBasket WHERE Customer.Customer_id = '$user_id'
    AND Customer.Customer_id = ShoppingBasket.Customer_id AND Wine.Wine_id = ShoppingBasket.Wine_id");
    $sql->execute([$user_id]);
    $basketWine = $sql->fetchAll(PDO::FETCH_CLASS, "BasketItem");
    return $basketWine;
}

function buildBasketView()
{
  $basketWine = getBasket();
  $markup = "";
  foreach ($basketWine as $item) {
    $totalItemPrice = number_format($item->Price*$item->Quantity, 2);
    $markup .= "<p>".$item->Name." <b>X</b> ".$item->Quantity." (".$totalItemPrice.")</p></br>";
  }
  return $markup;
}

// function getItemTotalPrice()
// {
//   $basketWine = getBasket();
//   $totalPrice = 00.00;
//
//   foreach($basketWine as $item){
//
//   }
// }

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
  return $totalPrice;
}

// function test()
// {
//   $basketWine = getBasket();
//   $quan = $basketWine[0]->Quantity;
//   return $quan;
// }

// function getBasketJson($user_id)
// {
//   $basketItems = getBasket($user_id);
//   return json_encode($basketItems);
// }

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



?>
