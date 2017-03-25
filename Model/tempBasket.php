<?php
 class tempBasket
 {
   private $wine_id;
   private $quan;

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
