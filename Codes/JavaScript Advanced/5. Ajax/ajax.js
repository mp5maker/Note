function init(){
	var url = "ajax.php";
	var request = new XMLHttpRequest();
	request.open("GET", url);
	// request.onload = function(){
	request.onreadystatechange = function(){
		if(request.status == "200" && request.readyState == "4"){
			displayJSON(request.responseText);
		}
	};
	request.send(null);
}

function displayJSON(data){
	var dataObject = JSON.parse(data);
	var ul = document.getElementById("sales");
	for(var i = 0; i < dataObject.length; i++){
		// console.log("ID: " + dataObject[i].id);
		// console.log("Title: " + dataObject[i].title);
		// console.log("City: " + dataObject[i].city);
		// console.log("State: " + dataObject[i].state);
		// console.log("Zip: " + dataObject[i].zip);
		// console.log("Company: " + dataObject[i].company);
		// console.log("Date Posted: " + dataObject[i].date_posted);
		// console.log("==========================================");
		var li = document.createElement("li");
		li.setAttribute("class", "title");
		li.innerHTML = dataObject[i].title;
		ul.appendChild(li);
	}
}

window.onload = init;
