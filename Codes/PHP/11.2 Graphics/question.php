<?php
require_once("common/sessionstarter.php");
require_once("common/database.php");

// Check if the cookier user id exists or not
$cookie_user_id = $_COOKIE['user_id'];
if(!isset($cookie_user_id)):
	$url = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/home.php";
	header("Location: $url");
endif;

$connection = mysqli_connect($server_name, $user_name, $password, $db_name)
              or die("Server Denied");

/**
 * 
 * Filling up the mismatch_response with topic_ids w.r.t user_id
 * 
 */

//Check whether the mismatch_response has any topic_id, response_id, response w.r.t user_id in the mismatch_response
$query = "SELECT * FROM mismatch_response WHERE user_id = '$cookie_user_id'";
$result = mysqli_query($connection, $query) or die("User in Response Table Query Denied");
$topicIDs = array();

//If the mismatch_response has no data, create topic_id w.r.t user_id
if(mysqli_num_rows($result) == 0):
   
    //Selecting all the topic_id from the topic table
	$query = "SELECT topic_id from mismatch_topic ORDER BY topic_id";
    $result = mysqli_query($connection, $query) or die("Collecting Topics Query Denied");
    while($row = mysqli_fetch_array($result)){
    	array_push($topicIDs, $row['topic_id']);
    }
   
    //Insert topic_id w.r.t user_id in the mismatch_response
	foreach($topicsIDS as $topic_id){
		$query = "INSERT INTO mismatch_response(user_id, topic_id) VALUES('$cookie_user_id','$topic_id')";
		mysqli_query($connection, $query) or die ("Inserting Topics Query Denied");
	   }
endif;

//If the questionnaire form has been submitted, write the form responses to the database
if(isset($_POST['submit'])):
	foreach($_POST as $response_id => $response){
		$query = "UPDATE mismatch_response SET response = '$response' WHERE response_id = '$response_id'";
		mysqli_query($connection, $query) or die ("Updated the response Query Denied");
	}
endif;


/**
 *
 * Fetching the response data from the database to generate form
 * 
 */

//Collect response_id, topic_id, response w.r.t user_id from mismatch_response
$query = "SELECT response_id, topic_id, response FROM mismatch_response WHERE user_id = '$cookie_user_id'";
$result = mysqli_query($connection, $query) or die("Fetching the data Query Denied");
$responses = array();
while($response_row = mysqli_fetch_array($result)){
	$topic_id = $response_row['topic_id'];

	//Select name, category from the mismatch_topic using the mismatch_response topic_id
	$query2 = "SELECT name, category FROM mismatch_topic WHERE topic_id = '$topic_id'";
    $topic_data = mysqli_query($connection, $query2) or ("Fetching category, name Query Denied");
    
    //Check if there is one topic_id that matches  
    if(mysqli_num_rows($topic_data) == 1):
 		$topic_row = mysqli_fetch_array($topic_data);
 	    $response_row['topic_name'] = $topic_row['name'];
 	    $response_row['category_name'] = $topic_row['category'];

        //Feeding the topic name, category name to the $responses array
 	    array_push($responses, $response_row);
    endif;
}

mysqli_close($connection);
/**
 *
 * Generate the questionnaire form by looping throung the response array
 * 
 */

echo "<form method = 'post' action ='".$_SERVER['PHP_SELF']."'>";
echo "<p> How do you feel about the each topic? </p>";

//Display the first category
$category = $responses[0]['category_name'];
echo "<h3>".$responses[0]['category_name']."</h3>";

foreach($responses as $response){
    //Change the category when the category for the response changes
	if($category != $response['category_name']):
		$category = $response['category_name'];
		echo "<h3>".$response['category_name']."</h3>";
	endif;

	//Display the topic form fields 
	echo "<label for = '".$response['response_id']."'>".$response['topic_name']." </label>";
	echo "<input type = 'radio' name = '".$response['response_id']."' value = '1'"
	     .($response['response'] == 1?'checked="checked"' : '')."/>Love";
	echo "<input type = 'radio' name = '".$response['response_id']."' value = '2'"
	     .($response['response'] == 2?'checked="checked"' : '')."/>Hate<br/>";
   }
echo "<br/><input type = 'submit' value = 'Save' name = 'submit'/>";
echo "</form>";
?>
