var watchId = null;
var map;

function getMyLocation(){
	if(navigator.geolocation){
		var watchButton = document.getElementById("watch");
		watchButton.onclick = watchLocation;
		var clearWatchButton = document.getElementById("clearWatch");
		clearWatchButton.onclick = clearWatch;
	}
	else{
		console.log("Geolocation is not supported!");
	}
}

function watchLocation(){
	watchId = navigator.geolocation.watchPosition(displayLocation, displayError);
}

function clearWatch(){
	if(watchId){
		navigator.geolocation.clearWatch(watchId);
		watchId = null;
	}
}

function displayLocation(pos){
    var div = document.getElementById("location");
    latitude = pos.coords.latitude;
    longitude = pos.coords.longitude;
    accuracy = pos.coords.accuracy;
    div.innerHTML = "Longitude: " +  latitude + "<br/>" + 
    				"Longitude: " + longitude + "<br/>" +
    				"Accuracy: " + accuracy;
	if(map == null){
		showMap(pos.coords);
	}			
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
   var div = document.getElementById("location");
   div.innerHTML = errorMessage;
}


function showMap(coords){
	var LatLng = new google.maps.LatLng(coords.latitude, coords.longitude);
	var mapOptions = {
		zoom: 19,
		center: LatLng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	var divMap = document.getElementById("map");
	map = new google.maps.Map(divMap, mapOptions);

	var title = "Eastern";
	var content = "Latitude: " + coords.latitude + ", Longitude: " + coords.longitude;

	var marker = new google.maps.Marker({
	    position: LatLng,
	    map: map,
	    title: 'Eastern!',
	    clickable: true
	  });

	var infoWindowOptions = {
		content: content,
		position: LatLng
	};
	var infoWindow = new google.maps.InfoWindow(infoWindowOptions);

	google.maps.event.addListener(marker, "click", function(){
		infoWindow.open(map);
	});
}
window.onload = getMyLocation;
