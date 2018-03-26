var position = 0;
var playlist;
var video;
var effectFunction = null;

function init(){
 playlist = ['magic', 'urma'];
 video = document.getElementById("video");

 video.addEventListener("ended", nextVideo, false);
 video.addEventListener("play", processFrame, false);

 var controls = document.querySelectorAll("input.controls");
 for(var i = 0; i < controls.length; i++){
	controls[i].onclick = handleControl;
 }

 var effects = document.querySelectorAll("input.effects");
 for(var i = 0; i < effects.length; i++){
 	effects[i].onclick = handleEffect;
 }

 var videoSelection = document.querySelectorAll("input.videoSelection");
 for(var i = 0; i < videoSelection.length; i++){
 	videoSelection[i].onclick = handleVideoSelection;
 }

 video.src = playlist[position] + getFormatExtension();
 video.load();
 video.play();
}

function nextVideo(){
	position++;
	if(position >= position.length){
		postion = 0;
	}
	video.src = playlist[position] + getFormatExtension();
	video.load();
	video.play();
}

function getFormatExtension(){
	if(video.canPlayType("video/mp4") != ""){
		return  ".mp4";
	}
    else{
		return ", This video is not supported!";
	}
}

function handleControl(event){
	var target = event.target;
	switch(target.id){
		case "play":
		video.play();
		break;

		case "pause":
		video.pause();
		break;

		case "loop":
		if(video.loop == false){
			video.loop = true;
		}else{
			video.loop = false;
		}
		break;

		case "mute":
		if(video.muted == false){
			video.muted = true;
		}else{
			video.muted = false;
		}
		break;

		default: "Sorry this is not an option";	
	}
}


function handleVideoSelection(event){
	var target = event.target;
	if(target.id == "video1"){
		position = 0;
		video.src = playlist[position] + getFormatExtension();
		video.load();
		video.play();
	}
	if(target.id == "video2"){
		position = 1;
		video.src = playlist[position] + getFormatExtension();
		video.load();
		video.play();
	}
}

function handleEffect(event){
	var target = event.target;
	switch(target.id){
		case "normal":
		effectFunction = null;
		break;

		case "noir":
		effectFunction = "noir";
		break;
 		
 		case "western":
		effectFunction = "western";
		break;
 		
 		case "scifi":
		effectFunction = "scifi";
		break;
 		
 		case "cartoon":
		effectFunction = "cartoon";
		break;
 		
		default: "Not a valid effect";
	}
}

function processFrame(){
	if(video.paused || video.ended){
		return;
	}
	var bufferCanvas = document.getElementById("buffer");
	var buffer = bufferCanvas.getContext("2d"); 
	var displayCanvas = document.getElementById("display");
	var display = displayCanvas.getContext("2d"); 

	buffer.drawImage(video, 0, 0, bufferCanvas.width, bufferCanvas.height);
	var frame = buffer.getImageData(0, 0, bufferCanvas.width, bufferCanvas.height);
	var length = frame.data.length/4;
	for(var i = 0; i < length; i++){
		var r = frame.data[i*4 + 0];
		var g = frame.data[i*4 + 1];
		var b = frame.data[i*4 + 2];

		if(effectFunction == "noir"){
			var brightness = (3*r + 4*g +b) >>> 3;
			if(brightness < 0){brightness = 0;};
			frame.data[i*4 + 0] =  brightness;
            frame.data[i*4 + 1] = brightness;
		    frame.data[i*4 + 2] = brightness;
		}

		if(effectFunction == "western"){
			var brightness = (3*r + 4*g +b) >>> 3;
			frame.data[i*4 + 0] =  brightness + 40;
            frame.data[i*4 + 1] = brightness + 20;
		    frame.data[i*4 + 2] = brightness + 20;
		}

		if(effectFunction == "scifi"){
			var offset = i * 4;
			frame.data[offset] = Math.round(255 - r);
			frame.data[offset+1] = Math.round(255 - g);
			frame.data[offset+2] = Math.round(255 - b);
		}

		if(effectFunction == "cartoon"){
			var offset = i * 4;
			if(frame.data[offset] < 120){
				frame.data[offset] = 80;
				frame.data[offset+1] = 80;
				frame.data[offset+2] = 80;
			}
			else{
				frame.data[offset] = 255;
				frame.data[offset+1] = 255;
				frame.data[offset+2] = 255;
			}
		}

	}
	display.putImageData(frame, 0, 0);
	setTimeout(processFrame, 0);
}

window.onload = init;