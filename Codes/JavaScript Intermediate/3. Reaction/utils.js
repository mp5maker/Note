function createRequest(){
	try{
		request = new XMLHttpRequest();

	}
	catch(tryMS){
		try{
			request = new ActiveXObject("Msxml2.XMLHttp");
		}
		catch(otherMS){
			try{
				request =  new ActiveXObject("Microsoft.XMLHttp");
			}
			catch(err){
				request = null;
			}
		}
	}
	return request;
}

function addEventListener(obj, eventName, handler){
	if(document.attachEvent){
		obj.attachEvent("on" + eventName, handler);
	}else if(document.addEventListener){
		obj.addEventListener(eventName, handler, false);
	}
}


window.onload = init;