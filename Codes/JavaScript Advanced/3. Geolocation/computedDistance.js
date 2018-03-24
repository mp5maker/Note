function getGeo(){
	if(navigator.geolocation){
		navigator.geolocation.getCurrentPosition(displayLocation, displayError);
	}else{
		var div = document.getElementById("distance");
		div.innerHTML = "Geolocation Not Supported!";
	}
}

function displayLocation(pos){
    var div = document.getElementById("distance");
    latitude = pos.coords.latitude;
    longitude = pos.coords.longitude;
    div.innerHTML = "Longitude: " +  latitude + "<br/>" + 
    				"Longitude: " + longitude;
    var lat2 = 47.624;
    var long2 = -122.52088;

    var distance = computingDistance(latitude, longitude, lat2, long2);
    var computed = document.getElementById("computed");
    computed.innerHTML = distance;				
}

function displayError(err){
	var errorTypes = {
		0: "Unknown error",
		1: "User Permission Denied",
		2: "Position Unavailable",
		3: "Request Timed Out",
	};
   
   var errorMessage = error.types[err.code];
   if(err.code == 0 || err.code == 2){
   		errorMessage = errorMessage + " " + err.message;
   }
   var div = document.getElementById("distance");
   div.innerHTML = errorMessage;
}

function computingDistance(lat1, long1, lat2, long2){
	var radius = 6371;
	
	var latitude1 = degreesToRadian(lat1);
	var longitude1 = degreesToRadian(long1);
	
	var latitude2 = degreesToRadian(lat2);
	var longitude2 = degreesToRadian(long2);

	var delta_lat = degreesToRadian((lat2 - lat1));
	var delta_long = degreesToRadian((long2 - long1));
	
	var a = Math.pow(Math.sin(delta_lat/2), 2) +
	        Math.cos(latitude1/2) * Math.cos(latitude2/2) * Math.pow(Math.sin(delta_long/2),2);
	var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
	var d = radius * c;

	return d;
}

function degreesToRadian(deg){
   return ((Math.PI * deg)/180);
}

window.onload = getGeo;