<?php
/**
 * Creator
 */
interface arraysave{
	public function create($filename, $array);
}

class filewrite implements arraysave{
	public function create($filename, $array){
		$separate = explode(".", $filename);	
		switch($separate[1]):
		case "json":
		$json = new filewritejson();
		return $json->create($filename, $array);
		break; 

		case "txt":
		$text = new filewritetext();
		return $text->create($filename, $array);
		break;

		default: throw new Exception("Now a Valid Filename"); 
		endswitch;
	}
}


class fileputcontents implements arraysave{
	public function create($filename, $array){
		$separate = explode(".", $filename);	
		switch($separate[1]):
		case "json":
		$json = new fileputjson();
		return $json->create($filename, $array);
		break; 

		case "txt":
		$text = new fileputtext();
		return $text->create($filename, $array);
		break;

		default: throw new Exception("Now a Valid Filename"); 
		endswitch;
	}
}


/**
 * Product
 */
Interface type{
	public function convert($array);
}

class filewritejson implements type{
	public function create($filename, $array){
		try{
			$file = fopen($filename, "w");
			fwrite($file, $this->convert($array));
		}
		catch(Exception $e){
			echo "Error: ".$e->getMessage();
		}
		finally{
			fclose($file);
		}
	}
	public function convert($array){
		return json_encode($array);
	}
}

class filewritetext implements type{
	public function create($filename, $array){
		try{
			$file = fopen($filename, "w");
			fwrite($file, $this->convert($array));
		}
		catch(Exception $e){
			echo "Error: ".$e->getMessage();
		}
		finally{
			fclose($file);
		}
	}
	public function convert($array){
		return print_r($array, true);
	}
}

class fileputjson implements type{
	public function create($filename, $array){
		return file_put_contents($filename, $this->convert($array));		
	}
	public function convert($array){
		return json_encode($array);
	}
}

class fileputtext implements type{
	public function create($filename, $array){
		return file_put_contents($filename, $this->convert($array));		
	}
	public function convert($array){
		return print_r($array, true);
	}
}


/**
 * Testing
 */
$array = ["India"=>"Hindi", "America" => "English", "France" => "French"];

/*Creating File Using File Write*/
$filewrite = new filewrite();
$filewrite->create("language.json", $array);
$filewrite->create("language.txt", $array);


/*Creating File Using File Put Contents*/
$fileput = new fileputcontents();
$fileput->create("lang.json", $array);
$fileput->create("lang.txt", $array);
?>