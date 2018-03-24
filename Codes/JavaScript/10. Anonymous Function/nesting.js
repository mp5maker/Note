function init(){
	var fly = function(num){
		var sound = "Flying Sound";
		function wingFlapper(){
			console.log(sound);
		}

		for(var i = 0; i < num; i++){
			wingFlapper();
		}
	};

	function quack(num){
		var sound = "Quack";
		var quacker = function(){
			console.log(sound);
		}

		for(var i = 0; i < num; i++){
			quacker();
		}
	}

	quack(4);
	fly(4);


}
window.onload = init;