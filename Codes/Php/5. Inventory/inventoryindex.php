<!doctype html>
 <html>
 	<head>
 		<title> Inventory Index </title>
 		<meta charset =  "UTF-8"/>
 	</head>
 	<body>
 		<h1> Inventory List </h1>
 		<p><a href = "addinventory.php">Add Item</a></p>
 		<p> List of items are given below</p>
<?php
   require_once("common/databaseinfo.php");
   $connection = mysqli_connect($server_name, $user_name,
   	                            $password, $db_name)
                or die("Could not conenct to the database");
   $query = "SELECT * FROM inventory";
   $result = mysqli_query($connection, $query);
   echo "<table>";
   echo "<tr>";
   echo    "<th>Date</th>";
   echo    "<th>Name</th>";
   echo    "<th>Price</th>";
   echo    "<th>Image</th>";
   echo  "</tr>";
   while($row = mysqli_fetch_array($result)){
      echo "<tr>";
         echo "<td>".$row['date']."</td>";   
         echo "<td>".$row['name']."</td>";   
         echo "<td>".$row['price']."</td>";   
         echo "<td><img src ='".UPLOAD_PATH.$row['image']."' alt = 'Inventory Image'
                    height = '20px' width = '20px'/></td>";   
      echo  "</tr>";
   }                 
   echo "</table>";
?>
 	</body>
 </html>
