function showhide(id) 
{
	var e = document.getElementById(id);
	e.style.display = (e.style.display == 'block') ? 'none' : 'block';
}

function hideButs() {
    var x = document.getElementById("myTopnav");
    if (x.className === "navbar") {
        x.className += " responsive";
    } else {
        x.className = "navbar";
    }
}

function menuSelect(choice) {
    $('nav ul li').removeClass();
    document.getElementById(choice).className = "active";
}
