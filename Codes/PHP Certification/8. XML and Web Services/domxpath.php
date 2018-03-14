<?php
$dom = new DomDocument();
$dom-> load("library.xml");
$xpath =  new DomXPath($dom);
$query = "//library/book/author";
$result = $xpath->query($query);
foreach($result as $data):
	echo "<pre>";
	 echo $data->tagName.": ".$data->textContent."<br/>";
	echo "</pre>";
endforeach;

$query = "//library/book/title";
$result = $xpath->query($query);
foreach($result as $data):
	echo "<pre>";
	 echo $data->nodeName.": ".$data->nodeValue."<br/>";
	echo "</pre>";
endforeach;


$query = "//library/book/title/text()";
$result = $xpath->query($query);
foreach($result as $data):
	echo "<pre>";
	 echo $data->nodeValue."<br/>";
	echo "</pre>";
endforeach;
?>