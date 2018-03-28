$(document).ready(function(){
	$(".picture").click(function(){
		$(this).slideUp();
		var discount = Math.floor((Math.random()*5 + 5));
		var message = "<p> Your discount price is: " + discount + "%</p>";
		$("#image-container").append(message);

		$(".picture").each(function(){
			$(this).unbind("click");
		});
		$(".picture").hide(5000);
	});
});