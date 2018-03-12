<!doctype html>
 <html>
 	<head>
 		<title> Alternative Form </title>
 		<meta charset = "UTF-8">
 	</head>
 	<body>
 		<form method = "get" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
  			<label for = "fullname"> Full Name </label><br/>
  			<input type = "text" name = "fullname"/><br/><br/>
  			<label for = "gender"> Gender </label><br/>
  				Male <input type = "radio" name = "gender" value = "male">
  				Female<input type = "radio" name = "gender" value = "female"><br/><br/>
  		    <label for = "car"> Car </label><br/>
  		    <select name = "car">
  		    	<option value = "Toyota">Toyota</option>
  		    	<option value = "Nissan">Nissan</option>
  		    	<option value = "Tata">Maxda</option>
  		    </select><br/><br/>
  		    <label for = "pay"> Pay </label><br/>
  		    <input type = "checkbox" name = "pay" value = "paid"> Paid
  		    <input type = "checkbox" name = "pay" value = "notpaid"> Not Paid<br/><br/>
  		    <input type = "submit" value = "Confirm" name = "submit"/>
 		</form><br/>
 	</body>
 </html>
