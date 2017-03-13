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
require_once "../Model/manageBasket.php";
require_once "../Model/BasketItem.php";
$BasketItems = new BasketItem();
$items = $BasketItems->getBasket();


?>
<body id="index" class="home">

	<h2 align="center">~ Basket ~</h2>
		<section id="content" class="body">
			<div class="hentry">
        			<h3><a href="#">Current Items</a></h3>
		        <?php foreach ($items as $item): ?>
							<p><?= $item->Name ?> <b>X</b> <?= $item->Quantity ?> (<?= $BasketItems->getTotalPriceOfItem($item); ?>)</p>
            <?php endforeach ?>
            <p><?= $BasketItems->getTotalPrice(); ?></p>
        			<span class="published">20th February, 2017</span>
							
    			</div>
		</section>
    <?php include 'footer.php' ?>
    <!-- PHP Footer End -->
    <script type="text/javascript" src="../Controller/addToBasket.js"></script>
    </body>
    <!-- Body End -->
    </html>
