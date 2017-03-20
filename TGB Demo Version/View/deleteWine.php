<!DOCTYPE html>
<html>
<!-- PHP Header Start -->
<script type="text/javascript" src="../Controller/manageBasket.js"></script>
<?php
$title='10 Green Bottles - Never enough wine!';
require_once '../Controller/authHeader.php';
require_once $php_base.'/Model/dataAccessCust.php';

$wine = getWineById($_GET['wine_id']);

?>

<!-- PHP Header End -->

<!-- Body Start -->
<body id="index" class="home" >

            <section id="content" class="body">
            <div>
            <form method="POST" action="../Controller/deleteWineCtrlr.php">
                <input type="hidden" id="wid" name="Wine_id" value="<?= $_GET['wine_id'] ?>">
                <table class="centered">
                    <tr>
                        <td><label for="nm">Name</label></td>
                        <td><input type="text" id="nm" name="Name" value="<?= $_GET['name'] ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label for="cat">Category</label></td>
                        <td><input type="text" id="cat" name="Cat" value="<?= $_GET['category'] ?>"> </td>
                    </tr>
                    <tr>
                        <td><label for="subcat">Sub-Category</label></td>
                        <td><input type="text" id="subcat" name="SubCat" value="<?= $_GET['subCategory'] ?>" ></td>
                    </tr>
                    <tr>
                        <td> <label for="desc">Description</label></td>
                        <td><input type="text" id="desc" name="Descr" value="<?= $_GET['descr'] ?>" ></td>
                    </tr>
                    <tr>
                        <td> <label for="pr">Price</label></td>
                        <td><input type="text" id="pr" name="Price" value="<?= $_GET['price'] ?>"></td>
                    </tr>
                </table>
                <h1><input class="bigbutton" name="delete_wine" type="submit" value="Delete this wine" /></h1>
            </form>
            </div>
            </section>


<!-- PHP Footer Start -->
<?php include 'footer.php' ?>
<script type="text/javascript" src="../Controller/checkWLight.js"></script>
<!-- PHP Footer End -->
</body>
<!-- Body End -->
</html>
