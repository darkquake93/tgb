<!DOCTYPE html>
<html>
<?php
  $title='10 Green Bottles - Never enough wine!';
	require_once '../Controller/authHeader.php';
  require_once '../Model/dataAccessAdmin.php';
  $orders = getAdminOrders();
  var_dump($orders);
?>

<script>$(function(){
        menuSelect('orders');
    })</script>

<h2 align="center">Orders</h2>
  <section id="content" class="body">
    <div class="hentry">
        <?php foreach($orders as $item): ?>
        <div class="listItem">
          <form method="post" action="../Controller/AdminController.php">
        <p>Order Num: <?= $item->Co_id ?></p>
        <label for="date">Enter Date</label>
        <input type="date" name="date"></input>
        <label for="distID">Select Distrbution Centre</label>
        <input type="number" name="distID"></input>
        <input type="text" name="mth" value="confirmOrder"></input>
        <input type="submit" name="submit"></input>
        <input type="hidden" name="CO_id" value="<?= $item->Co_id ?>"></input>

      </form>
        <?php endforeach ?>
        </div>
  </section>


  <?php include 'footer.php' ?>
  <!-- PHP Footer End -->

<script type="text/javascript" src="../Controller/adminController.js"></script>
  </html>
