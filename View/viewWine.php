<!DOCTYPE html>
<html>
<!-- PHP Header Start -->
<script type="text/javascript" src="../Controller/manageBasket.js"></script>
<?php
$title='10 Green Bottles - Never enough wine!';
require_once '../Controller/authHeader.php';
require_once $php_base.'/Model/dataAccessCust.php';
$wine = new Wine();


 ?>

<!-- PHP Header End -->

<!-- Body Start -->
<body id="index" class="home" onload="contactSelect()">
	<h2 align="center"><?= $_GET['subCategory'] ?></h2>
		<section id="content" class="body">

<?php require_once '../Controller/viewWineController.php'; ?>


		</section>

<!-- PHP Footer Start -->
<?php include 'footer.php' ?>
<script type="text/javascript" src="../Controller/checkWLight.js"></script>
<!-- PHP Footer End -->
</body>
<!-- Body End -->
</html>
