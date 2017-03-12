<!DOCTYPE html>
<html>
<?php

    $php_base = "/home/k1336511/www/AD/TGB";
    $base     = "/k1336511/AD/TGB";

    $title    = '10 Green Bottles - Profile'; 
    require_once "$php_base/Controller/authHeader.php"; 

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

    // This page handles both the initial form presentation (i.e. a GET)
    // and the form submission (i.e. the POST).  If POST-ed, we handle 
    // the transaction here first.

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

    <script>$(function(){
        menuSelect('profile');
        $('#Personal').show();
    })</script>

    <h2>~ Account ~</h2>

    <section id="content">

        <div class="tabs">
            <a href="#" class="tablinks active" onclick="openWine(event, 'Personal')">Personal Details</a>
            <a href="#" class="tablinks"        onclick="openWine(event, 'Billing')">Billing Addressg</a>
            <a href="#" class="tablinks"        onclick="openWine(event, 'Deling')">Delivery Address</a>
        </div>

        <div id="Personal" class="tabcontent">
            <h3>Personal Details</h3>
            <form method="POST">
                <table class="centered">
                    <tr>
                        <td><label for="fn">First Name</label></td>
                        <td><input type="text" id="fn" name="Name" value="<?= $Customer->Name ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="ln">Last Name</label></td>
                        <td><input type="text" id="ln" name="Surname" value="<?= $Customer->Surname ?>"></td>
                    </tr>
                    <tr>
                        <td> <label for="em">Email Address</label></td>
                        <td><input type="text" id="em" name="Email" value="<?= $Customer->Email ?>"></td>
                    </tr>
                    <tr>
                        <td> <label for="ph">Phone Number</label></td>
                        <td><input type="text" id="ph" name="Phone" value="<?= $Customer->Phone ?>"></td>
                    </tr>
                    <tr>
                        <td> <label for="un">Username</label></td>
                        <td><input type="text" id="un" name="Username" value="<?= $Customer->Username ?>"></td>
                    </tr>
                    <tr>
                        <td> <label for="pw">Password</label></td>
                        <td><input type="password" id="pw" name="Pass" value=""></td>
                    </tr>
                </table>
                <input class="bigbutton" name="update_customer" type="submit" value="Update Profile" />
            </form>
        </div>

        <div id="Billing" class="tabcontent">
            <h3>Billing Address</h3>
            <form method="POST">
                <table class="centered">
                    <tr>
                        <td><label for="fn">Name</label></td>
                        <td><input type="text" id="fn" name="Name" value="<?= $Bill_Adr->Name ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="ln">Address Line 1</label></td>
                        <td><input type="text" id="ln" name="Addressln1" value="<?= $Bill_Adr->Addressln1 ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="ln">Address Line 2</label></td>
                        <td><input type="text" id="ln" name="Addressln2" value="<?= $Bill_Adr->Addressln2 ?>"></td>
                    </tr>
                    <tr>
                        <td> <label for="em">Postcode</label></td>
                        <td><input type="text" id="em" name="Postcode" value="<?= $Bill_Adr->Postcode ?>"></td>
                    </tr>
                </table>
                <input class="bigbutton" name="update_bil_adr" type="submit" value="Update Billing Address" />
            </form>
        </div>
    </section>

        <div id="Deling" class="tabcontent">
            <h3>Delivery Address</h3>
            <form method="POST">
                <table class="centered">
                    <tr>
                        <td><label for="fn">Name</label></td>
                        <td><input type="text" id="fn" name="Name" value="<?= $Del_Adr->Name ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="ln">Address Line 1</label></td>
                        <td><input type="text" id="ln" name="Addressln1" value="<?= $Del_Adr->Addressln1 ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="ln">Address Line 2</label></td>
                        <td><input type="text" id="ln" name="Addressln2" value="<?= $Del_Adr->Addressln2 ?>"></td>
                    </tr>
                    <tr>
                        <td> <label for="em">Postcode</label></td>
                        <td><input type="text" id="em" name="Postcode" value="<?= $Del_Adr->Postcode ?>"></td>
                    </tr>
                </table>
                <input class="bigbutton" name="update_del_adr" type="submit" value="Update Delivery Address" />
            </form>
        </div>
    </section>

<?php include 'footer.php' ?>
</html>

