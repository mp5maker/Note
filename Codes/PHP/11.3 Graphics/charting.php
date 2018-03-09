<?php 
require_once("bargraph.php");

$server_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "classroom";
$showform = TRUE;

$students = array();
$subjects = array();

if($showform):
	echo "<!doctype html>";
	echo "  <html>";
	echo "  	<head> ";
	echo "  	    <title>Classroom</title>";
	echo "	  	<meta charset = 'UTF-8'/>";
	echo "  	</head>";
	echo "  	<body>";
	echo "  		<form method = 'post' action = '".$_SERVER['PHP_SELF']."'>";
	echo "  			<label for = 'search'> Search </label><br/>";
	                    $value = (!empty($_POST['search']))? $_POST['search'] : "";             
	echo "  			<input type = 'text' name = 'search'"
	                                  ." value = '$value'/><br/>";
	echo "              <input type = 'submit' name = 'submit' value = 'Search'/>";
	echo "  		</form>";
	echo "  	</body>";
	echo "  </html>";
endif;

if(isset($_POST['submit'])):
	// $showform = FALSE;
	$connection = mysqli_connect($server_name, $user_name, $password, $db_name)
	              or die ("Server Connection Denied");
    $search = $_POST['search'];

	$query  =  "SELECT per.person_name, sub.subject_name, sc.score FROM score AS sc
	                INNER JOIN person AS per
	                ON sc.person_id = per.person_id
	                INNER JOIN subject as sub
	                ON sc.subject_id = sub.subject_id
	                WHERE per.person_name LIKE '%$search%' LIMIT 5";

    $result = mysqli_query($connection, $query) or die("Query Denied");
   
    echo "<table>";
    while($row = mysqli_fetch_array($result)){
         	 if(!in_array($row['person_name'], $students)):
    	        echo "<tr>";
         	 	$students[] = $row['person_name'];
		        echo "<th align = 'left'> Student: ".$row['person_name']."</th>";
	            echo "</tr>";
         	 endif;
    	     echo "<tr>";
	         echo "<td> Subject: ".$row['subject_name']."</td>"; 
	         echo "<td> Score: ".$row['score']."</td>";
	         echo "</tr>";
	         $subjects[] = [$row['subject_name'],$row['score']];
    }
    echo "</table>";
    echo "<pre/>";
endif;

draw_bar_graph(480, 240, $subjects, 100, "image.png");
echo "<img src  = 'image.png' alt = 'bar graph'/>";

?>
