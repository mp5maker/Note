// $(document).ready(function(){
// 	$(window).focus(blink);

// 	$(".icon").click(function(){
// 		$(this).animate({
// 			opacity: 0,
// 			width: "200",
// 			height: "200",
// 		},5000);
// 	});
// });

// function blink(){
//  $("#light1").fadeOut(Math.floor(Math.random()*2000))
//  	         .fadeIn(Math.floor(Math.random()*2000));
//  $("#light2").fadeOut(Math.floor(Math.random()*2000))
//  	         .fadeIn(Math.floor(Math.random()*2000));
//  setInterval(blink, 5000);
// }

$(document).ready(function(){
	$(".icon").click(function(){
		$(this).animate({
			right: "+=100px"
		}, 5000);
	});
});