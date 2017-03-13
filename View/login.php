
<!DOCTYPE html>
 <html>
 <head>
   <title>Something</title>
  	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  	<script src="tgb.js"></script>
  	<link rel="stylesheet" href="css/style.css" type="text/css" />
      <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
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
  				<li id="wines"><a href="wines.php" onclick="wineSelect()" >Wines</a></li>
  				<li id="offers"><a href="offers.php" onclick="offerSelect()">Offers</a></li>
  				<li id="contact"><a href="contact.php" onclick="contactSelect()">Contact</a></li>
  				<li id="information" style="float:right"><a href="Pages/login.php">Sign in</a></li>
  				<li id="basket" style="float:right"><a href="#">Basket</a></li>
  			</ul>
  		</nav>
  	</header>
</head>
   <body class="body" id="index">
       <div class="login" id="login">
       <form action="../Model/auth.php" method="post" id="loginform">
        <p>Username: <input type="text" name="username"></p> <br>
        <p>Password: <input type="text" name="password"></p><br>
        <input type="submit" value="Log In" id="logSub">
       </form>

       </div>
   </body>


 </html>
