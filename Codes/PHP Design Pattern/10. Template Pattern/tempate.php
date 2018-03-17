<?php 
abstract class HTMLTemplate{
	public final function prepare(){
		$this->header();
		$this->titleContent();
		$this->external();
		$this->body();
		$this->bodyContent();
		$this->footer();
	}

	public function header(){
			echo "<!DOCTYPE html>";
			echo "<html>";
			echo "	<head>";
			echo "		<title>".$this->titleContent()."</title>";
			echo "		<meta charset = 'UTF-8'>";
			$this->external();
			echo "	</head>";
	}

	public function body(){
			echo "	<body>";
			echo       $this->bodyContent();
			echo "	</body>";
			echo "<footer>".$this->footer()."</footer>";
			echo "</html>";
	}

	abstract function titleContent();
	abstract function external();
	abstract function bodyContent();
	abstract function footer();
}

class HomePage extends HTMLTemplate{
	public function titleContent(){
		return "Home Page";
	}

	public function external(){

	}

	public function bodyContent(){
		return "<p> Home Page Bro </p>";
	}

	public function footer(){

		return "&copy;".date("Y")." All Rights Reserved. Photon Enterprise";
	}
}

$homepage = new HomePage();
$homepage->prepare();
?>