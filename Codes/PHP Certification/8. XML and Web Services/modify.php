<?php
$books = new SimpleXMLElement("library.xml", NULL, true);

$book = $books->addChild('book');
$book->addAttribute("isbn", "0812550706");
$book->addChild('title', "Ender's Game");
$book->addChild('author', "Orson Scott Card");
$book->addChild('publisher', "Tor Science Fiction");

header('Content-Type: text/xml');
echo $books->asXML();
?>
