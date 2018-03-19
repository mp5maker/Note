<?php 
namespace Inventory;
require("../vendor/autoload.php");

use Fruits\Apple;
use Vegetables\Tomato;

class Inventory
  {
  	 public function __construct()
  	   {
  	   	 $apple = new Apple();
  	   	 $tomato = new Tomato();
  	   }
  }
$inventory = new Inventory();
?>