<?php
// $root = realpath($_SERVER['DOCUMENT_ROOT']);
// //$root = substr($root, 0, 9);
// include "$root"+'Workshop 2/Project 1.1/dBcon.php';
require_once 'dBcon.php';
require_once 'Wine.php';

$rWinesQ = $conn->query("SELECT * FROM Wine WHERE Category = 'Red' ORDER BY Purchases DESC");
$rWinesQ->execute();
$rWines = $rWinesQ->fetchAll(PDO::FETCH_CLASS, "Wine");

$wWinesQ = $conn->query("SELECT * FROM Wine WHERE Category = 'White' ORDER BY Purchases DESC");
$wWinesQ->execute();
$wWines = $wWinesQ->fetchAll(PDO::FETCH_CLASS, "Wine");

$sWinesQ = $conn->query("SELECT * FROM Wine WHERE Category = 'Sparkling' ORDER BY Purchases DESC");
$sWinesQ->execute();
$sWines = $sWinesQ->fetchAll(PDO::FETCH_CLASS, "Wine");

function getWinesBySubCat($subcat, $cat)
{
  global $conn;
  $sql = $conn->prepare('SELECT * FROM Wine WHERE Category= ? AND subCategory = ? ');
  $sql->execute([$cat,$subcat]);
  $srWines = $sql->fetchAll(PDO::FETCH_CLASS, "Wine");
  return $srWines;
}

function getWineBySubCatJson($subcat, $cat)
{
  $wines = getWinesBySubCat($subcat, $cat);
  return json_encode($wines);
}

function getWineByName($cat, $name)
{
  global $conn;
  $sql = $conn->prepare('SELECT * FROM Wine WHERE Category= ? AND Name =?');
  $sql->execute([$cat, $name]);
  $wine = $sql->fetchAll(PDO::FETCH_CLASS, "Wine");
  return $wine;
}

function getWineByNameJson($cat, $name)
{
  $wine = getWineByName($cat, $name);
  return json_encode($wine);
}

function getWinesByPriceRange($priceRange, $cat)
{
  global $conn;
 //$cat = (int)$cat;
  $sql = $conn->prepare('SELECT * FROM Wine WHERE Category = ? AND Price < ?');
  $sql->execute([$cat, $priceRange]);
  $rangeWine = $sql->fetchAll(PDO::FETCH_CLASS, "Wine");
  return $rangeWine;

}

function getWinesByPriceRangeJson($priceRange, $cat)
{
  $rangeWine = getWinesByPriceRange($priceRange, $cat);
  return json_encode($rangeWine);
}


?>
