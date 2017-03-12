<!DOCTYPE html>
<html>
<!-- PHP Header Start -->
<?php $title='10 Green Bottles - Never enough wine!';

// require_once 'dBcon.php';
require_once 'Model/wineDisplay.php';
 ?>
 <head>
 	<title><?= $title ?></title>
 	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
 	<script src="Controller/tgb.js"></script>
 	<link rel="stylesheet" href="View/css/style.css" type="text/css" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">

 </head>
 <!--[if IE]>
   <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
 <!--[if lte IE 7]>
   <script src="js/IE8.js" type="text/javascript"></script><![endif]-->
 <!--[if lt IE 7]>
   <link rel="stylesheet" type="text/css" media="all" href="css/ie6.css"/><![endif]-->
<body id="index" class="home" onload="homeSelect()">
 	<header id="banner" class="responsive">
 		<div style="float:left">
 			<h1>10 Green Bottles<br>Online Wine Solutions </h1>
 			<h3>EST.2017</h3>
 		</div>
 		<div style="float:right">
 			<img src="/k1336511/AD/TGB/View/img/tgb.png" alt="Logo" height="100" width="100" />
 		</div>
		<div style="clear:both">
		</div>

 		<nav>
 			<ul>
 				<li class="active" id="home"><a href="index.php" onclick="homeSelect()">Home</a></li>
 				<li id="wines"><a href="View/wines.php" onclick="wineSelect()" >Wines</a></li>
 				<li id="offers"><a href="View/offers.php" onclick="offerSelect()">Offers</a></li>
 				<li id="contact"><a href="View/contact.php" onclick="contactSelect()">Contact</a></li>
 				<li id="basket" style="float:right"><a href="#">Basket</a></li>
        		<li id="register" style="float:right"><a href="View/register.php">Register</a></li>
 				<li id="information" style="float:right"><a href="View/login.php">Sign in</a></li>
 			</ul>
 		</nav>
			
 	</header>

	<div style="clear:both">
	<h2 align="center">~ Wine of the Day ~</h2>
		<div align="center">
		<section id="content" class="responsive">
			<div class="hentry">
        			<h3><a href="#">An epic wine</a></h3>
				<p>This will make you feel very epic.</p>
        			<span class="published">20th February, 2017</span>
    			</div>
		</section>
		</div>
	<h2 align="center">~ Latest Deals ~</h2>
		<div align="center">
		<section id="content" class="responsive">
			<div class="hentry">
        			<h3><a href="#">Red Wine</a></h3>
              <?php foreach ($redW as $item): ?>
                    <div class="redWineList">
                                 <h4><?= $item->subCategory ?></h4>

                                   <p><?= $item->Name ?>: <?= $item->Descr ?> </p>

                                  <a href="View/viewWine.php?name=<?= $item->Name ?>&descr=<?=$item->Descr ?>&price=<?= $item->Price ?>&subCategory=<?= $item->subCategory ?>&isDry=<?= $item->isDry ?>&isLight=<?= $item->isLight ?>&category=<?= $item->Category ?>">View Full Details</a>

                                                 </div>
                           <?php endforeach ?>









				<p>The deal on this awesome wine is awesome.</p>
        			<span class="published">20th February, 2017</span>
    			</div>
		</section>
		</div>
		<div align="center">

		<section id="content" class="responsive">
			<div class="hentry">
        			<h3><a href="#">White Wine</a></h3>
				<p>Here's another deal for a fancy wine.</p>
        			<span class="published">19th February, 2017</span>
    			</div>
		</section>

		<!-- <section id="content" class="body">
			<div class="hentry">
				<h3><a href="#">Users On The System</h3>
					<p>

					</p> -->

<!-- PHP Footer Start -->
<?php include 'View/footer.php' ?>
<!-- PHP Footer End -->
</body>
<!-- Body End -->
</html>
