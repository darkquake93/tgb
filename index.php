<!DOCTYPE html>
<html>
<?php
    $title='10 Green Bottles - Never enough wine!';
	require_once 'Controller/authHeader.php';
	require_once 'Model/wineDisplay.php';

?>

    <script>$(function(){menuSelect('home')})</script>


	<h2 align="center">~ Wine of the Day ~</h2>
		<section id="content" class="body">
			<div class="hentry">
        			<h3><a href="#">An epic wine</a></h3>
				<p>This will make you feel very epic.</p>
        			<span class="published">20th February, 2017</span>
    			</div>
		</section>

	<h2 align="center">~ Latest Deals ~</h2>
		<section id="content" class="body">
			<div class="hentry">
        			<h3><a href="#">Red Wine</a></h3>
              <?php foreach ($redW as $item): ?>
                    <div class="redWineList">
                                 <h4><?= $item->subCategory ?></h4>

                                   <p><?= $item->Name ?>: <?= $item->Descr ?> </p>

                                  <a href="<?= $base ?>/View/viewWine.php?name=<?= $item->Name ?>&descr=<?=$item->Descr ?>&price=<?= $item->Price ?>&subCategory=<?= $item->subCategory ?>&isDry=<?= $item->isDry ?>&isLight=<?= $item->isLight ?>&category=<?= $item->Category ?>&wine_id=<?= $item->Wine_id ?>">View Full Details</a>

                                                 </div>
                           <?php endforeach ?>









				<p>The deal on this awesome wine is awesome.</p>
        			<span class="published">20th February, 2017</span>
    			</div>
		</section>

		<section id="content" class="body">
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


</html>
