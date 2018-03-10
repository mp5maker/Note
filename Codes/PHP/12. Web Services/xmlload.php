<?php 
$note = simplexml_load_file("note.xml");

//Accessing the value to w.r.t tags
echo $note->to."<br/>";
echo $note->heading."<br/>";
echo $note->body."<br/>";
echo $note->from."<br/><br/>";

//Accessing tags
echo $note->getName()."<br/>";
foreach($note->children() as $child){
   echo $child->getName().": ".$child."<br/>";
}
?>