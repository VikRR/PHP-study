function showCities(countryid){
	if (countryid == "") {
		document.getElementById('citylist').innerHTML="";
	}
	if (window.XMLHttpRequest) {
		ao = new XMLHttpRequest();
	}
	else{
		ao = new ActiveXObject('Microsoft.XMLHTTP');
	}
	ao.onreadystatechange = function(){
		if (ao.readyState == 4 && ao.status == 200) {
			document.getElementById('citylist').innerHTML = ao.responseText;
		}
	}
	ao.open("GET", "pages/ajax1.php?coid="+countryid, true);
	ao.send(null);
}
function showHotels(cityid){
	// alert(cityid);
if (cityid == "") {	
		document.getElementById('hotellist').innerHTML="";
	}
	if (window.XMLHttpRequest) {
		ao = new XMLHttpRequest();
	}
	else{
		ao = new ActiveXObject('Microsoft.XMLHTTP');
	}
	ao.onreadystatechange = function(){
		if (ao.readyState == 4 && ao.status == 200) {
			document.getElementById('hotellist').innerHTML = ao.responseText;
		}
	}
	// ao.open("GET", "pages/ajax2.php?hoid="+cityid, true);
	ao.open("POST", "pages/ajax2.php", true);
	ao.setRequestHeader("Content-Type","Application/x-www-form-urlencoded");
	ao.send("hoid="+cityid);
}
