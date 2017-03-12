function searchBySub(cat)
{

  var optionText = getSelectedText('subCatOptions');
  $.get("../PHP/getWinesBySubService.php?subcat="+optionText+"&cat="+cat, searchCallback);
}


  function getSelectedText(elementId) {
    var elt = document.getElementById(elementId);
    return elt.options[elt.selectedIndex].text;
}

function searchCallback(result)
{
  result.forEach(function(element) {
      console.log(element);
  });
  //Pick apart and load render back in
}
