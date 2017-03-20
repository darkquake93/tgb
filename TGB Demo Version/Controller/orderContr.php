<?php
require_once '../Model/dataAccessAdmin.php';
$orders = getAdminOrders();
$centres = getDistCentres();

  if(count($orders) != 0) { ?>
    <?php foreach($orders as $item) { ?>
    <div class="listItem">
      <form method="post" action="../Controller/AdminController.php">
    <p>Order Num: <?= $item->CO_id ?> Customer_id: </p>
    <label for="date">Enter Date</label>
    <input type="date" name="date"></input>
    <label for="distID">Select Distrbution Centre</label>
    <select name="distOptions">
      <?php foreach($centres as $t): ?>
        <option><?= $t->Dist_id ?> (<?= $t->Name ?>)</option>
      <?php endforeach ?>
    </select>
    <input type="text" name="mth" value="confirmOrder"></input>
    <input type="submit" name="submit"></input>
    <input type="hidden" name="CO_id" value="<?= $item->CO_id ?>"></input>
    <input type="hidden" name="user_id" value="<?= $item->Customer_id ?>"></input>

  </form>
<?php }   ?>
  </div>
<?php  }
  else
  { ?>
      <p>No Pending Orders</p>
<?php  }

?>
