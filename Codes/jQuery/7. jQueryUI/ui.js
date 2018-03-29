$(document).ready(function(){
	$("#datepicker").datepicker({
		changeMonth: true,
		changeYear: true
	});

	$("#radio").buttonset();
	// $("input[type='radio']").button();
	
	$("#slider").slider({
		value: 0,
		min: 0,
		max: 100,
		step: 10,
		orientation: "horizontal",
		slide: function(event, ui){
			$("#slider_value").val(ui.value);
		}
	});

	$("#red, #green, #blue").slider({
		value: 127,
		min: 0,
		max: 255,
		orientation: "horizontal",
		slide: refreshDisplay,
		change: refreshDisplay
	});

	function refreshDisplay(){
		var red_value = $("#red").slider("value");
		var green_value = $("#green").slider("value");
		var blue_value = $("#blue").slider("value");

		$("#red_value").val(red_value);
		$("#green_value").val(green_value);
		$("#blue_value").val(blue_value);
		var string = red_value + ', ' + green_value + ", " + blue_value;
		$("#display_value").val(string);

		var display = document.getElementById("display");
		var image = display.getContext('2d');
		image.fillRect(0, 0, 50, 50);
		image.fillStyle = "rgba("+ red_value + "," +
								   green_value + "," +
								   blue_value + ")"; 
	}

});
