<?php
if ($Customer && $Customer->uType == 0) { ?>
  <div class="hentry">
          <h3><a href="#"><?= $_GET['name'] ?></a></h3>
          <div class="wineDetails">
    <p><?= $_GET['descr'] ?></p>

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

  <?php } else if($Customer && $Customer->uType == 1) { ?>

  <?php  } else { ?>

    <div class="hentry">
            <h3><a href="#"><?= $_GET['name'] ?></a></h3>
            <div class="wineDetails">
      <p><?= $_GET['descr'] ?></p>
      <img src="#">
      <p>Price: £<?= $wine->formatPrice($_GET['price']) ?></p>

      <p id="wType">Wine type: <?= $_GET['isLight'] ?></p>
      <div class="btnDropdown">

        <ul class="AddToWishList">
         <form method="post" action="../Controller/manageTempBasket.php?type=add">
           <input type="hidden" name="wine_id" value="<?= $_GET['wine_id'] ?>"></input>
    <li id="addToBasketLi"><input type="submit" name="submit" >Add To Basket</input>
      <input type="number" name="quan" id="wineQuantity"></input></li>
  </form>
  </ul>
  </div>
  </div>
  <span class="published">21st February, 2017</span>
  <div>

  <?php  }
?>
