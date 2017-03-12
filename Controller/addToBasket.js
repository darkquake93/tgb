function getBasketInfo(wine_id)
{
  var quan = document.getElementById('wineQuantity').value;

  var user_id  = document.cookie;
  alert(user_id);

  if(quan != 0 && quan != "" && quan != null)
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

 if(user_id == 'PHPSESSID=mb8gisc1dj10pc24acg8im1hh1')
 {
   alert("Please create an account");
   window.location.replace("https://kunet.kingston.ac.uk/~k1415390/Workshop%202/Project%201.1/View/register.php");
 }
 else
 {
   user_id = user_id.substr(38,40);
   user_id = parseInt(user_id);
   alert(user_id);
   $.get("../Controller/addToBasketService.php?wine_id="+wine_id+"&user_id="+user_id+"&quan="+quan, addCallBack);
 }

 }
 else
 {
   alert('Please enter a qauntity');
 }
}


function addCallBack($result)
{
  alert("Got here");
}

function getBasket()
{
    var user_id  = document.cookie;
    user_id = user_id.substr(38,40);
    user_id = parseInt(user_id);
    $.get("../Controller/getBasketService.php?user_id="+user_id, getCallBack);
}

function getCallBack($result)
{
  alert("Got here, (Call back function js)");
}


  //window.location.href = "myphpfile.php?quan="+quan;




  // build basket items into cookies array using json
  // ** Or simpler just add more string in dynamically
