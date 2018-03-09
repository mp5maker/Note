<?php require_once("common/header.php"); ?>
<?php
$showconfirmform= TRUE;
require("common/databaseinfo.php");
if($showconfirmform): 
	echo "<!doctype html>";
	echo "  <html>";
	echo "    <head>";
	echo "      <title> Remove Inventory Confirmation </title>";
	echo "      <meta charset = 'UTF-8'/>";
	echo "     </head>";
	echo "     <body>";
	$connection = mysqli_connect($server_name, $user_name, $password, $db_name)
	              or die("Server Error");
	if(  isset($_GET['inventory_id']) &&
		 isset($_GET['name']) &&
		 isset($_GET['price']) &&
		 isset($_GET['image'])
	   ): 
	     echo  "<h2> Are you sure? </h2>";
	     echo  "<form method = 'post' action = '".$_SERVER['PHP_SELF']."'>";
	     $inventory_id = $_GET['inventory_id'];
	     $name         = $_GET['name'];
	     $price        = $_GET['price'];
	     $image        = $_GET['image'];

	     $query = "SELECT * FROM inventory WHERE inventory_id = '$inventory_id'";
	     $result = mysqli_query($connection, $query) or die("Query Denied");
	     while($row = mysqli_fetch_array($result)){
	            echo "Name: ".$row['name']."<br/>";             
	            echo "Price: ".$row['price']."<br/>";             
	            echo "<img src = '".UPLOAD_PATH.$row['image']
	                   ."' alt = 'Inventory Image'"
	                   ."height='30px' width='30px'"
	                   ."/><br/>";
	            echo "<input type = 'hidden' name = 'inventory_id' value = '$inventory_id'/>";      
	            echo "<input type = 'hidden' name = 'image' value = '".UPLOAD_PATH.$row['image']."'/>";      
	            echo "Yes<input type = 'radio' name = 'confirmation' value = 'yes'/>";             
	            echo "No <input type = 'radio' name = 'confirmation' value = 'no'/><br/>"; 
	            echo "<input type = 'submit' name = 'submit' value = 'Confirm'/>";             
	       }
	endif;
endif;	
?>       
       </form>
     </body>
  </html>

<?php
if(isset($_POST['submit']) && ($_POST['confirmation'] == "yes")):
	$showconfirmform = FALSE;
	$inventory_id = $_POST['inventory_id'];
    $query = "DELETE FROM inventory WHERE inventory_id = '$inventory_id'";
    mysqli_query($connection, $query) or die("Query Denied");
    @unlink($_POST['image']);
    echo "Deleted Successfully!";

endif;

if(isset($_POST['submit']) && ($_POST['confirmation'] == "no")):
	$showconfirmform = FALSE;
    echo "<p><a href = 'admingetremove.php'>Home Page</a></p>";
endif;

?>