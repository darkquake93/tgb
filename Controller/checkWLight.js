
var temp =  document.getElementById("wType").innerHTML;
var res = temp.substr(10, 11);
if(res === 1)
{
  res = "Light";
}
else {
  res = "Heavy";
}
document.getElementById("wType").innerHTML = "Wine Type: "+res;
