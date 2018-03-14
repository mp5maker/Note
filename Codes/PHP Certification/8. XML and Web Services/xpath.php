<?php
$books = new SimpleXMLElement("library.xml", NULL, true);
$xpaths = $books->xpath('/library/book/title');

//Search the title elements
foreach($xpaths as $xpath):
	echo nl2br($xpath."\n");
endforeach;

//Search for the first child element
$result = $books->book[0]->xpath('title');

echo "<pre>";
var_dump($result);
echo "</pre>";
foreach($result as $title):
	echo $title."<br/>";
endforeach;

?>