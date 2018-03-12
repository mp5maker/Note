<?php 
interface dress{
	public function stitches();
	public function material();
	public function dye();
	public function lining();
}

interface shop{
	public function tailor();
}

class salwarkameez implements dress, shop{
	public function stitches(){
		return "stitch";
	}

	public function material(){
		return "botton";
	}

	public function dye(){
		return "blue";
	}

	public function lining(){
		return "lining";
	}

	public function tailor(){
		return 25;
	}
}

$salwarkameez = new salwarkameez();
echo  $salwarkameez->stitches(). $salwarkameez->material().$salwarkameez->dye().$salwarkameez->lining().$salwarkameez->tailor();
?>