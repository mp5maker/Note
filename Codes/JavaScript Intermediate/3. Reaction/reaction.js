function init(){
	var submit = document.getElementById("submit");
	submit.addEventListener("click", showDisplay, false);
	submit.addEventListener("click", showAnotherDisplay, false);
}

function showDisplay(event){
	var target = event.target;
	console.log(target.id);
}

function showAnotherDisplay(event){
	var target = event.target;
	console.log(target.value);
}

window.onload = init;