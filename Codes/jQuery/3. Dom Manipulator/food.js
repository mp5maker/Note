var $deleted = [];

$(document).ready(function(){
	$("#vegetarian").click(function(){
		$deleted.push($(".menu-list > .meat")[0]);
		$deleted.push($(".menu-list > .meat")[1]);
		$(".menu-list > .meat").each(function(){
			$(this).detach();
		})
	});

	$("#restore").click(function(){
		$(".menu-list").children().eq(4).before($deleted[0]);
		$(".menu-list").children().eq(9).before($deleted[1]);
	});
});