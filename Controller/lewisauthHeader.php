<?php
require_once "../Model/Customer.php";
session_start();
if(isset($_SESSION['custObj'])){
$cUser = $_SESSION['custObj'];
?>
<head>
	<title><?php echo $title ?></title>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="../Controller/tgb.js"></script>
	<link rel="stylesheet" href="../View/css/style.css" type="text/css" />
		<meta charset="utf-8" />

<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lte IE 7]>
  <script src="js/IE8.js" type="text/javascript"></script><![endif]-->
<!--[if lt IE 7]>
  <link rel="stylesheet" type="text/css" media="all" href="css/ie6.css"/><![endif]-->

	<header id="banner" class="body">
		<p>
			<img src="img/logo.png" alt="Logo" align="right" height="100" width="100" style="margin-right: 50px;"/>
			<h1>10 Green Bottles<br><strong>Online Wine Solutions <ins>EST.2017</ins></strong></h1>
		</p>

		<nav class="navbar">
			<ul>
				<li id="home"><a href="../View/home.php" onclick="homeSelect()">Home</a></li>
				<li id="wines"><a href="../View/wines.php" onclick="wineSelect()" >Wines</a></li>
				<li id="offers"><a href="../View/offers.php" onclick="offerSelect()">Offers</a></li>
				<li id="contact"><a href="../View/contact.php" onclick="contactSelect()">Contact</a></li>
        <li id='logout' style="float: right"><a href="../Controller/logout.php">Sign out</a></li>
				<li id="information" style="float:right"><a href="../View/profile.php"><?= $cUser->printUserInfo(); ?></a></li>
				<li id="basket" style="float:right"><a id="basketA" href="../View/basket.php">Basket</a></li>
			</ul>
		</nav>
	</header>
</head>
<?php }
else
{   ?>
  <head>
  	<title><?php echo $title ?></title>
  	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  	<script src="../Controller/tgb.js"></script>
  	<link rel="stylesheet" href="../View/css/style.css" type="text/css" />
  		<meta charset="utf-8" />

  <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <!--[if lte IE 7]>
    <script src="js/IE8.js" type="text/javascript"></script><![endif]-->
  <!--[if lt IE 7]>
    <link rel="stylesheet" type="text/css" media="all" href="css/ie6.css"/><![endif]-->

  	<header id="banner" class="body">
  		<p>
  			<img src="img/logo.png" alt="Logo" align="right" height="100" width="100" style="margin-right: 50px;"/>
  			<h1>10 Green Bottles<br><strong>Online Wine Solutions <ins>EST.2017</ins></strong></h1>
  		</p>

  		<nav class="navbar">
  			<ul>
  				<li id="home"><a href="../index.php" onclick="homeSelect()">Home</a></li>
  				<li id="wines"><a href="../View/wines.php" onclick="wineSelect()" >Wines</a></li>
  				<li id="offers"><a href="../View/offers.php" onclick="offerSelect()">Offers</a></li>
  				<li id="contact"><a href="../View/contact.php" onclick="contactSelect()">Contact</a></li>
					<li id="information" style="float:right"><a href="../View/login.php">Sign in</a></li>
  				<li id="information" style="float:right"><a href="../View/register.php">Register</a></li>
  				<li id="basket" style="float:right"><a href="#" id="basketA">Basket</a></li>

  			</ul>
  		</nav>
  	</header>
  </head>

  <?php
}
  ?>
