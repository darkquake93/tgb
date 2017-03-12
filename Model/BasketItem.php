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
}
?>
