function init(){
	var data = document.getElementById("data");
	var request = new XMLHttpRequest();
	url = "library.xml";
	request.open("GET", url, true);
	request.onreadystatechange = xmlHandler;
	request.send(null);
}

function xmlHandler(event){
	request = event.target;
	if(request.readyState == 4 && request.status == 200){
		var response = request.responseXML;
		var div = document.getElementById("data");
		var table = document.createElement("table");
		var tr = document.createElement("tr");
		
		var th = document.createElement("th");
		var title = document.createTextNode("Title");
		th.appendChild(title);
		tr.appendChild(th);

		var th = document.createElement("th");
		var author = document.createTextNode("Author");
		th.appendChild(author);
		tr.appendChild(th);

		table.appendChild(tr);
		var books = response.getElementsByTagName("book");
		for(var i = 0; i < books.length; i++){
			 // console.log(books[i].firstChild.nextSibling.nodeName.trim());
			 var tr = document.createElement("tr");
			 
			 var td = document.createElement("td");
			 var title = document.createTextNode(books[i].firstChild.nextSibling.firstChild.nodeValue.trim());
			 td.appendChild(title);
			 tr.appendChild(td); 
			 
			 // console.log(books[i].firstChild.nextSibling.nextSibling.nextSibling.nodeName.trim());
			 var td = document.createElement("td");
			 var author = document.createTextNode(books[i].firstChild.nextSibling
			 	                 .nextSibling.nextSibling
			 					 .firstChild.nodeValue.trim());
			 td.appendChild(author);
			 tr.appendChild(td);
			 table.appendChild(tr);
			}
		div.appendChild(table);
	}
}


window.onload = init;