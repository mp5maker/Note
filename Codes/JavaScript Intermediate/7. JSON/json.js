function init(){
   request = createRequest();
   var url = "json.php?call=calling";
   request.open("GET", url, true);
   request.onreadystatechange = jsonHandler;
   request.send(null);
}

function jsonHandler(){
	if(request.readyState == 4 && request.status == 200){
		// var json = eval('('+request.responseText +')');
		var json = JSON.parse(request.responseText);
		console.log(json.Sam);
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