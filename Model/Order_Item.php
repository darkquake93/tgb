<?php
class Order_Item implements JsonSerializable
{
private $Order_Item_id;
private $CO_id;
private $Wine_id;
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
public function jsonSerialize()
{
  return get_object_vars($this);

}


}
?>
