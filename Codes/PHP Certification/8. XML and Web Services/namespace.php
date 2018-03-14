<?php 
//Returns all the elements
echo "<strong>Returns all the elements</strong><br/>";
$books = new SimpleXMLElement("books.xml", NULL, true);
$namespaces = $books->getDocNamespaces();
foreach($namespaces as $key => $value):
	echo nl2br("{$key}: {$value}\n");
endforeach;
echo "<br/><br/>";

//Returns elements with namespace in it
echo "<strong>Returns elements with namespace in it</strong><br/>";
$namespaces = $books->getNamespaces(true);
foreach($namespaces as $key => $value):
	echo nl2br("{$key}: {$value}\n");
endforeach;
?>