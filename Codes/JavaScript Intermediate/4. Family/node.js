function init(){
	var x = document.getElementById("check").firstChild;
	console.log(x.nodeName);
	console.log(x.nodeType);
	console.log(x.nodeValue);
}
window.onload = init;