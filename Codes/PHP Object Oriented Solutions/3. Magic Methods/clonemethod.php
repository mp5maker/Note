<?php
class Chess{} 

class Ludu{}

class playing{
	public $game;

	public function __clone(){
		$this->game = clone $this->game;
	}
}

$playing = new playing();
$playing->game = new Chess();

$clone = clone $playing;
$clone->game = new Ludu();

echo "<pre>";
var_dump(get_class($playing->game));
echo "</pre>";

echo "<pre>";
var_dump(get_class($clone->game));
echo "</pre>";
?>