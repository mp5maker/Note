<!doctype html>
 <htmL>
  <head>
    <title> Order Inventory </title>
    <meta charset = "UTF-8"/>
  </head>
  <body>
<?php
   require_once("common/databaseinfo.php");
   $connection = mysqli_connect($server_name, $user_name,
                                  $password, $db_name)
                or die("Could not conenct to the database");
   $query = "SELECT * FROM inventory ORDER BY price DESC";
   $result = mysqli_query($connection, $query);
   echo "<table>";
   echo "<tr>";
   echo    "<th>Date</th>";
   echo    "<th>Name</th>";
   echo    "<th>Price</th>";
   echo    "<th>Image</th>";
   echo  "</tr>";

   $i = 0;
   while($row = mysqli_fetch_array($result)){
      if($i == 0):
         echo "<p>Most Expensive Product: ".$row['name']."</p>";
         echo "<p>Price: ".$row['price']."</p>";
         echo "<p>Date Added: ".$row['date']."</p>";
      endif;
      echo "<tr>";
         echo "<td>".$row['date']."</td>";   
         echo "<td>".$row['name']."</td>";   
         echo "<td>".$row['price']."</td>";   
         echo "<td><img src ='".UPLOAD_PATH.$row['image']."' alt = 'Inventory Image'
                    height = '20px' width = '20px'/></td>";   
      echo  "</tr>";
      $i++;
   }                 
   echo "</table>";
?>
  </body>
 </htmL>