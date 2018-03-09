<?php 
function generate_sort_links($user_search, $sort){
    $string = '';
	$self = $_SERVER['PHP_SELF'];
	switch($sort){

		case 1:
		$string .= "<p><a href = '".$self."?search=".$user_search."&amp;sort=2&amp;submit=1'>Job Title</a> /";
		$string .= "<a href = '".$self."?search=".$user_search."&amp;sort=3&amp;submit=1'>State</a> /";
		$string .= "<a href = '".$self."?search=".$user_search."&amp;sort=5&amp;submit=1'>Date Posted</a></p>";
		break;

		case 3:
		$string .= "<p><a href = '".$self."?search=".$user_search."&amp;sort=1&amp;submit=1'>Job Title</a> / ";
		$string .= "<a href = '".$self."?search=".$user_search."&amp;sort=4&amp;submit=1'>State</a> / ";
		$string .= "<a href = '".$self."?search=".$user_search."&amp;sort=5&amp;submit=1'>Date Posted</a></p>";
		break;

		case 5:
		$string .= "<p><a href = '".$self."?search=".$user_search."&amp;sort=1&amp;submit=1'>Job Title</a> / ";
		$string .= "<a href = '".$self."?search=".$user_search."&amp;sort=3&amp;submit=1'>State</a> / ";
		$string .= "<a href = '".$self."?search=".$user_search."&amp;sort=6&amp;submit=1'>Date Posted</a></p>";
		break;

		default:
		$string .= "<p><a href = '".$self."?search=".$user_search."&amp;sort=1&amp;submit=1'>Job Title</a> / ";
		$string .= "<a href = '".$self."?search=".$user_search."&amp;sort=3&amp;submit=1'>State</a> / ";
		$string .= "<a href = '".$self."?search=".$user_search."&amp;sort=5&amp;submit=1'>Date Posted</a></p>";
	}
	return $string;
}
?>
