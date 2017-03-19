<?php


    $co = new CustomerOrder();
    //
    //Lewis I need help here, commented out cause it was preventing the rest from loading
    //
    //$orderNum = $co->getCustomerOrderById($Customer->Customer_id);
    $oi  = new Order_Item();
    $w = new Wine();
    $rWines = getWineByCatRed();
    $wWines = getWineByCatWhite();
    $sWines = getWineByCatSparkling();


    // This page handles both the initial form presentation (i.e. a GET)
    // and the form submission (i.e. the POST).  If POST-ed, we handle
    // the transaction here first.
    $Bill_Adr = $Customer->Bill_Adr();
    if (!$Bill_Adr) {
        $Bill_Adr = new Bill_Adr();
        $Bill_Adr->Customer_id = $Customer->Customer_id;
        $Bill_Adr->Addressln1  = '';
        $Bill_Adr->Name        = '';
        $Bill_Adr->Postcode    = '';
    }
      
    $Del_Adr = $Customer->Del_Adr();
    if (!$Del_Adr) {
        $Del_Adr = new Del_Adr();
        $Del_Adr->Customer_id = $Customer->Customer_id;
        $Del_Adr->Addressln1  = '';
        $Del_Adr->Name        = '';
        $Del_Adr->Postcode    = '';
    }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST["update_customer"])) {

            if (isset($_POST["Username"])) {$Customer->Username = $_POST["Username"];}
            if (isset($_POST["Name"    ])) {$Customer->Name     = $_POST["Name"    ];}
            if (isset($_POST["Surname" ])) {$Customer->Surname  = $_POST["Surname" ];}
            if (isset($_POST["Email"   ])) {$Customer->Email    = $_POST["Email"   ];}
            if (isset($_POST["Phone"   ])) {$Customer->Phone    = $_POST["Phone"   ];}

            $Customer->update();

            // password handling is "different".. only update if non-empty; also use a
            // special handler in the Customer class that will encrypt it prior to save.

            if (isset($_POST["Pass"   ]) &&
               !empty($_POST["Pass"   ])) {
                $Customer->Pass = $_POST["Pass"];
                $Customer->update_pass();
            }

        }

        if (isset($_POST["update_bil_adr"])) {

            if (isset($_POST["Name"      ])) {$Bill_Adr->Name       = $_POST["Name"      ];}
            if (isset($_POST["Addressln1"])) {$Bill_Adr->Addressln1 = $_POST["Addressln1"];}
            if (isset($_POST["Addressln2"])) {$Bill_Adr->Addressln2 = $_POST["Addressln2"];}
            if (isset($_POST["Postcode"  ])) {$Bill_Adr->Postcode   = $_POST["Postcode"  ];}

            if ($Bill_Adr->Bill_id) {
                $Bill_Adr->update();
            } else {
                $Bill_Adr->create();
            }

        }

        if (isset($_POST["update_del_adr"])) {

            if (isset($_POST["Name"      ])) {$Del_Adr->Name       = $_POST["Name"      ];}
            if (isset($_POST["Addressln1"])) {$Del_Adr->Addressln1 = $_POST["Addressln1"];}
            if (isset($_POST["Addressln2"])) {$Del_Adr->Addressln2 = $_POST["Addressln2"];}
            if (isset($_POST["Postcode"  ])) {$Del_Adr->Postcode   = $_POST["Postcode"  ];}

            if ($Del_Adr->Del_id) {
                $Del_Adr->update();
            } else {
                $Del_Adr->create();
            }

        }

        // After a successful update by this POST, we re-direct to this page
        // (so user cannot re-run the same transaction by hitting F5).

        header("Location: $base/View/profile.php");
        exit();

    }

?>
