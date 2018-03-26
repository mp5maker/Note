function init(){
	localStorage.setItem("sticky_0", "Pick up dry cleaning");
	localStorage.setItem("sticky_1", "Go to the bookstore");

	for(var i = 0; i < localStorage.length; i++){
		var key = localStorage.key(i);
		console.log(localStorage[key]);
	}
}

window.onload = init;