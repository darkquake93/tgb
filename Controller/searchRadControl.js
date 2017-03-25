function handleRadDiv(divName) {
  $('#radOptionName').css('display','none');
  $('#radOptionSubCat').css('display', 'none');
  $('#radOptionPrice').css('display', 'none');
document.getElementById(divName).style.display = "inline";
}

function handleRadDivW(divName)
{
  $('#radOptionNameW').css('display','none');
  $('#radOptionSubCatW').css('display','none');
  $('#radOptionPriceW').css('display','none');
  document.getElementById(divName).style.display = "inline";
}

function handleRadDivS(divName)
{
  $('#radOptionNameS').css('display','none');
  $('#radOptionSubCatS').css('display','none');
  $('#radOptionPriceS').css('display','none');
  document.getElementById(divName).style.display = "inline";
}



// $(document).ready(function(){
// $("input[name='radio']").onclick(function(){
//   if($(this).attr('id') == 'name')
//   {
//     // $('#radOptionName').show();
//     // $('#radOptionPrice').hide();
//     // $('#radOptionSubCat').hide();
//   }
//   else if($(this).attr('id') == 'price')
//   {
//     // $('#radOptionPrice').show();
//     // $('#radOptionName').hide();
//     // $('#radOptionSubCat').hide();
//   }
//   else if($(this).attr('id') == 'subCat')
//   {
//       // $('#radOptionSubCat').show();
//       // $('#radOptionPrice').hide();
//       // $('#radOptionName').hide();
//   }
// }
// }
