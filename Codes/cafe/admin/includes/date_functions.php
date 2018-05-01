<?php
function month_convert(&$data){
	switch($data):
	case "01":
		$data = 'Jan';
	break;
	case "02":
		$data = 'Feb';
	break;
	case "03":
		$data = 'Mar';
	break;
	case "04":
		$data = 'Apr';
	break;
	case "05":
		$data = 'May';
	break;
	case "06":
		$data = 'Jun';
	break;
	case "07":
		$data = 'Jul';
	break;
	case "08":
		$data = 'Aug';
	break;
	case "09":
		$data = 'Sep';
	break;
	case "10":
		$data = 'Oct';
	break;
	case "11":
		$data = 'Nov';
	break;
	case "12":
		$data = 'Dec';
	break;
	default: "Not a valid month!";
	endswitch;
}

function compare_date($data1, $data2){
	$datetime1 = new DateTime($data1);
	$datetime2 = new DateTime($data2);
	return ($datetime2 > $datetime1);
}

