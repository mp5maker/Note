<?php 
$books = new SimpleXMLElement("library.xml", NULL, true);
$books->book[3] = NULL;
header('Content-Type: text/xml');
echo $books->asXML();
?>