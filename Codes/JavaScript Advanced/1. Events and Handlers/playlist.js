function init(){
	var button = document.getElementById("addButton");
	button.onclick = handleButtonClick;
}

function handleButtonClick(){
	var textInput = document.getElementById("songTextInput");
	var songName = textInput.value;

	var list = document.createElement("li");
	list.innerHTML = songName;

	var unorderedList = document.getElementById("playlist");
	unorderedList.appendChild(list);
}

window.onload = init;