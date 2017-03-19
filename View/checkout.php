<!DOCTYPE html>
<html>
<?php
  $title='10 Green Bottles - Never enough wine!';
	require_once '../Controller/authHeader.php';
  require_once '../Model/dataAccessCust.php';


  $items = getBasket();

?>

<h2 align="center">Confirm Details</h2>
  <section id="content" class="body">
    <div class="hentry">
            <h2><a href="#">Address Information</a></h2>
               <h3>Delivery Address Information</h3>
              <form action="#" method="POST">
                <label for="Name">Name</label>
                <input class="formStyle" type="text" name="Name" value="<?= $_SESSION['DelAdr']->Name ?>"></input>
                <label for="Addressln1">Addressln1</label>
                <input class="formStyle" type="text" name="Addressln1" value="<?= $_SESSION['DelAdr']->Addressln1 ?>"></input>
                <label for="Addressln2">Addressln2</label>
                <input class="formStyle" type="text" name="Addressln2" value="<?= $_SESSION['DelAdr']->Addressln1 ?>"></input>
                <label for="Postcode">Postcode</label>
                <input class="formStyle" type="text" name="Postcode" value="<?= $_SESSION['DelAdr']->Postcode ?>"></input>
                <h3>Billing Address Information</h3>
                <label for="NameB">Name</label>
                <input class="formStyle" type="text" name="NameB" value="<?= $_SESSION['BilAdr']->Name ?>"></input>
                <label for="Addressln2B">Addressln2B</label>
                <input class="formStyle" type="text" name="Addressln1B" value="<?= $_SESSION['BilAdr']->Addressln1 ?>"></input>
                <label for="Addressln2B">Addressln2B</label>
                <input class="formStyle" type="text" name="Addressln2B" value="<?= $_SESSION['BilAdr']->Addressln1 ?>"></input>
                <label for="PostcodeB">PostcodeB</label>
                <input class="formStyle" type="text" name="PostcodeB" value="<?= $_SESSION['BilAdr']->Postcode ?>"></input>
                <?php foreach ($items as $item): ?>
                  	<p><?= $item->Name ?> <b>X</b> <?= $item->Quantity ?></p>
                  <?php endforeach ?>
                  <p>Total Price: <?= getTotalPrice(); ?></p>
                     <a href="../Controller/confirmOrder.php" class="linkBtn">Confirm Purchase</a>
                <form>
              </form>



            <span class="published">20th February, 2017</span>
        </div>
  </section>


  <?php include 'footer.php' ?>
  <!-- PHP Footer End -->


  </html>
