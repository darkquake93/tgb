<!DOCTYPE html>
<html>
<?php

    $title    = '10 Green Bottles - Profile';
    require_once "../Controller/authHeader.php";
    require_once "../Model/dataAccessCust.php";

    require_once "../Model/CustomerOrder.php";
    require_once "../Model/Order_Item.php";
    require_once "../Model/Wine.php";
    require_once "../Controller/profileCtrlr.php";
    $orderNum = getCustomerOrdersLogById($_SESSION['custObj']->Customer_id);
?>

    <script>$(function(){
        menuSelect('profile');
        $('#Personal').show();
    })</script>

        <script type="text/javascript" src="../Controller/browseWines.js"></script>
 <script type="text/javascript" src="../Controller/searchWine.js"></script>
 <script type="text/javascript" src="../Controller/searchRadControl.js"></script>
<script type="text/javascript" src="../Controller/tgb.js"></script>

    <h2>~ Account ~</h2>

    <section id="content">

        <div class="tabs">

            <a href="#" class="tablinks active" onclick="openWine(event, 'Personal')">Personal Details</a>
            <a href="#" class="tablinks" onclick="openWine(event, 'Billing')">Billing Address</a>
            <a href="#" class="tablinks" onclick="openWine(event, 'Deling')">Delivery Address</a>
            <a href="#" class="tablinks" onclick="openWine(event, 'Orders')">Orders</a>

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

        <div id="Orders" class="tabcontent">
          <h2>Current Orders</h2>

          <?php foreach ($orderNum  as $order) { ?>
          <div class="order">
            <h4>Order Id: <?= $order->CO_id; ?> Delivery Date: <?= $order->DelDate ?></h4>
            <?php

            foreach ($orderItems  = getCustomerOrdersLogItemById($order->CO_id) as $value)
             {
               foreach ($wine = getWineById($value->Wine_id) as $wItem) { ?>
                 <p><?= $wItem->Name ?> <b>X</b> <?= $value->Quantity ?></p>
            <?php   }
             } ?>
          </div>
          <?php }



?>
        </div>


</div>





    </section>

<?php include 'footer.php' ?>
</html>
