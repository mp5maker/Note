function getMyLocation(){
	if(navigator.geolocation){
		navigator.geolocation.getCurrentPosition(displayLocation, displayError);
	}else{
		console.log("Geolocation Not Supported");
	}
}

function displayLocation(position){
	var latitude = position.coords.latitude;
	var longitude = position.coords.longitude;

	var div = document.getElementById("myLocation");
	div.innerHTML = "Latitude: " + latitude + "<br/>" +
	                "Longitude: " + longitude;
}

function displayError(error){
	var errorTypes = {
		0 : "Unknown error",
		1 : "Permission denied by user",
		2 : "Position is not available",
		3 : "Request timed out"
	};

	var errorMessage = errorTypes[error.code];
	if(error.code == 0 || error.code == 1){
		errorMessage = errorMessage + " " + error.message;
	}

	var div = document.getElementById("muLocation");
	div.innerHTML = errorMessage;
}

window.onload = getMyLocation;