var div = document.getElementById('computed');
var myLatitude = 23.740935399999998;
var myLongitude = 90.4122266;
// var watchId = null;

function init(){
	if(navigator.geolocation){
		var positionOptions = {
			timeout: Infinity,
			maximumAge: 0
		}
	 	// watchId = navigator.geolocation.watchPosition(displayLocation, displayError, positionOptions);
	 	navigator.geolocation.getCurrentPosition(displayLocation, displayError, positionOptions);
	}else{
	 	div.innerHTML = "Geolocation Not Supported!";
	}
}

// function clearWatch(){
// 	if(watchId){
// 		navigator.geolocation.clearWatch(watchId);
// 		watchId = null;
// 	}
// }

function displayLocation(pos){
 	var latitude = pos.coords.latitude;
 	var longitude = pos.coords.longitude;
 	var distance = computingDistance(myLatitude, myLongitude, latitude, longitude);
 	div.innerHTML = "You are approximately <strong> "+ distance + " </strong> km away";
 	showMap(pos.coords);
}

function showMap(coords){
	var LatLng = new google.maps.LatLng(coords.latitude, coords.longitude);
	var myLatLng = new google.maps.LatLng(myLatitude, myLongitude);
	
	var mapOptions = {
		zoom: 19,
		center: LatLng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	var divMap = document.getElementById("map");
	map = new google.maps.Map(divMap, mapOptions);

	var marker = new google.maps.Marker({
	    position: myLatLng,
	    map: map,
	    title: "Coffee Raid Inc.",
	    clickable: true
	  });
	var infoWindowOptions = {
		content: "Coffee Raid: Wouldn't you like to have one?",
		position: myLatLng
	};
	var infoWindow = new google.maps.InfoWindow(infoWindowOptions);
	google.maps.event.addListener(marker, "click", function(){
		infoWindow.open(map);
	});
		
	var marker2 = new google.maps.Marker({
	    position: LatLng,
	    map: map,
	    title: "Your Location!",
	    clickable: true
	  });
	var infoWindowOptions2 = {
		content: "Your Current Approximate Position",
		position: LatLng
	};
	var infoWindow2 = new google.maps.InfoWindow(infoWindowOptions2);
	google.maps.event.addListener(marker2, "click", function(){
		infoWindow2.open(map);
	});

	var lineCoordinates = [
	  {lat: myLatitude, lng: myLongitude},
	  {lat: coords.latitude, lng: coords.longitude}
	];
	var linePath = new google.maps.Polyline({
	  path: lineCoordinates,
	  geodesic: true,
	  strokeColor: '#FF0000'
	});

	linePath.setMap(map);
}

function displayError(err){
	var errorTypes = {
		0: 'Unknown error',
		1: 'User Persmission Denied',
		2: "Position Unavailable",
		3: "Request Timed Out"
	};
	var errorMessage = errorTypes[err.code];
	if(err.code == 0 || err.code == 2){
		errorMessage = errorMessage + " " + err.message;
	}
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
