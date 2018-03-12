<?php 
	$books = ["Da Vinci Code" => "Dan Brown",  "Harry Potter" => "J.K Rowling", "John Oliver" => "Charles Dickens"];

	reset($books);
	while(key($books) != NULL):
		echo "Book Name:: ".key($books)."<br/>";
		echo "Author Name:: ".current($books)."<br/><br/>";
		next($books);
	endwhile;
    
    echo nl2br("\n");

	reset($books);
	end($books);

	while(key($books) != NULL):
		echo "Book Name:: ".key($books)."<br/>";
		echo "Author Name:: ".current($books)."<br/><br/>";
		prev($books);
	endwhile;
?>