<!DOCTYPE html>
<html>
<!-- PHP Header Start -->

<?php
require_once '../Controller/authHeader.php';
require_once '../Model/browseWines.php';





$title='10 Green Bottles - Never enough wine!';
 ?>
 <script type="text/javascript" src="../Controller/browseWines.js"></script>
 <script type="text/javascript" src="../Controller/searchWine.js"></script>
 <script type="text/javascript" src="../Controller/searchRadControl.js"></script>
<!-- PHP Header End -->

<!-- Body Start -->
<body id="index" class="home" onload="wineSelect()">
	<h2 align="center">~ Wine of the Day ~</h2>
		<section id="content" class="body">
      <div class="tabs">
  <a href="javascript:void(0)" class="tablinks" onclick="openWine(event, 'Promotions')">Promotions</a>
  <a href="javascript:void(0)" class="tablinks" onclick="openWine(event, 'Red')">Red</a>
  <a href="javascript:void(0)" class="tablinks" onclick="openWine(event, 'White')">White</a>
  <a href="javascript:void(0)" class="tablinks" onclick="openWine(event, 'Sparkling')">Sparkling</a>
</div>

<div id="Promotions" class="tabcontent">
  <h3>Promotoed Wines</h3>
  <p>London is the capital city of England.</p>
</div>

<div id="Red" class="tabcontent">
  <h3>Popular Red Wines</h3>
  <div class="searchRadBtn">
    <label><input type="radio" name="searchOption" value="name" onclick="handleRadDiv('radOptionName')">Name</label>
    <label><input type="radio" name="searchOption" value="subCat" onclick="handleRadDiv('radOptionSubCat')">Sub Category</label>
    <label><input type="radio" name="searchOption" value="price" onclick="handleRadDiv('radOptionPrice')">Price</label>
    <div  id="radOptionName"class="Dname wRefine">
      <p>Enter the name of a wine
      <input type="text" id="findByName"></input>
      <button onclick="searchByName('Red')">Search</button>
      </p>
    </div>
    <div  id="radOptionSubCat" class="DsubCat wRefine">
        <p>Search By
        <select id="subCatOptions">
          <option value="light">Light</option>
          <option value="full">Full-Bodied</option>
        </select>
        <button onclick="searchBySub('Red');">Search</button>
      </p>
    </div>
    <div id="radOptionPrice" class="Dprice wRefine">
      <p>Set Max Price Limit
        <input type="number" id="findByPriceRange"></input>
        <button onclick="searchByPriceRange('Red') ">Search</button>
      </p>
    </div>
  </div>

<div id="listContainerR">
  <?php foreach ($rWines as $item): ?>
 <div class="wineContainer" id="redTab">
      <h4><?= $item->Name ?></h4>
      <p><?= $item->Descr ?></p>
    </div>
  <?php endforeach ?>
</div>
</div>


<div id="White" class="tabcontent">
  <h3>Popular White Wines</h3>
  <div class="searchRadBtn">
    <label><input type="radio" name="searchOption" value="name" onclick="handleRadDivW('radOptionNameW')">Name</label>
    <label><input type="radio" name="searchOption" value="subCat" onclick="handleRadDivW('radOptionSubCatW')">Sub Category</label>
    <label><input type="radio" name="searchOption" value="price" onclick="handleRadDivW('radOptionPriceW')">Price</label>
    <div  id="radOptionNameW"class="Dname wRefine">
      <p>Enter the name of a wine
      <input type="text" id="findByNameW"></input>
      <button onclick="searchByName('White')">Search</button>
         </p>
    </div>
    <div  id="radOptionSubCatW" class="DsubCat wRefine">
        <p>Search By
        <select id="subCatOptionsW">
          <option value="light">Light</option>
          <option value="full">Full-Bodied</option>
        </select>
        <button onclick="searchBySub('White');">Search</button>
      </p>
    </div>
    <div id="radOptionPriceW" class="Dprice wRefine">
      <p>Set Max Price Limit
        <input type="number" id="findByPriceRangeW"></input>
        <button onclick="searchByPriceRange('White') ">Search</button>
      </p>
    </div>
  </div>
  <div id="listContainerW">
  <?php foreach ($wWines as $item): ?>
    <div class="wineContainer">
      <p>Something Else </p>
      <h4><?= $item->Name ?></h4>
      <p><?= $item->Descr ?></p>
    </div>
  <?php endforeach ?>
</div>
</div>

<div id="Sparkling" class="tabcontent">
  <div class="searchRadBtn">
    <label><input type="radio" name="searchOption" value="name" onclick="handleRadDivS('radOptionNameS')">Name</label>
    <label><input type="radio" name="searchOption" value="subCat" onclick="handleRadDivS('radOptionSubCatS')">Sub Category</label>
    <label><input type="radio" name="searchOption" value="price" onclick="handleRadDivS('radOptionPriceS')">Price</label>
    <div  id="radOptionNameS"class="Dname wRefine">
      <p>Enter the name of a wine
      <input type="text" id="findByNameS"></input>
      <button onclick="searchByName('Sparkling')">Search</button>
      </p>
    </div>
    <div  id="radOptionSubCatS" class="DsubCat wRefine">
        <p>Search By
        <select id="subCatOptionsS">
          <option value="light">Light</option>
          <option value="full">Full-Bodied</option>
        </select>
        <button onclick="searchBySub('Sparkling');">Search</button>
      </p>
    </div>
    <div id="radOptionPriceS" class="Dprice wRefine">
      <p>Set Max Price Limit
        <input type="number" id="findByPriceRangeS"></input>
        <button onclick="searchByPriceRange('Sparkling') ">Search</button>
      </p>
    </div>
  </div>
  <div id="listContainerS">
  <?php foreach ($sWines as $item): ?>
    <div class="wineContainer">
      <h4><?= $item->Name ?></h4>
      <p><?= $item->Descr ?></p>
    </div>
  <?php endforeach ?>
</div>
</div>

        			<!-- <span class="published">20th February, 2017</span> -->

		</section>

<!-- PHP Footer Start -->
<?php include 'footer.php' ?>
<!-- PHP Footer End -->

</body>
<!-- Body End -->
</html>
