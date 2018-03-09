<?php 
require_once("common/database.php");
require_once("buildquery.php");
require_once("sort.php");
require_once("generate_sort_links.php");
require_once("generate_page_links.php");

$connection = mysqli_connect(SERVER, USER, PASS, DB);
echo "<!doctype html>";
echo " <html>";
echo " 	<head>";
echo " 	  <title> Job Search Engine </title>";
echo " 	  <meta charset = 'UTF-8'/>";
echo " 	</head>";
echo " 	<body>";
echo " 		<form method = 'get' action = '".$_SERVER['PHP_SELF']."'>";
echo " 			<label for = 'search'> Jobs, that you are looking for? </label><br/>";
                 $search = !empty($_GET['search'])? $_GET['search'] : '';
echo "           <input type = 'text' name = 'search' value = '$search'/>";

echo " 			<input type = 'submit' name = 'submit' value = 'Search'/>";
echo " 		</form><br/>";
echo " 	</body>";
echo " </html>";


if(isset($_GET['submit'])):
    if(!empty($_GET['search'])){
       //Sort value from GET
       $sortby = (!empty($_GET['sort'])) ? $_GET['sort'] : 1;
	  
	   //Generating the links to order the query
	   echo generate_sort_links($_GET['search'], $sortby);
       
       //Get the search data
       $search = mysqli_real_escape_string($connection, trim($_GET['search']));
      
       //Clean up the data
       $where_clause = build_query($search);
       
       //Sort the data
       $order_by = sorting($sortby);
	   
       //Find out the number of rows
	   $query = "SELECT * FROM riskyjobs $where_clause $order_by";
	   $result =  mysqli_query($connection, $query) or die ("Total Query Denied");

       //Calculating the LIMIT skip for the query
	   $cur_page = isset($_GET['page'])? $_GET['page']: 1;
	   $results_per_page = 5;
	   $skip = ($cur_page - 1) * $results_per_page;
	   $total_query = mysqli_num_rows($result);
	   $num_pages = ceil($total_query/$results_per_page);

	   //Generate pagination link
	   echo generate_page_links($_GET['search'], $sortby, $cur_page, $num_pages);

	   $query = "SELECT * FROM riskyjobs $where_clause $order_by LIMIT $skip, $results_per_page";
	   echo $query;
	   $result =  mysqli_query($connection, $query) or die ("Search Query Denied");
	   echo "<table>";
		echo "<tr>";
			echo "	<th>Title</th>";
			echo "	<th>Description</th>";
			echo "	<th>City</th>";
			echo "	<th>State</th>";
			echo "	<th>Zip</th>";
			echo "	<th>Company</th>";
			echo "	<th>Date Posted</th>";
		echo "</tr>";
	   while($row = mysqli_fetch_array($result)){
	    	echo "<tr>";
		    echo "	<td>".$row['title']."</td>";
			echo "	<td>".substr($row['description'], 0,100)."</td>";
			echo "	<td>".$row['city']."</td>";
			echo "	<td>".$row['state']."</td>";
			echo "	<td>".$row['zip']."</td>";
			echo "	<td>".$row['company']."</td>";
			echo "	<td>".substr($row['date_posted'], 0, 9)."</td>";
			echo "</tr>";
	    }
       echo "</table>";
    }
    else{
    	$error = "You cannot leave the search box empty!";
		echo "<span>".$error."</span>";
    }  
endif;
?>
