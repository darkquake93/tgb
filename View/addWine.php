<!DOCTYPE html>
<html>
<!-- PHP Header Start -->
<?php
$title='10 Green Bottles - Add Wine';
require_once '../Controller/authHeader.php';
require_once $php_base.'/Model/dataAccessCust.php';
require_once $php_base.'/Model/dataAccessAdmin.php';

 ?>

<!-- PHP Header End -->

<!-- Body Start -->
<body id="index" class="home" >

            <section id="content" class="body">
            <div>
            <form method="POST" action="../Controller/addWineCtrlr.php">
                <table class="centered">
                    <tr>
                        <td><label for="nm">Name</label></td>
                        <td><input type="text" id="nm" name="Name" ></td>
                    </tr>
                    <tr>
                        <td><label for="cat">Category</label></td>
                        <td><input type="text" id="cat" name="Cat" > </td>
                    </tr>
                    <tr>
                        <td><label for="subcat">Sub-Category</label></td>
                        <td><input type="text" id="subcat" name="SubCat"  ></td>
                    </tr>
                    <tr>
                        <td> <label for="desc">Description</label></td>
                        <td><input type="text" id="desc" name="Descr"  ></td>
                    </tr>
                    <tr>
                        <td> <label for="pr">Price</label></td>
                        <td><input type="text" id="pr" name="Price" ></td>
                    </tr>
                </table>
                <input class="bigbutton" name="add_wine" type="submit" value="Add this wine" />
            </form>
            </div>
            </section>

<!-- PHP Footer Start -->
<?php include 'footer.php' ?>
<!--<script type="text/javascript" src="../Controller/checkWLight.js"></script>-->
<!-- PHP Footer End -->
</body>
<!-- Body End -->
</html>
