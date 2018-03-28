function init(){
	var employee = document.getElementById("employee");
	console.log(employee.parentNode);
	console.log(employee.childNodes);
	console.log(employee.firstChild.nextSibling);
	console.log(employee.firstChild.nextSibling.firstChild);
	console.log(employee.firstChild.nextSibling.firstChild.nextSibling.nextSibling);
	console.log(employee.firstChild.nextSibling.firstChild.nextSibling
				.nextSibling.firstChild.nextSibling);
}

window.onload = init;