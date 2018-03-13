<?php 
class myIterator implements Iterator{
    protected $data =  array();
    protected $location = 0;

	public function __construct($datas){
		foreach($datas as $data):
	 		$this->data[] =  $data;
		endforeach;
	}

	public function current(){
	    return $this->data[$this->location];
	}

	public function next(){
		$this->location += 1;
	}

	public function rewind(){
		$this->location = 0;
	}

	public function key(){
		return $this->location;
	}

	public function valid(){
		return isset($this->data[$this->location]);
	}
}

class first{}
class second{}
$first = new first();
$second = new second();
$third = new first();
$fourth = new second();
$fifth = new first();
$collection = [$first, $second, $third, $fourth, $fifth];


echo "<pre>";
echo "<strong>All Objects in the Array</strong><br/>";
$data = new myIterator($collection);
var_dump($data);

echo "<br/><strong>Next Array</strong><br/>";
$data->next();
$data->next();
var_dump($data->key());
var_dump(get_class($data->current()));
$data->rewind();
var_dump($data->key());
echo "</pre>";
?>