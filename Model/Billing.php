<?php class Bill_Adr
{
  private $Name;
  private $Addressln1;
  private $Addressln2;
  private $Postcode;

  // function __construct($Name, $Surname, $Email, $Phone, $Username)
  // {
  // $this->Name = $Name;
  // $this->Surname = $Surname;
  // $this->Email = $Email;
  // $this->Phone = $Phone;
  // $this->Username = $Username;
  // }
  function setName($name)
  {
    $this->name = $name;
  }
  function getName()
  {
    return $this->name;
  }

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

  function printUserInfo()
  {
    return $this->Name.', '.$this->Surname;
  }



}
?>
