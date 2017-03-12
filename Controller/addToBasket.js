function getBasketInfo()
{
  var basketNum = document.getElementById('basketA').innerHTML;
 basketNum = basketNum.substr(6);
 if(basketNum == "")
 {
     $("#basket a").text("Basket 1");
 }
 else
 {
   var num = parseInt(basketNum);
    var ans = num+1;
      $("#basket a").text("Basket "+ans);
 }


  //window.location.href = "myphpfile.php?quan="+quan;

  alert(ans);

  // build basket items into cookies array using json
  // ** Or simpler just add more string in dynamically
}
