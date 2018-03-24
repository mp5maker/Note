function init(){
	var array = new Array();
	array.push(53, 234, 1234, 10, 1, 90 , 52, 92);
	/**
	 * Normal Array
	 */
	console.log(array);

	/**
	 * Reversed Array
	 */
	array.reverse();
	console.log(array);

	var findOdds = array.every(function(number){
          return ((number%2) !== 0)
	});
	console.log(findOdds);
}

window.onload = init;