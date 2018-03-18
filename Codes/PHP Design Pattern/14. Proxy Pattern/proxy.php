<?php 
interface Image{
	public function display();
}

class RealImage implements Image{
	protected $filename;

	public function __construct($filename){
		$this->filename = $filename;
		$this->loadFromDisk($filename);
	}

	public function display(){
		echo "{$this->filename}";
	}

	public function loadFromDisk($filename){
		echo "Loading: {$filename}<br/>";
	}
}

class ProxyImage implements Image{
	protected $filename;
	protected $realImage;

	public function __construct($filename){
		$this->filename = $filename;
	}

	public function display(){
		if($this->realImage == null){
			$this->realImage = new RealImage($this->filename); 
		}
		$this->realImage->display();
	}
}

$image = new ProxyImage("test.jpg");
$image->display();
?>