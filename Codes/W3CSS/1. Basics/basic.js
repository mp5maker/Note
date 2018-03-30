function init(){
	var article = document.getElementsByTagName("span")[0];
	article.addEventListener("click", eventHandler, false);
}

function eventHandler(event){
	var target = event.target;
	target.parentElement.style.display = "none";
	
	var button = document.createElement("button");
	button.setAttribute("class", "w3-button w3-round-xxlarge");
	button.setAttribute("id", "showButton");
	var text = document.createTextNode("Show");
	button.append(text);
	
	var div = document.getElementById("show");
	div.setAttribute("class", "w3-center w3-cyan w3-round-xxlarge");
	div.append(button);
	var showButton = document.getElementById("showButton");
	if(showButton){
			showButton.onclick = function(event){
				var article = document.getElementById("article");
				article.style.display = "block";
				var div = document.getElementById("show");
				div.removeChild(event.target);
			};
		}
}


window.onload = init;