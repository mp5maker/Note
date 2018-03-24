function init(){
	var fluffy = new Dog("Fluffy", "Poodle", 30);
	var fido = new Dog("Fido", "Mixed", 38);
	var spot = new Dog("Spot", "Chihuahua", 10);

	var dogs = [fluffy, fido, spot];

	dogs.forEach(function(dog){
		console.log("Dog Name: " + dog.name);
		console.log("Dog Breed: " + dog.breed);
		console.log("Dog Weight: " + dog.weight);
		console.log("==========================");
	});
}

function Dog(name, breed, weight){
	this.name = name;
	this.breed = breed;
	this.weight = weight;
}

window.onload = init;