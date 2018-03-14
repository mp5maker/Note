<?php 
//Load an XML String (Procedural)
$xmlstr = file_get_contents("library.xml");
$library_string = simplexml_load_string($xmlstr);


//Load an XML File (Procedural)
$library_procedural = simplexml_load_file("library.xml");

//Load an XML file (Object)
$books = new simpleXMLElement("library.xml", NULL, true);

/**
 * Preferred way to parse
 */
foreach($books->children() as $book):
	echo nl2br($book->getName()." ");
	foreach($book->attributes() as $isbn):
		echo nl2br($isbn->getName()." : $isbn\n");
	endforeach;
	foreach($book->children() as $info):
		echo nl2br($info->getName()." : $info\n");
	endforeach;
	echo "<br/>";
endforeach;




echo "=========================================================<br/><br/>";
/**
 * In this method we need to know the whole structure of the XML Element
 */
foreach($books as $book):
	echo nl2br($book['isbn']."\n");
	echo nl2br($book->title."\n");
	echo nl2br($book->author."\n");
	echo nl2br($book->publisher."\n\n");
endforeach;

/**
 * This method not used
 * isbn attribute with its corresponding meta-data cannot be retrieved
 */
// foreach($books as $book => $infos):
// 	foreach($infos as $information => $data):
// 		echo "$information: $data<br/>";
// 	endforeach;
// 	echo "<br/>";
// endforeach;

?>