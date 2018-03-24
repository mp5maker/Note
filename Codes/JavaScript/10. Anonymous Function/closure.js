// var count = 0;

// function init(){
// 	console.log(counter());
// 	console.log(counter());
// 	console.log(counter());
// }

// function counter(){
// 	count += 1;
// 	return count;
// }

// window.onload = init;

function init(){
	makeTimer("Cooking Time Over!", 3000);
}

function makeTimer(message, time){
	setTimeout(function(){alert(message)}, time);
}

window.onload = init();