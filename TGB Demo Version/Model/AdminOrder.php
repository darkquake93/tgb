<?php

 class AdminOrder {

private $AdminOrder_id;
private $CO_id;
private $DelDate;
private $Customer_id;

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
