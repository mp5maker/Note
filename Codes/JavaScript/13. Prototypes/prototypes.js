function init(){
	var fido = new Dog("Fido", "Mixed", 38);
	var fluffy = new Dog("Fluffy", "Poodle", 30);
	var spot = new Dog("Spot", "Chihuahua", 10);

	Dog.prototype.run = function(){
		console.log("Run!");
	};

	console.log("Name: " + fido.name);
	console.log("Breed: " + fido.breed);
	console.log("Weight: " + fido.weight);
	console.log("Run: " + fido.run);
}


function Dog(name, breed, weight){
	this.name = name;
	this.breed = breed;
	this.weight = weight;
}

window.onload = init;