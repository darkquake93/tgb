<?php
require_once('dBcon.php');
require_once('BasketItem.php');
require_once '../Model/dataAccessCust.php';
require_once '../Model/Customer.php';
require_once '../Controller/manageTempBasket.php';



function removeItem()
{
  removeItemFromBasket($_REQUEST['wine_id']);
  require_once '../View/basket.php';
}


 if ($Customer && $Customer->uType == 0) {



   $items = getBasket();
    ?>
    <div class="hentry">
            <h3><a href="#">Current Items</a></h3>
          <?php foreach ($items as $item): ?>
            <div class ="listItem">
            <p><?= $item->Name ?> <b>X</b> <?= $item->Quantity ?> (<?= getTotalPriceOfBasketItem($item); ?>)<a href="<?php $base.'/Model/basket.php'; ?>?function='del'&wine_id=<?= $item->Wine_id ?>" class="delBtn">Delete</a></p>
          </div>
          <?php endforeach ?>
          <p>£<?= getBasketTotalPrice(); ?>  <a href="../Controller/checkInfo.php" class="linkBtn">Check out</a></p>
            <span class="published">20th February, 2017</span>

        </div>

<?php   }
   else if($Customer && $Customer->uType == 1) {
    ?> <p>Admins Shouldn't see this</p> <?php
     }
    else {
      ?>   <div class="hentry">
                <h3><a href="#">Current Item</a></h3>
              <?php  $items = getIdTemp();

               foreach ($items as $item)
               {
                $wines =  getWineById($item[0]);
                ?> <p><?= $wines[0]->Name ?> <b>X</b></p>
              <?php }



  }
  if($_REQUEST['function'] = 'del')
  {
    removeItem();
  }
  else
  {
    echo "Error!!!!";
  }
?>
