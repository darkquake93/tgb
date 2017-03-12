<!DOCTYPE html>
<html>
<?php
    $title='10 Green Bottles - Wines';
    require_once '../Controller/authHeader.php';
    require_once '../Model/browseWines.php';
?>
    
    <script>$(function(){
        menuSelect('wines');
        $('#Promotions').show();
    })</script>

    <h2>~ Wines by Category ~</h2>

    <section id="content">

        <div class="tabs">
            <a href="#" class="tablinks active" onclick="openWine(event, 'Promotions')">Promotions</a>
            <a href="#" class="tablinks"        onclick="openWine(event, 'Red'       )">Red</a>
            <a href="#" class="tablinks"        onclick="openWine(event, 'White'     )">White</a>
            <a href="#" class="tablinks"        onclick="openWine(event, 'Sparkling' )">Sparkling</a>
        </div>

        <div id="Promotions" class="tabcontent">
            <h3>Promoted Wines</h3>
            <p>London is the capital city of England.</p>
        </div>

        <div id="Red" class="tabcontent">
          <h3>Popular Red Wines</h3>
          <p>Search By
          <select id="subCatOptions">
            <option value="light">Light</option>
            <option value="full">Full-Bodied</option>
          </select>
          <button onclick="searchBySub('Red');">Search</button>
        </p>
          <?php foreach ($rWines as $item): ?>
            <div class="wineContainer">
              <h4><?= $item->Name ?></h4>
              <p><?= $item->Descr ?></p>
            </div>
          <?php endforeach ?>
        </div>

        <div id="White" class="tabcontent">
          <h3>Popular White Wines</h3>
          <select>
            <option>Light</option>
            <option>Full-Bodied</option>
          </select>
          <?php foreach ($wWines as $item): ?>
            <div class="wineContainer">
              <p>Something Else </p>
              <h4><?= $item->Name ?></h4>
              <p><?= $item->Descr ?></p>
            </div>
          <?php endforeach ?>
        </div>

        <div id="Sparkling" class="tabcontent">
          <h3>Popular Sparkling Wines</h3>
          <select>
            <option>Light</option>
            <option>Full-Bodied</option>
          </select>
          <?php foreach ($wWines as $item): ?>
            <div class="wineContainer">
              <h4><?= $item->Name ?></h4>
              <p><?= $item->Descr ?></p>
            </div>
          <?php endforeach ?>
        </div>

    </section>

<?php include 'footer.php' ?>
</html>

