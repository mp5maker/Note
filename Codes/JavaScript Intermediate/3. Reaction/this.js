function init(){
	var submit = document.getElementById("submit");
	submit.addEventListener("click", eventHandler, false);
}

function eventHandler(event){
	console.log(this.id);
	console.log(event.target.id);
}

window.onload = init;