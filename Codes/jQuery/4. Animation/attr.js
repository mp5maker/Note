$(document).ready(function(){
	$("#showImage").click(function(){
		if(!document.getElementById("desktop")){
			var image = document.createElement("img");
			$(image).attr("src", "images/desktop.ico");
			$(image).attr("id", "desktop");
			$("#image-container").append(image);
			$("#showImage").html("Boom I am back!");
		}else{
			var image = document.getElementById("desktop");
			document.getElementById("image-container").removeChild(image);
			$("#showImage").html("Click me again!");
		}
	});
});