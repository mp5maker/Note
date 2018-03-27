function init(){
	var username = document.getElementById("username");
	username.onblur = checkUsername;
}

function checkUsername(event){
	var target = event.target;
    var request = createRequest();
    if(request == null){
    	return;
    }
    var url = "validation.php?username=" + escape(target.value.trim()); 
    request.open("GET", url, true);
    request.onreadystatechange = usernameStatus;
    request.send(null);
}

function usernameStatus(){
	if(request.readyState == 4 || request.status == 200){
		var username = document.getElementById("usernameCheck")
		var userimage = document.getElementById("usernameImage");
		var button = document.getElementById("register");
		userimage.src = "images/loading.gif";
		if(request.responseText == "usernameexist"){
			username.innerHTML = "Username Exists";
		   	userimage.src = "images/denied.png";
		   	register.disabled = true;
		}
		else{
		   username.innerHTML = "Username Approved";
		   userimage.src = "images/accept.png";
		   register.disabled = false;
		}
	}
}

function createRequest(){
	try{
		request = new XMLHttpRequest();
	}catch(tryMS){
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