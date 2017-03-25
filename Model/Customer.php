<?php

// This is a 'model' class which concerns itself ONLY with data management.
// There should be no html, css, js etc dealing with presentation or 'view' activity here.

class Customer implements JsonSerializable {

    private $Name;
    private $Surname;
    private $Email;
    private $Phone;
    private $Username;
    private $Customer_id;
    private $Pass;
    private $uType;

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

    // Implement a 'stringify' which can be used to report this object.
    function printUserInfo() {
        return $this->Name.' '.$this->Surname;
    }

    // Implement json serialisation rule (via "encode_json" function)
    function jsonSerialize() {
        $data = [ 'Customer' => [
            'Customer_id' => $this->Customer_id,
            'Username'    => $this->Username,
            'Name'        => $this->Name,
            'Surname'     => $this->Surname,
            'Email'       => $this->Email,
            'Phone'       => $this->Phone
        ] ];
        return $data;
    }

    // Implement a 'find' method which will return a customer object (given a pkey) or null if not found.
    function find($id) {
        global $conn;

        $stmt = $conn->prepare("SELECT Name, Surname, Email, Phone, Username, Customer_id
                                FROM Customer WHERE Customer_id = ?");
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Customer');
        return $stmt->fetch();
    }

    // Implement an 'update' method to update an existing Customer object in the db.
    function update() {

        global $conn;

        $stmt = $conn->prepare('
            UPDATE Customer SET
                Name     = :Name,
                Surname  = :Surname,
                Email    = :Email,
                Phone    = :Phone
            WHERE Customer_id = :Customer_id
        ');

        $stmt->bindParam(':Name',        $this->Name);
        $stmt->bindParam(':Surname',     $this->Surname);
        $stmt->bindParam(':Email',       $this->Email);
        $stmt->bindParam(':Phone',       $this->Phone);
        $stmt->bindParam(':Customer_id', $this->Customer_id);

        return $stmt->execute();
    }

    // Implement a special method to update Customer password.
    function update_pass() {

        global $conn;

        $stmt = $conn->prepare('
            UPDATE Customer SET Pass = :Pass
            WHERE Customer_id = :Customer_id
        ');

        $encrypted_pass = sha1($this->Pass);

        $stmt->bindParam(':Pass',        $encrypted_pass);
        $stmt->bindParam(':Customer_id', $this->Customer_id);

        return $stmt->execute();
    }

    // Implement a 'create' method which will save a new Customer object into the db
    // and populate the object with its new primary key id.
    // Example usage:
    //    $newcust = new Customer();
    //    $newcust->Username= 'joeb'; $newcust->Name = 'Xoe'; $newcust->Surname = 'Xlow';
    //    $newcust->Email   = 'X@b.com'; $newcust->Phone   = 'X432'; $newcust->Pass = 'test';
    //    $newcust->create();

    function create() {

        global $conn;

        $stmt = $conn->prepare('
            INSERT INTO Customer (  Username,  Name,  Surname,  Email,  Phone,  Pass )
                          VALUES ( :Username, :Name, :Surname, :Email, :Phone, :Pass );
        ');

        $encrypted_pass = sha1($this->Pass);

        $stmt->bindParam(':Username',    $this->Username);
        $stmt->bindParam(':Name',        $this->Name);
        $stmt->bindParam(':Surname',     $this->Surname);
        $stmt->bindParam(':Email',       $this->Email);
        $stmt->bindParam(':Phone',       $this->Phone);
        $stmt->bindParam(':Pass',        $encrypted_pass);

        $result = $stmt->execute();

        if (!$result) {
            return FALSE;
        }

        $this->Customer_id = $conn->lastInsertId();
        return $this;

    }

    // Implement a function to retrieve the 1&only1 Billing Address record for this Customer
    function Bill_Adr() {

        global $conn;

        $stmt = $conn->prepare("SELECT Addressln1, Addressln2, Bill_id, Customer_id, Name, Postcode
                                FROM Bill_Adr WHERE Customer_id = ?");
        $stmt->execute([$this->Customer_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Bill_Adr');
        return $stmt->fetch();
    }

    // Implement a function to retrieve the 1&only1 Delivery Address record for this Customer
    function Del_Adr() {

        global $conn;

        $stmt = $conn->prepare("SELECT Addressln1, Addressln2, Del_id, Customer_id, Name, Postcode
                                FROM Del_Adr WHERE Customer_id = ?");
        $stmt->execute([$this->Customer_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Del_Adr');
        return $stmt->fetch();
    }


}
?>
