<?php 
try{
	throw new myException("What is this problem!");

}catch(myException $e){
   echo "Error: ".$e->getMessage();
}

class myException extends Exception{
}
?>