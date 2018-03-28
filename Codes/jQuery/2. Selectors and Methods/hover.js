$(document).ready(function(){
	$("#hover").bind("mouseover",function(){
		if($(this).hasClass("hover-on")){}
		else{$(this).addClass("hover-on");}
	});

	$("#hover").bind("mouseleave", function(){
		if($(this).hasClass("hover-on")){
			$(this).removeClass("hover-on");
		}
	});
});