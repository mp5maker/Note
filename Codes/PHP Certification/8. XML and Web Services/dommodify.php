<?php
$dom = new DomDocument();
$dom->load("library.xml");

$book = $dom->createElement("book");
$book->setAttribute("isbn", "0973589825");

$title = $dom->createElement("title");
$text = $dom->createTextNode("PHP|architect's Guide to PHP Design Patterns");
$title->appendChild($text);
$book->appendChild($title);

$author = $dom->createElement("author", "Jason E. Sweat");
$book->appendChild($author);

$publisher = $dom->createElement("publisher", "Marco Tabini &amp; Associates, Inc.");
$book->appendchild($publisher);
$dom->documentElement->appendChild($book);
?>