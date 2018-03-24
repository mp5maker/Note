function init(){
  var trump = new HumanResource(new Teacher("Donald Trump", 4000));
  for(var property in trump){
  	console.log(trump[property]);
  } 
}

function HumanResource(employee){
	this.name = employee.name;
	this.salary = employee.salary + 2000;
	this.fire = "I can fire you!";
}


function Teacher(name, salary){
	this.name = name;
	this.salary = salary;
}

window.onload = init