<?php

class CustomerOrderLog {

  private $COL_id;
  private $CO_id;
  private $Customer_id;
  private $DelDate;

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
