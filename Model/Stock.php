<?php
class Wine implements JsonSerializable
{

private $Dist_id;
private $Wine_id;
private $Amount;

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
