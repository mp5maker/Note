$(document).ready(function(){
	$.ajax({
		url: "ajax.php?getit=confirm",
		cache: false,
		dataType: "json",
		success: function(json_data){
			var employees = json_data;
			console.log(employees.sam);
			console.log(employees.bob);
		}
	});
	
	var url = "ajax.php?getit=confirm";
	$.get(url, function(data, status){
		console.log(data, status);
	});

	var url = "ajax.php";
	var data = "postit=confirm"
	$.post(url, data, function(data, status){
		console.log(data, status);
	});

	var url = "ajax.php?getit=confirm";
	$.getJSON(url, function(employees, status){
		console.log(employees.sam);
	})
});