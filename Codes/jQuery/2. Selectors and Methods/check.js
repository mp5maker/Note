$(document).ready(function(){
	$("#check").click(function(){
		console.log($.contains(document.getElementById("container"), this));

		var outsider = document.getElementById("outsider");
		console.log($.contains(document.getElementById("container"), outsider));
	});
});

