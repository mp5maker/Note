<?php 
class Book{
	protected $title;
	protected $author;

	 public function setTitleAuthor($title, $author){
	 	$this->title = $title;
	 	$this->author = $author;
	 }

	 public function __toString(){
	 	return $this->title." by ".$this->author."<br/>";
	 }

}

echo nl2br("<strong>Creating an Object and echo the class</strong>\n");
$book = new Book();
$book->setTitleAuthor("Harry Potter", "J.K Rowling");
echo $book;
echo "<br/>";

// echo nl2br("<strong>Referring to the same object</strong>\n");
// $copyBook = $book;
// echo $copyBook;
// echo "<br/>";

// echo nl2br("<strong>New title and author for the clone</strong>\n");
// $copyBook->setTitleAuthor("Da Vinci Code", "Dan Brown");
// echo $copyBook;
// echo $book;
// echo "<br/>";

echo nl2br("<strong>Cloning the object</strong>\n");
$copyBook = clone $book;
echo $copyBook;
echo "<br/>";

echo nl2br("<strong>New title and author for the clone</strong>\n");
$copyBook->setTitleAuthor("Da Vinci Code", "Dan Brown");
echo $book;
echo $copyBook;
echo "<br/>";

echo nl2br("<strong>Referring to the same variable using pointer</strong>\n");
$a = 3;
$b = &$a;
$b = 5;

echo $b."<br/>";
echo $a."<br/>";
?>