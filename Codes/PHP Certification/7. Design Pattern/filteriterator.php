<?php 	
class myFilterIterator extends FilterIterator{

    private $user_filter;

	public function __construct($iterator, $user_filter){
		parent::__construct($iterator);
		$this->user_filter = $user_filter;
	}

	public function accept(){
		$user = $this->getInnerIterator()->current();
        if(strcasecmp($user['name'],$this->user_filter) == 0):
         return false;
        endif;        
        return true;
	}
}


$array = array(
array('name' => 'jonathan','id' => '5'),
array('name' => 'abdul' ,'id' => '22')
);

$object = new ArrayIterator($array);
$iterator = new myFilterIterator($object,'abdul');

foreach ($iterator as $result) {
    echo $result['name'];
}
?>