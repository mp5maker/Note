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

	public function getTitleAuthor(){
		return "Title: ".$this->title.", Author: ".$this->author;
	}
}

class Library{
	protected $books;

	public function bookCount(){
		return count($this->books);
	}

	public function getBook($number){
		if(array_key_exists($number, $this->books)):
			return $this->books[$number];
		else:
			echo "Book Number Invalid";
			return NULL;
		endif;
	}

	public function addBook(Book $book){
		$this->books[] = $book;
	}

	public function removeBook($number){
		if(array_key_exists($number, $this->books)):
			 unset($this->books[$number]);
			 // $this->books = array_values($this->books);
		else:
			echo "Book Number Invalid";
		endif;
	}
}

class BookListIterator implements Iterator{
	protected $library;
	protected $location = 0;

	public function __construct(Library $library){
		$this->library = $library;
	}

	public function current(){
		return $this->library->getBook($this->location); 
	}

	public function next(){
		if($this->location < ($this->library->bookCount() - 1)):
			$this->location += 1;
			return $this;
		else:
			$this->location = 0;
			return $this;
		endif;
	}

	public function prev(){
		if($this->location == 0):
			$this->location = $this->library->bookCount() - 1;
			return $this;
		else:
			$this->location -= 1;
			return $this;
		endif;
	}

	public function rewind(){
		$this->location = 0;

	}

	public function key(){
		return $this->location;
	}

	public function valid($key){
	    if(array_key_exists($key, $this->library)):
	    	return TRUE;
	    else:
	    	return FALSE;
	    endif;
	}
}
/**
 * Testing
 */
$harrypotter = new Book("Harry Potter", "J.K Rowling");
$davincicode = new Book("Da Vinci Code", "Dan Brown");
$angelsanddemons = new Book("Angels and Demons", "Dan Brown");
$outsider = new Book("Outsider", "Stephan Hawkings");

$library = new Library();
$library->addBook($harrypotter);
$library->addBook($davincicode);
$library->addBook($angelsanddemons);
$library->addBook($outsider);

$iterator = new BookListIterator($library);
$iterator->next()->next()->next()->next()->next();
echo $iterator->current()->getTitleAuthor()."<br/>"; 

$iterator->rewind();
echo $iterator->current()->getTitleAuthor()."<br/>"; 

$iterator->prev()->prev();
echo $iterator->current()->getTitleAuthor()."<br/>"; 
?>