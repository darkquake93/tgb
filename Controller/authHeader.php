<!-- PHP Header Start -->
<?php



    $php_base = "/home/k1336511/www/AD/TGB";
    $base     = "/k1336511/AD/TGB";

    require_once "$php_base/Model/dBcon.php";
    require_once "$php_base/Model/Customer.php";
    require_once "$php_base/Model/Bill_Adr.php";
    require_once "$php_base/Model/Del_Adr.php";


	  if (!session_id()) {
        session_start();
	  }
    $Customer = null;

    if(isset($_SESSION['custObj'])){
        $Customer = $_SESSION['custObj'];
    }

?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$title?></title>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="<?=$base?>/Controller/tgb.js"        ></script>
    <script src="<?=$base?>/Controller/browseWines.js"></script>
    <script src="<?=$base?>/Controller/searchWine.js" ></script>

    <link  href="<?=$base?>/View/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<header id="banner" class="responsive">
		<div>
            <div style="float:right">
                <img src="/k1336511/AD/TGB/View/img/tgb.png" alt="Logo" height="150px"/>
            </div>
            <div>
                <h1>10 Green Bottles</h1>
                <h3>EST.2017</h3>
            </div>
            <div style="clear:both"></div>
		</div>

		<nav class="navbar">
			<ul>
                <li id="home"><a href="<?=$base?>" onclick="homeSelect()">Home</a></li>
                <li id="wines"><a href="<?=$base?>/View/wines.php" onclick="wineSelect()" >Wines</a></li>
                <li id="offers"><a href="<?=$base?>/View/offers.php" onclick="offerSelect()">Offers</a></li>
                <li id="contact"><a href="<?=$base?>/View/contact.php" onclick="contactSelect()">Contact</a></li>

                <!--Checks if signed in and type = 0 meaning they are a Customer-->
                <?php if ($Customer && $Customer->uType == 0) { ?>
                <li id='logout' style="float: right"><a href="<?=$base?>/Controller/logout.php">Log out</a></li>

                <!--Basket link is a stub, but demonstrates highlighting of button-->

                <li id="basket2" style="float:right"><a id="basket2" href="<?=$base?>/View/basket.php" onclick="menuSelect('basket2')">Basket</a></li>

                <li id="profile" style="float:right"><a href="<?=$base?>/View/profile.php"><?= $Customer->printUserInfo() ?></a></li>

                <?php } else if($Customer && $Customer->uType == 1) { ?>
                 <li id='logout' style="float: right"><a href="<?=$base?>/Controller/logout.php">Log out</a></li>
                <li id="profile" style="float:right"><a href="<?=$base?>/View/profile.php"><?= $Customer->printUserInfo() ?></a></li>
                <li id="orders" style="float:right"><a href="<?=$base?>/View/orders.php">Orders</a></li>
                <?php } else { ?>
                <li id="signin" style="float:right"><a href="<?=$base?>/View/login.php">Log in</a></li>
                <li id="register" style="float:right"><a href="<?=$base?>/View/register.php">Register</a></li>
                <?php } ?>
            </ul>
        </nav>

	</header>

    <div style="clear: both"></div>

<?php
    if (isset($_SESSION['errorMsg'])) { ?>
    <div class="error"><?= $_SESSION['errorMsg'] ?></div>
<?php
        unset($_SESSION['errorMsg']);
    }
?>

<!-- PHP Header End -->
