function init(){
	var numbers = [60, 50, 62, 58, 54, 54];
	numbers.sort(compareNumbers);
	console.log(numbers);
}

function compareNumbers(num1, num2){
	if(num1 > num2){
		return 1;
	}else if(num1 === num2){
		return 0;
	}else{
		return -1;
	}
}

window.onload = init;