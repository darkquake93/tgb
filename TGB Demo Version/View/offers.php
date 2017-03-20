<!DOCTYPE html>
<html>
<!-- PHP Header Start -->
<?php
    $title='10 Green Bottles - Offers';
    require_once '../Controller/authHeader.php';
?>
<!-- PHP Header End -->

<!-- Body Start -->
<script>$(function(){menuSelect('offers')})</script>
	<h2 align="center">~ Latest Offers ~</h2>
		<section id="content" class="body responsive">
			<div class="hentry">
        			<h3><a href="#">Offer 1</a></h3>
				<p>Today's top offer</p>
        			<span class="published">20th February, 2017</span>
    			</div>
		</section>
		<section id="content" class="body">
			<div class="hentry">
        			<h3><a href="#">Offer 2</a></h3>
				<p>Today's next offer</p>
        			<span class="published">20th February, 2017</span>
    			</div>
		</section>

<!-- PHP Footer Start -->
<?php include 'footer.php' ?>
<!-- PHP Footer End -->
</body>
<!-- Body End -->
</html>
