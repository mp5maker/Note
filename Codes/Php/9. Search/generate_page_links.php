<?php 
function generate_page_links($user_search, $sortby, $cur_page, $num_pages){
	$string = '';
	$self = $_SERVER['PHP_SELF'];
	$previous = $cur_page - 1;
	$next = $cur_page + 1;
	
    //If this is not the first page, generate the "Previous Links"
	if($cur_page > 1){
   		    $string .= "<p><a href = '".$self."?search=".$user_search."&amp;sort=$sortby&amp;submit=1"
   	                               ."&amp;page=$previous'><--</a>";
	}
	else{
		    $string .=' ';
	}

	for($i = 1;  $i <=  $num_pages; $i++){
	   		    $string .= "<a href = '".$self."?search=".$user_search."&amp;sort=$sortby&amp;submit=1"
	   	                               ."&amp;page=$i'>$i</a>";
		}

	if($cur_page < $num_pages){
   		    $string .= "<a href = '".$self."?search=".$user_search."&amp;sort=$sortby&amp;submit=1"
   	                               ."&amp;page=$next'>--></a></p>";
    	}
     else{
		    $string .=' ';
		}
	return $string;
}
?>