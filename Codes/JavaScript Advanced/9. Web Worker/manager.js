function init(){
	var worker = new Worker('worker.js');
	worker.postMessage("ping");

	worker.onmessage = function(event){
		message = event.data;
		worker = event.target;
		document.getElementById("output").innerHTML = worker + ": " + message;
		console.log(message);
	};
}
window.onload  = init;