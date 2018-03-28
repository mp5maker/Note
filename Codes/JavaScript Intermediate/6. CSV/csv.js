function init(){
  request = new XMLHttpRequest();
  var url = "data.csv"; 
  request.open("GET", url, true);
  request.onreadystatechange = csvHandler;
  request.send(null);
}

function csvHandler(){
	var div = document.getElementById("data");
	if(request.readyState == 4 && request.status == 200){
		var data = request.response.split("-->");
		var i = 0;
		while(i < data.length){
			 var p = document.createElement("p");
			 var term = data[i] + ": " + data[i+1];
			 var text = document.createTextNode(term);
			 p.appendChild(text);
			 div.appendChild(p);
			 console.log(data[i]);
			 console.log(data[i+1]);
			 i += 2;
		}
	}
}
window.onload = init;