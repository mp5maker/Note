<?php 
class Book{
	protected $title;
	protected $author;

	 public function __construct($title, $author){
	 	$this->title = $title;
	 	$this->author = $author;
	 }

	 public function __toString(){
	 	return $this->title." by ".$this->author;
	 }
}

$book = new Book("Harry Potter", "J.K Rowling");
echo $book;
?>