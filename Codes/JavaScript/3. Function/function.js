radius = prompt("Please enter the radius of the Circle!");

function AreaOfCircle(radius){
	var area = Math.PI * Math.pow(radius, 2);
	return area;
}
console.log(AreaOfCircle(radius));