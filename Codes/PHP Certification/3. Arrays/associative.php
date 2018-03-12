<?php 
$employees  = [
	            'Photon' =>[
	            	         'id'         => '433',
	            	         'occupation' => 'engineer'
	            		   ],
	            //Assuming we couldn't get the name
				'0' =>   [
	            	         'id'         => '512',
	            	         'occupation' => 'Technician'
	            		   ],

				'Sam' =>   [
	            	         'id'         => '102',
	            	         'occupation' => 'Human Resource'
	            		   ],
              ];

foreach($employees as $employee => $datas):
	     echo nl2br("<strong>$employee</strong>\n");
	     foreach($datas as $information => $data):
	     	echo nl2br("$information: $data\n");
	     endforeach;
	     echo nl2br("\n");
endforeach;

$employees[] = 'Brianna';

echo "<strong>".$employees[1]."</strong>";
echo "<pre>";
var_dump($employees);
echo "</pre>";

?>