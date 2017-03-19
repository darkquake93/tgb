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
			<div class="hentry">
        			<h3><a href="#"><?= $_GET['name'] ?></a></h3>
              <div class="wineDetails">
				<p><?= $_GET['descr'] ?></p>
				<img src="#">
        <p>Price: £<?= $wine->formatPrice($_GET['price']) ?></p>

        <p id="wType">Wine type: <?= $_GET['isLight'] ?></p>
				<div class="btnDropdown">

					<ul class="AddToWishList">
							<li><a>Add To Wish List</a></li>
							<li id="addToBasketLi"><a onclick="addToBasket(<?= $_GET['wine_id'] ?>);">Add To Basket</a><input type="number" id="wineQuantity"></li>
						</ul>
				</div>
    			</div>
          	<span class="published">21st February, 2017</span>
          <div>
		</section>

<!-- PHP Footer Start -->
<?php include 'footer.php' ?>
<script type="text/javascript" src="../Controller/checkWLight.js"></script>
<!-- PHP Footer End -->
</body>
<!-- Body End -->
</html>
