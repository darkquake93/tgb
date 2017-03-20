<!DOCTYPE html>
<html>
<!-- PHP Header Start -->
<?php


//require_once "../PHP/checkUserAuth.php";









// $cUser = new Customer();
// $cUser->Name = $_SESSION['name'];
// $cUser->Surname = $_SESSION['surname'];
// $cUser->Email = $_SESSION['email'];
// $cUser->Phone = $_SESSION['phone'];
// $cUser->Username = $_SESSION['username'];
// $cUser->Customer_id = $_SESSION['customer_ID'];
// echo $_SESSION['name'];
// echo $cUser->Name;
require_once "../Controller/authHeader.php";

require_once "../Model/dataAccessCust.php";




?>
<script>$(function(){
        menuSelect('basket2');
        $('#Promotions').show();
    })</script>
<body id="index" class="home">

	<h2 align="center">~ Basket ~</h2>
		<section id="content" class="body">
		<?php require_once "../Model/manageBasket.php"; ?>
		</section>
    <?php include 'footer.php' ?>
    <!-- PHP Footer End -->
    <script type="text/javascript" src="../Controller/manageBasket.js"></script>
    </body>
    <!-- Body End -->
    </html>
