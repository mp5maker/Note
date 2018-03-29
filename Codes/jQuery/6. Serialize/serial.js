$(document).ready(function(){
	$("#myForm").submit(function(e){
		  e.preventDefault();
		  // var data = $("#myForm:input").serializeArray();
		  var data = $("#myForm").serialize();
		  var url = "serial.php";
		  $.ajax({
		  	 url: url,
		  	 type: 'post',
		  	 data: data,
		  	 success: function(data){
		  	 	alert(data);
		  	 }
		  });
	});	
});
