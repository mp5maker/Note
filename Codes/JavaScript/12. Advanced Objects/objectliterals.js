/** Insert Many type of same object into another  */
/**
 * Similar to Inheritance
 */

function init(){
	/**
	 * Created New Modded Dogs
	 */
	var fluffy_mod = new Dog(fluffy);
    var fido_mod = new Dog(fido);
    var spot_mod = new Dog(spot);

	/**
	 * Modded Dogs Array to see the results
	 */
    var mod_dogs = [fluffy_mod, fido_mod, spot_mod];
	mod_dogs.forEach(function(mod_dog){
		console.log("Dog Name: " + mod_dog.name);
		console.log("Dog Breed: " + mod_dog.type);
		console.log("Dog Weight: " + mod_dog.weight);
		console.log("Dog Running: " + mod_dog.run);
		console.log("==========================");
	});

	/**
	 * Constructed Objects with their individual property
	 */
	fido_mod.owner = "Bob";
	delete fido_mod.weight;
	for(var key in fido_mod){
		console.log(fido_mod[key]);
	}

}
/**
 * Individual Dogs Objects
 */
var fluffy = {
   name  :"Fluffy",
   type  :"Poodle", 
   weight: 30
};
	
/**
 * Individual Dogs Objects
 */
var fido = {
   name  :"Fido", 
   type  :"Mixed", 
   weight: 38
};

/**
 * Individual Dogs Objects
 */
var spot = {
   name  :"Spot", 
   type  :"Chihuahua", 
   weight: 10
};

/**
 * Dog Object (Inheritance)
 */
function Dog(param){
	this.name 	= param.name;
	this.type 	= param.type;
	this.weight = param.weight;
	this.run = this.name + " running ... running!";
}

window.onload = init;