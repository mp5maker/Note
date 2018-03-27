function init(){
	var thumbnails = document.getElementsByClassName("thumbnails");
	for(var i = 0; i < thumbnails.length; i++){
		thumbnails[i].onclick = thumbnailHandler;
	}
}

function thumbnailHandler(event){
	var target = event.target;
	switch(target.id){
		case "desktop":
		var image = "images/" +  target.id + ".ico";
		createChild(image); 
		getDetails(target.id);
		break;
		
		case "harddrive":
		var image = "images/" +  target.id + ".ico";
		createChild(image); 
		getDetails(target.id);
		break;
		
		case "trash":
		var image = "images/" +  target.id + ".ico";
		createChild(image); 
		getDetails(target.id);
		break;
		
		case "folder":
		var image = "images/" +  target.id + ".ico";
		createChild(image); 
		getDetails(target.id);
		break;

		default: "This is not a option!";
	}
}


function createChild(image){
	var elementExists = document.getElementById("image-description");
	var description = document.getElementById("description-pane");
	if(elementExists){
		elementExists.remove();
	}
	var img = document.createElement("img");
	img.setAttribute("id", "image-description");
	img.src = image;
	description.appendChild(img);
}

function getDetails(imageID){
	var request = createRequest();
	if(request == null){
		alert("Unable to create request");
		return;
	}

	var url = "ajax.php?ImageID=" + escape(imageID);
	request.open("GET", url, true);
	request.onreadystatechange = function(){
		if(request.readyState == 4 || request.status == 200){
			var text = document.getElementById("description-text");
			text.innerHTML = request.responseText;
		}
	}
	request.send(null);
}

function createRequest(){
	try{
		request = new XMLHttpRequest();
	}
	catch(tryMS){
		try{
			request = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(otherMS){
			try{
				request = new ActiveXObject("Microsoft.XMLHTTP");
			}catch(err){
				request = null;
			}
		}
	}
	return request;
}

window.onload = init;