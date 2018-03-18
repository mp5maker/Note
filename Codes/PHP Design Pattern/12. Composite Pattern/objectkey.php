<?php 
class Book{
	protected $title;
	protected $author;

	public function __construct($title, $author){
		$this->title = $title;
		$this->author = $author;
	}

	public function getTitle(){
		return $this->title;
	}

	public function getAuthor(){
		return $this->author;
	}
}

class Library{
	protected $books;

	public function add($book){
		$this->books[spl_object_hash($book)] = $book;
		return $this; 
	}

	public function remove($book){
		if(array_key_exists(spl_object_hash($book), $this->books)):
			unset($this->books[spl_object_hash($book)]);
		else:
			echo "Sorry this book do not exist";
		endif;
	}

	public function getTitle($book){
		return $this->books[spl_object_hash($book)]->getTitle();
	}

	public function getAuthor($book){
		return $this->books[spl_object_hash($book)]->getAuthor();
	}
}

$harrypotter = new Book("Harry Potter", "J.K Rowling");
$davincicode = new Book("Da Vinci Code", "Dan Brown");
$angelsanddemons = new Book("Angels and Demons", "Dan Brown");
$outsider = new Book("Outsider", "Stephan Hawkings");

$library = new Library();
$library->add($harrypotter)->add($davincicode)->add($angelsanddemons)->add($outsider);
echo $library->getTitle($harrypotter)." by ".$library->getAuthor($harrypotter)."<br/>";


?>