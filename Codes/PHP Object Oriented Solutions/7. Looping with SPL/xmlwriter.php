<?php
$xml = new XMLWriter();
$xml->openURI("php://output");
$xml->startDocument("1.0", "UTF-8");
$xml->setIndent(4);
$xml->startElement("library");
	$xml->startElement("book");
	$xml->writeAttribute("isbn","1340871234");
				$xml->writeElement("title", "Harry Potter");
				$xml->writeElement("author",  "J.K Rowling");
				$xml->writeElement("price",  "36");
	$xml->endElement();
	$xml->startElement("book");
	$xml->writeAttribute("isbn","1341234234");
				$xml->writeElement("title", "Angels & Demons");
				$xml->writeElement("author", "Dan Brown");
				$xml->writeElement("price",  "234");
	$xml->endElement();
$xml->endElement();
$xml->endDocument();
$xml->flush();
?>