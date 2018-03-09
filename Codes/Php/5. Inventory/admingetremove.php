<?php 
require("common/databaseinfo.php");
$connection = mysqli_connect($server_name, $user_name, $password, $db_name);
$query = "SELECT * FROM inventory";
$result = mysqli_query($connection, $query);
?>
<!doctype html>
  <html>
  	<head>
  	  <title> Admin Remove Inventory </title>
  	 </head>
  	 <body>
<?php
   echo "<table>";
   echo "<tr>";
   echo    "<th>Date</th>";
   echo    "<th>Name</th>";
   echo    "<th>Price</th>";
   echo    "<th>Image</th>";
   echo    "<th>Remove</th>";
   echo  "</tr>";
	 while($row = mysqli_fetch_array($result)){
      echo "<tr>";
         echo "<td>".$row['date']."</td>";   
         echo "<td>".$row['name']."</td>";   
         echo "<td>".$row['price']."</td>";   
         echo "<td><img src ='".UPLOAD_PATH.$row['image']."' alt = 'Inventory Image'
                    height = '20px' width = '20px'/></td>";   
         echo "<td><a href = 'adminremoveinventory.php?inventory_id=".$row['inventory_id']
              ."&amp;date=".$row['date']
              ."&amp;name=".$row['name']
              ."&amp;price=".$row['price']
              ."&amp;image=".$row['image']
              ."'>Remove</a></td>";   
      echo"</tr>";
   }                 
   echo "</table>";
   mysqli_close($connection);
?>
       </form>
  	 </body>
  </html>