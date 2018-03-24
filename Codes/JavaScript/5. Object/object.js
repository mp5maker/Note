var fiat = {
	make: "Fiat",
	model: "500",
	year: 1957,
	color: "Blue",
	passengers: 2,
	convertible: false,
	mileage: 88000,
	drive: function(){
		console.log(this.make + " Running: Zoom Zoom");
	}
};

fiat.drive();