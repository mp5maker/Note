<?php 
echo nl2br("<strong>Array Iterator</strong>\n");
$numbers = [5, 10, 8, 35, 50];
$iterator = new ArrayIterator($numbers);
foreach($iterator as $number){
	echo $number."<br/>";
}
echo "<br/><br/>";

echo nl2br("<strong>Limit Iterator</strong>\n");
$limiter = new LimitIterator($iterator, 0, 3);
foreach($limiter as $number){
	echo $number."<br/>";
}
echo "<br/><br/>";

echo nl2br("<strong>SimpleXML Iterator (file get contents)</strong>\n");
$xml = file_get_contents("library.xml");
$iterator = new SimpleXMLIterator($xml);
foreach($iterator as $item){
	echo $item->getName().": ".$item->attributes()."<br/>";
	echo $item->title."<br/>";
	echo $item->author."<br/>";
	echo $item->publisher."<br/><br/>";
}
echo "<br/><br/>";

echo nl2br("<strong>SimpleXML Iterator (simplexml load file)</strong>\n");
$iterator = simplexml_load_file("library.xml", 'SimpleXMLIterator');
foreach($iterator as $item){
	echo $item->getName().": ".$item->attributes()."<br/>";
	echo $item->title."<br/>";
	echo $item->author."<br/>";
	echo $item->publisher."<br/><br/>";
}
echo "<br/><br/>";

echo nl2br("<strong>SimpleXML Iterator with Limit Iterator(simplexml load file)</strong>\n");
$iterator = simplexml_load_file("library.xml", 'SimpleXMLIterator');
$limit = new LimitIterator($iterator, 0, 2);
foreach($limit as $item){
	echo $item->getName().": ".$item->attributes()."<br/>";
	echo $item->title."<br/>";
	echo $item->author."<br/>";
	echo $item->publisher."<br/><br/>";
}
echo "<br/><br/>";

echo nl2br("<strong>SimpleXML Iterator with Regex Iterator(simplexml load file)</strong>\n");
$iterator = simplexml_load_file("library.xml", 'SimpleXMLIterator');
foreach($limit as $item){
	$regex = new RegexIterator($item->attributes(), '/03/');
	foreach($regex as $book){
		echo $book->title."<br/>";
		echo $item->author."<br/>";
		echo $item->publisher."<br/><br/>";
	}
}
echo "<br/><br/>";

echo nl2br("<strong>Directory Iterator</strong>\n");
$dir = new DirectoryIterator(".");
foreach($dir as $file){
	if(!$file->isDot() && !$file->isDir()):
		echo $file."<br/>";
	endif;
}
echo "<br/><br/>";

echo nl2br("<strong>Recursive Iterator Iterator with Recursive Directory Iterator</strong>\n");
$dir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(".."));
foreach($dir as $file){
		echo $file."<br/>";
}
echo "<br/><br/>";
?>