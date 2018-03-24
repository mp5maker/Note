var fastfood = ["Pizza", "Burger", "Sandwich"];
var drinks = [];

/**
 * Finding the number of items in an array
 */
console.log(fastfood.length);

/**
 * For every fast food we should have a drink
 */
for(var i = 0; i < fastfood.length; i++){
	switch(i){
		case 0:
		drinks.push("lemonade");
		break;

		case 1:
		drinks.push("coke");
		break;

		case 2:
		drinks.push("sprite");
		break;

		default: console.log("No Drink Bro!");
	}	
}

/**
 * It's in array format
 */
console.log(drinks);

/**
 * For each to convert to String
 */
drinks.forEach(function($item, $index){
	console.log($item);
});