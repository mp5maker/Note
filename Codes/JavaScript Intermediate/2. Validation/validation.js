var checkStatus = [];
var position = 0;

function init(){
	var username = document.getElementById("username");
	username.onblur = checkUsername;

	var password2 = document.getElementById("password2");
	password2.onblur = checkPassword;

	var register = document.getElementById("register");
	register.addEventListener("click", checkSubmit, false); 

	setInterval(scrollImages, 2000);
}

function scrollImages(){
	var images = document.querySelectorAll(".con");
	console.log(images[position]);
	if(position == 0){
		if(images[images.length-1] == undefined){}
		else{
			images[images.length-1].removeAttribute("id");
		}
	}
	else if(position < images.length){
		images[position-1].removeAttribute("id");
	}

	images[position].setAttribute("id", "display");
	if(position < (images.length - 1)){
		position++;
	}
	else if(position = images.length){
		position = 0;
	}
}

function checkSubmit(){
	var submitCheck = document.getElementById("submitCheck");
	var submitImage = document.getElementById("submitImage");
	if(checkStatus["username"] == "valid" && 
	   checkStatus["password"] == "valid"){
	    submitImage.src = "images/accept.png";
	    var request = createRequest();
	    var user = document.getElementById("username").value;
	    var pass = document.getElementById("password").value;
	    var url =  "validation.php?submit=confirm&pass=" + pass 
	                + "&user=" + user;
	    request.open("GET", url, true);
	    request.onreadystatechange = function(){
	    	if(request.status == 200 || request.readyState == 4){
	    		console.log(request.responseText);
	    	}
	    }
	    request.send(null);
	}
	else{
		submitImage.src = "images/denied.png";
		submitCheck.innerHTML = "Please, Fill the form";
	}
}

function checkPassword(){
	var password = document.getElementById("password");
	var passCheck = document.getElementById("passwordCheck");
	var passImage = document.getElementById("passwordImage");
	if(escape(this.value.trim()) == escape(password.value.trim()) &&
	   escape(this.value.trim()) !=  ""  &&
	   escape(password.value.trim())){
		passCheck.innerHTML = "Password Matched";
		document.getElementById("register").disabled = false;
		passImage.src = "images/accept.png";
		checkStatus['password'] = "valid";
	}
	else{
		passCheck.innerHTML = "Password Do Not Match";
		document.getElementById("register").disabled = true;
		passImage.src = "images/denied.png";
		checkStatus['password'] = "invalid";
	}
}

function checkUsername(event){
	var target = event.target;
	var value = escape(target.value.trim());
	if(value == null || value == ""){
		var username = document.getElementById("usernameCheck");
		var userimage = document.getElementById("usernameImage");
		username.innerHTML = "You cannot have empty username";
		userimage.src = "images/denied.png";
		target.select();
		target.focus();
	}
	else{
	    var request = createRequest();
	    if(request == null){
	    	return;
	    }
	    var url = "validation.php?username=" + escape(target.value.trim()); 
	    request.open("GET", url, true);
	    request.onreadystatechange = usernameStatus;
	    request.send(null);
	}
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
		   	var user = document.getElementById("username");
		   	user.focus();
		   	user.select();
		   	register.disabled = true;
		    checkStatus['username'] = "invalid";
		}
		else{
		   username.innerHTML = "Username Approved";
		   userimage.src = "images/accept.png";
		   checkStatus['username'] = "valid";
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