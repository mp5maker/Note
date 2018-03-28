function init(){
   request = createRequest();
   var url = "post.php";
   var requestData = "call=calling";
   request.open("POST", url, true);
   request.onreadystatechange = postHandler;
   request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   request.send(requestData);
}

function postHandler(){
	if(request.readyState == 4 && request.status == 200){
		console.log(request.responseText);
	}
}

function createRequest(){
	try{
		request = new XMLHttpRequest();
	}catch(tryMS){
		try{
			request = new ActiveXObject("mxxml2.XMLHTTP");
		}catch(otherMS){
			try{
				request = new ActiveXObject("Microsoft.XMLHTTP")
			}catch(err){
				request = null;
			}
		}
	}
	return request;
}
window.onload = init;