<?php 
class parents{
   public function duty(){
   	 echo "Parents: I work all day!<br/>";
   }
}

class child extends parents{
	public function duty(){
		echo "Child: I party all day<br/>";
	}

	public function mom(){
		parent::duty();
	}
}

class uncle extends child{
	public function duty(){
  		parents::duty();
	}
}

class grandchild extends child{
	public function duty(){
		echo "Grandchild: I sleep all day<br/>";
	}
}


$parents = new parents();
$parents->duty();

$child = new child();
$child->duty();
$child->mom();

$uncle = new uncle();
$uncle->duty();
?>