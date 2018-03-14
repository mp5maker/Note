<?php 
/**
 * First way to import xml document
 * Import documents into a DOM tree and then load them
 * @var DomDocument
 */
$domHTML = new DomDocument();
$domHTML->load("sampleHTML.html");

/**
 * Second way to import xml document
 * Load the document using a string
 * This hand when using REST Web Services
 * @var DomDocument
 */
$file = file_get_contents("library.xml");
$domXML = new DomDocument();
$domXML->loadXML($file);

/**
 * Save Files to HTML and XML
 */
$domHTML->saveHTMLFile("SampleCopy.html");
$domXML->save("bookstore.xml");
?>