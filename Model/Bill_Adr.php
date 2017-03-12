<?php

// This is a 'model' class which concerns itself ONLY with data management.
// There should be no html, css, js etc dealing with presentation or 'view' activity here.

class Bill_Adr implements JsonSerializable {

    private $Addressln1;
    private $Addressln2;
    private $Bill_id;
    private $Customer_id;
    private $Name;
    private $Postcode;

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
    function stringify() {
        return $this->Name.' '.$this->Addressln1;
    }

    // Implement json serialisation rule (via "encode_json" function)
    function jsonSerialize() {
        $data = [ 'Bill_Adr' => [
            'Addressln1'  => $this->Addressln1,
            'Addressln2'  => $this->Addressln2,
            'Bill_id'     => $this->Bill_id,
            'Customer_id' => $this->Customer_id,
            'Name'        => $this->Name,
            'Postcode'    => $this->Postcode
        ] ];
        return $data;
    }

    // Implement a 'find' method which will return a customer object (given a pkey) or null if not found.
    function find($id) {
        global $conn;

        $stmt = $conn->prepare("SELECT Addressln1, Addressln2, Bill_id, Customer_id, Name, Postcode
                                FROM Bill_Adr WHERE Bill_id = ?");
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Bill_Adr');
        return $stmt->fetch();
    }

    // Implement an 'update' method to update an existing Bill_Adr object in the db.
    function update() {

        global $conn;

        $stmt = $conn->prepare('
            UPDATE Bill_Adr SET
                Addressln1  = :Addressln1,
                Addressln2  = :Addressln2,
                Customer_id = :Customer_id,
                Name        = :Name,
                Postcode    = :Postcode
            WHERE Bill_id = :Bill_id
        ');

        $stmt->bindParam(':Addressln1',  $this->Addressln1);
        $stmt->bindParam(':Addressln2',  $this->Addressln2);
        $stmt->bindParam(':Customer_id', $this->Customer_id);
        $stmt->bindParam(':Name',        $this->Name);
        $stmt->bindParam(':Postcode',    $this->Postcode);
        $stmt->bindParam(':Bill_id',     $this->Bill_id);

        return $stmt->execute();
    }

    // Implement a 'create' method which will save a new Bill_Adr object into the db
    // and populate the object with its new primary key id.
    // Example usage:
    //    $newcust = new Bill_Adr();
    //    $newcust->Username= 'joeb'; $newcust->Name = 'Xoe'; $newcust->Addressln1 = 'Xlow';
    //    $newcust->Customer_id   = 'X@b.com'; $newcust->Postcode   = 'X432'; 
    //    $newcust->create();

    function create() {

        global $conn;

        $stmt = $conn->prepare('
            INSERT INTO Bill_Adr (  Addressln1,  Addressln2,  Customer_id,  Name,  Postcode )
                          VALUES ( :Addressln1, :Addressln2, :Customer_id, :Name, :Postcode );
        ');

        $stmt->bindParam(':Addressln1',  $this->Addressln1);
        $stmt->bindParam(':Addressln2',  $this->Addressln2);
        $stmt->bindParam(':Customer_id', $this->Customer_id);
        $stmt->bindParam(':Name',        $this->Name);
        $stmt->bindParam(':Postcode',    $this->Postcode);

        $result = $stmt->execute();

        if (!$result) {
            return FALSE;
        }

        $this->Bill_id = $conn->lastInsertId();
        return $this;

    }

}
?>
