<?php
class Wine implements JsonSerializable
{

private $Wine_id;
private $Category;
private $subCategory;
private $Name;
private $Descr;
private $Price;
private $Purchases;




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

public function formatPrice($price){

 $end = substr($price, -3);
 if($end{0} != '.')
 {
  return $price = $price.'.00';
 }
 else
 {
   return "hello";
 }
}

}
?>
