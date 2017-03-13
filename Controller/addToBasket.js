function getBasketInfo(wine_id)
{
  var quan = document.getElementById('wineQuantity').value;

  var user_id = getCookie('user_id');
    alert(user_id);

  if(quan != 0 && quan != "" && quan != null)
  {

  var basketNum = document.getElementById('basket2').innerHTML;
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

 if(user_id == '')
 {
   alert("Please create an account");
   window.location.replace("https://kunet.kingston.ac.uk/~k1415390/Workshop%202/Project%201.1/View/register.php");
 }
 else
 {
   
   alert(user_id+'About to do some Ajax!');
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


function getCookie(c_name) {
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=");
        if (c_start != -1) {
            c_start = c_start + c_name.length + 1;
            c_end = document.cookie.indexOf(";", c_start);
            if (c_end == -1) {
                c_end = document.cookie.length;
            }
            return(unescape(document.cookie.substring(c_start, c_end)));
        }
    }
    return("Error Cannot locate field"+c_name);
}


  //window.location.href = "myphpfile.php?quan="+quan;




  // build basket items into cookies array using json
  // ** Or simpler just add more string in dynamically
