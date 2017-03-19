<?php
class CustomerOrder implements JsonSerializable
{

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
public function jsonSerialize()
{
  return get_object_vars($this);

}


//
// public function getOrders($user_id)
// {
//  global $conn;
//  $co_id = getCustomerOrderById($user_id);
//  $sql = $conn->preapre('SELECT * FROM Order_Item WHERE CO_id = ?');
//  $sql->execute([$
//
// }








//   $sql = $conn->prepare('BEGIN;
// INSERT INTO CustomerOrder (CO_id, Customer_id, DelDate)
//   VALUES(DEFAULT, 68, '01/01/2018' );
// INSERT INTO  Order_Item (CO_id, Wine_id)
//   VALUES(LAST_INSERT_ID(), 1);
// COMMIT;')
}
?>
