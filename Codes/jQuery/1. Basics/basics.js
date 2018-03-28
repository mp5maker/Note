$(document).ready(function(){
	$("#hide").click(function(){
		$("#text").hide(2000);
	});

	$("#show").click(function(){
		$("#text").show(2000);
	});

	$("#toggle").click(function(){
		$("#text").toggle(2000);
	});
	
	$("#slide-up").click(function(){
		$("#text").slideUp(2000);
	});
	
	$("#slide-down").click(function(){
		$("#text").slideDown(2000);
	});
	
	$("#slide-toggle").click(function(){
		$("#text").slideToggle(2000);
	});

	$("#fade-in").click(function(){
		$("#text").fadeIn(2000);
	});

	$("#fade-out").click(function(){
		$("#text").fadeOut(2000);
	});
});