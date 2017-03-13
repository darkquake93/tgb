<?php
class BasketItem
{
  private $Wine_id;
  private $Category;
  private $subCategory;
  private $Name;
  private $Descr;
  private $Price;
  private $Purchases;
  private $Quantity;


  function __get($property) {
    if(property_exists($this, $property)){
  return $this->$property;
  }
  }

  function __set($property, $value){
    if (property_exists($this, $property)) {
             $this->$property = $value;
         }
  }

  public function getBasket()
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

  public function getTotalPrice()
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

  public function getTotalPriceOfItem($item)
  {
   return number_format($item->Price*$item->Quantity, 2);
  }
}
?>
