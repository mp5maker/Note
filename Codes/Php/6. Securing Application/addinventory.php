<?php 
require_once("common/databaseinfo.php");
$show_form = TRUE;
$connection  = mysqli_connect($server_name, $user_name, $password, $db_name)
               or die("Server Connection Denied");

if(isset($_POST['submit'])):
    $name = mysqli_real_escape_string($connection, trim($_POST['item_name']));
    $price = mysqli_real_escape_string($connection, trim($_POST['price']));
    $image_name = mysqli_real_escape_string($connection, trim($_FILES['image']['name']));
	if(!empty($name) && !empty(is_numeric($price)) && !empty($image_name)):
            $show_form = FALSE;
            $target = UPLOAD_PATH.$image_name;
            // $date = date("Y-m-d h:i:s");
            $query = "INSERT INTO inventory(date, name, price, image) 
                      VALUES(NOW(), '$name', '$price', '$image_name')"; 
            mysqli_query($connection, $query) or die("Query Denied");
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            echo "Inventory Added Successfully";
	endif;
endif;
?>

<?php 
if($show_form):
?>
<!doctype html>
  <html>
  	<head> 
  	  <title> Add Inventory </title>
  	  <meta charset = "UTF-8"/>
  	</head>
  	<body>
  		<p> Add Inventory </p>
  		<form enctype = "multipart/form-data" method = "post" 
  		      action = "<?php echo $_SERVER['PHP_SELF'];?>">
  		  <!-- <input type = "hidden" name = "MAX_FILE_SIZE" value = "32768"/> -->
  		  <label for = "item_name"> Item Name: </label><br/>
  		  <input type = "text" name = "item_name" id = "item_name"/><br/>
  		  <label for = "price"> Price: </label><br/>
  		  <input type = "number" name = "price" id = "price" step = "0.01"/><br/>
  		  <input type = "file" name = "image" id = "image"/><br/><br/>
  		  <input type = "submit" value = "Add Item" name = "submit"/>
  	</body>
  </html>
<?php 
endif;
?>