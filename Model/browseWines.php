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
?>
