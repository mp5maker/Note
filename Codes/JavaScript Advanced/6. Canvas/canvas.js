function init(){
	var previewButton = document.getElementById("preview");
	previewButton.onclick = previewHandler;
}

function previewHandler(){
	var canvas = document.getElementById("drawing");
	if(canvas.getContext){
		var context = canvas.getContext("2d");
		var shape = document.getElementById("shape");
		fillBackgroundColor(canvas, context);

		var text_color = document.getElementById("text_color");

		var selectedIndex = shape.selectedIndex;
		var shape = shape[selectedIndex].value;

		var selectedIndex = text_color.selectedIndex;
		var text_color = text_color[selectedIndex].value;

		if(shape == "square"){
			for(var i = 0; i < 50; i++){
				drawSquare(canvas, context);
			}
		}
	   
	    if(shape == "circle"){
			for(var i = 0; i < 20; i++){
				drawCircle(canvas, context);
			}
		}

		drawText(canvas, context);
		drawImage(canvas, context);
	}
	else{canvas.innerHTML = "Sorry, your browser do not support Canvas API";}
}

function fillBackgroundColor(canvas, context){
	var bgd_color = document.getElementById("bgd_color");
	var selectedIndex = bgd_color.selectedIndex;
	var bgd_color = bgd_color[selectedIndex].value;
	context.fillStyle = bgd_color;
	context.fillRect(0, 0, canvas.width, canvas.height);
}

function drawSquare(canvas, context){
	var locationX = Math.floor(Math.random() * canvas.width);
	var locationY = Math.floor(Math.random() * canvas.height);
	var size = Math.floor(Math.random() * 40);
	context.fillRect(locationX, locationY, size, size);
	context.fillStyle = "lightblue";
}

function drawCircle(canvas, context){
	context.fillStyle = "lightblue";
	var locationX = Math.floor(Math.random() * canvas.width);
	var locationY = Math.floor(Math.random() * canvas.height);
	var size = Math.floor(Math.random() * 40);
	context.beginPath();
	context.arc(locationX, locationY, size, 0, 2 * Math.PI, true);
	context.fillStyle = "lightblue";
	context.fill();
}

function drawText(canvas, context){
	var tweet = document.getElementById("tweet");
	var tweet = tweet.value;
	context.textAlign = "left";
	context.font = "italic bold 1.4em Sem Times, serif"
	context.fillStyle = "maroon";
	context.fillText(tweet, 250, 100);
}

function drawImage(canvas, context){
	var image = new Image();
	image.src = "icon.ico";
	context.drawImage(image, 20, 120, 70, 70);
}

window.onload = init;