<!DOCTYPE html>
<html>
	<head>
		<title>Testing</title>
		<meta charset = "UTF-8">
	</head>
	<body>
		<form method = "post" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
			<label for = "filtered"> Inputs to be filtered </label><br/>
			<?php $save = (isset($_POST['filtered']))? $_POST['filtered']: '';?>
			<input type = "text"  name = "filtered" value = "<?php echo $save ?>"/><br/>
			<label for = "filters"> Filter </label><br/>
			<select name = "filters">
				<option value = "int">FILTER_VALIDATE_INT</option>
				<option value = "boolean">FILTER_VALIDATE_BOOLEAN</option>
				<option value = "float">FILTER_VALIDATE_FLOAT</option>
				<option value = "validate_url">FILTER_VALIDATE_URL</option>
				<option value = "validate_email">FILTER_VALIDATE_EMAIL</option>
				<option value = "validate_ip">FILTER_VALIDATE_IP</option>
				<option value = "unsafe_raw">FILTER_UNSAFE_RAW</option>
				<option value = "string">FILTER_SANITIZE_STRING</option>
				<option value = "stripped">FILTER_SANITIZE_STRIPPED</option>
				<option value = "encoded">FILTER_SANITIZE_ENCODED</option>
				<option value = "special_chars">FILTER_SANITIZE_SPECIAL_CHARS</option>
				<option value = "email">FILTER_SANITIZE_EMAIL</option>
				<option value = "url">FILTER_SANITIZE_URL</option>
				<option value = "number_int">FILTER_SANITIZE_NUMBER_INT</option>
				<option value = "number_float">FILTER_SANITIZE_NUMBER_FLOAT</option>
				<option value = "magic_quotes">FILTER_SANITIZE_MAGIC_QUOTES</option>
			</select><br/>
			<input type = "submit" value = "Submit" name = "submit">
		</form>
	</body>
</html>

<?php 
if(isset($_POST['submit'])):
	$filterChoosen = filter_input(INPUT_POST, 'filtered', 
			       				  filter_id($_POST['filters']));
	echo "<pre>";
	var_dump($filterChoosen);
	echo "</pre>";
endif;
?>
