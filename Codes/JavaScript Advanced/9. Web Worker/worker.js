onmessage = function(event){
	if(event.data == "ping"){
		importScripts("another_helper.js");
		postMessage(message);
	}
}