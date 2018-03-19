<?php 
namespace Inventory;       
require "Fruits/Apple.php"; 
require "Vegetables/Tomato.php"; 

class Inventory
  {
    public function __construct()
      {
      	 $fruits = new Apple();
      	 $vegetables = new Tomato();
      }
  }

$inventory = new Inventory(); 
?>