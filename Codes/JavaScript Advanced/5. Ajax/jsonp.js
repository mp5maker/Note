window.onload = function(){
	setInterval(handleRefresh, 3000);
};

function handleRefresh(){
	var url = "jsonp.php?callback=update";
	
	var newScript = document.createElement("script");
	newScript.setAttribute("src", url);
	newScript.setAttribute("id", "jsonp");

	var oldScript = document.getElementById("jsonp");
	var head = document.getElementsByTagName("head")[0];
	if(oldScript == null){
		head.appendChild(newScript);
	}else{
		head.replaceChild(newScript, oldScript);
	}
}


function update(data){
	console.log(data);
	var div = document.getElementById("info");

	var ulExists = document.getElementById("data");
	if(ulExists){
		ulExists.remove();
	}

	var ul = document.createElement("ul");
	ul.setAttribute("id", "data");
	for(var i = 0; i < data.length; i++){
		var li = document.createElement("li");
		li.setAttribute("class", "title");
		li.innerHTML = data[i].title;
		ul.appendChild(li);
	}
	div.appendChild(ul);
}