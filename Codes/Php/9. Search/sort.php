<?php 
function sorting($sortby){
	  $string = 'ORDER BY ';
	  switch($sortby){
	  	case 1:
	    $string .= " title ASC"; 
	  	break;

	 	case 2:
	    $string .= " title DESC"; 
	  	break;
	 	
	 	case 3:
	    $string .= " state ASC"; 
	  	break;

	 	case 4:
	    $string .= " state DESC"; 
	  	break;

	 	case 5:
	    $string .= " date_posted ASC"; 
	  	break;

	 	case 6:
	    $string .= " date_posted DESC"; 
	  	break;

	 	default:
	 	// 
	  }
	  return $string;
}
?>