function searchBySub(cat)
{
  var optionText;
  if(cat == 'Red')
  {
    var optionText = getSelectedText('subCatOptions');
  }
  else if(cat == 'White')
  {
    var optionText = getSelectedText('subCatOptionsW');

  }
  else if(cat == 'Sparkling')
  {
      var optionText = getSelectedText('subCatOptionsS');
  }

  $.get("../Controller/getWinesBySubService.php?subcat="+optionText+"&cat="+cat, searchCallback);
}


  function getSelectedText(elementId) {
    var elt = document.getElementById(elementId);
    return elt.options[elt.selectedIndex].text;
}

function searchCallback(result)
{

   buildListContainer(result);

  //Pick apart and load render back in
}

function searchByName(cat)
{
  var name;
  if(cat == 'Red')
  {
    var name = document.getElementById('findByName').value;
  }

  else if(cat == 'White')
  {
    var name = document.getElementById('findByNameW').value;

  }

  else if(cat == 'Sparkling')
  {
      var name = document.getElementById('findByNameS').value;
  }

  alert(name);
  $.get("../Controller/getWineByNameService.php?name="+name+"&cat="+cat, nameCalBack);
}

function nameCalBack(result)
{
    buildListContainer(result);
}

function searchByPriceRange(cat)
{

  var priceRange;
  if(cat == 'Red')
  {
    var priceRange = document.getElementById('findByPriceRange').value;
  }
  else if(cat == 'White')
  {
    var priceRange = document.getElementById('findByPriceRangeW').value;

  }
  else if(cat == 'Sparkling')
  {
      var priceRange = document.getElementById('findByPriceRangeS').value;
  }

 $.get("../Controller/getWinesByPriceRangeService.php?cat="+cat+"&priceRange="+priceRange, pRangeCallBack);
}

function pRangeCallBack(result)
{
  buildListContainer(result);
}




function buildListContainer(result)
{
  if (result === undefined || result.length == 0) {
    alert("Nothing in array");
}
  var wineType = result[0].Category;
  if(wineType == 'Red'){

  var cNode = document.getElementById("listContainerR");
  while (cNode.firstChild)
  {
    cNode.removeChild(cNode.firstChild);
  }
  result.forEach(function(element) {
    document.getElementById('listContainerR').innerHTML += "<h4>"+element.Name+"</h4><p>"+element.Descr+"</p>";
  });
}
else if(wineType == 'White')
{
  var cNode = document.getElementById("listContainerW");
  while (cNode.firstChild)
  {
    cNode.removeChild(cNode.firstChild);
  }
  result.forEach(function(element) {
    document.getElementById('listContainerW').innerHTML += "<h4>"+element.Name+"</h4><p>"+element.Descr+"</p>";
  });
}
else if(wineType == 'Sparkling')
{
  var cNode = document.getElementById("listContainerS");
  while (cNode.firstChild)
  {
    cNode.removeChild(cNode.firstChild);
  }
  result.forEach(function(element) {
    document.getElementById('listContainerS').innerHTML += "<h4>"+element.Name+"</h4><p>"+element.Descr+"</p>";
  });
}
}
