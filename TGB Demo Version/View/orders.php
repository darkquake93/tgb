<!DOCTYPE html>
<html>
<?php
  $title='10 Green Bottles - Never enough wine!';
	require_once '../Controller/authHeader.php';
  require_once '../Model/dataAccessAdmin.php';


?>

<h2 align="center">Orders</h2>
  <section id="content" class="body">
    <div class="hentry">


    <?php require_once '../Controller/orderContr.php'; ?>


  </section>


  <?php include 'footer.php' ?>
  <!-- PHP Footer End -->

<script type="text/javascript" src="../Controller/adminController.js"></script>
  </html>
