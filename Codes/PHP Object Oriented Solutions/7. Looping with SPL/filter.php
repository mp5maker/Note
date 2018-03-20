<?php 
class PriceFilter extends FilterIterator{
	public function accept(){
		$item = $this->current();
		if($item['price'] <= 40):
			return TRUE;
		endif;
		return FALSE;
	}
}

$books = [
		 	["book" => "Harry Potter", "author" => "J.K Rowling", "price"  => 129],
 			["book" => "Da Vinci Code", "author" => "Dan brown", "price"  => 79],
 		    ["book" => "Oliver Twist", "author" => "Charles Dickens","price"  => 20]
		];
$bookIterator = new ArrayIterator($books);
$bookIterator = new PriceFilter($bookIterator);
foreach($bookIterator as $key => $value):
	print_r($value);
endforeach;
?>