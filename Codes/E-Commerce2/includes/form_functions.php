<?php
function create_form_input($name, $type, $errors, $values = 'POST', $extras = ''){
	$value = '';
	
	if($values == 'SESSION'):
		if(isset($_SESSION)): 
			$value = $_SESSION[$name];
		endif;
	elseif($values == 'POST'):
		if(isset($_POST[$name])): 
			$value = $_POST[$name];
		endif;
		if($value && get_magic_quotes_gpc()):
			$value = striplashes($value);
		endif;
	endif;

	if(($type == 'text') || ($type == 'password')):
		$input = "
			<div class = 'form-group'>
				<label for = '".$name."'>".ucfirst($name)."</label>
				<input type = '".$type."' name = '".$name."' 
					   id = '".$name."' class = 'form-control'
					   value = '".htmlspecialchars($value)."' $extras/>
				";
		if(array_key_exists($name, $errors)):
			$input .= "
				<span class = 'text-danger'>
					".$errors[$name]." 
				</span>
			";
		endif;

		$input .= "
			</div>
		";
		return $input;
	elseif($type == 'select'):
		if(($name == 'state') || ($name == 'cc_state')):
			$data = array(
			    'AL'=>'Alabama', 'AK'=>'Alaska', 'AZ'=>'Arizona',
			    'AR'=>'Arkansas','CA'=>'California','CO'=>'Colorado',
			    'CT'=>'Connecticut','DE'=>'Delaware', 'DC'=>'District of Columbia',
			    'FL'=>'Florida', 'GA'=>'Georgia','HI'=>'Hawaii',
			    'ID'=>'Idaho', 'IL'=>'Illinois','IN'=>'Indiana',
			    'IA'=>'Iowa','KS'=>'Kansas','KY'=>'Kentucky',
			    'LA'=>'Louisiana','ME'=>'Maine','MD'=>'Maryland',
			    'MA'=>'Massachusetts', 'MI'=>'Michigan','MN'=>'Minnesota',
			    'MS'=>'Mississippi', 'MO'=>'Missouri','MT'=>'Montana',
			    'NE'=>'Nebraska','NV'=>'Nevada','NH'=>'New Hampshire',
			    'NJ'=>'New Jersey','NM'=>'New Mexico','NY'=>'New York',
			    'NC'=>'North Carolina','ND'=>'North Dakota','OH'=>'Ohio',
			    'OK'=>'Oklahoma','OR'=>'Oregon','PA'=>'Pennsylvania',
			    'RI'=>'Rhode Island','SC'=>'South Carolina','SD'=>'South Dakota',
			    'TN'=>'Tennessee','TX'=>'Texas','UT'=>'Utah',
			    'VT'=>'Vermont', 'VA'=>'Virginia','WA'=>'Washington',
			    'WV'=>'West Virginia','WI'=>'Wisconsin','WY'=>'Wyoming',
			);
		elseif($name == 'cc_exp_month'):
			$data = [
				1 => 'January', 2 => 'February', 3 => 'March', 
				4 => 'April', 5 => 'May', 6 => 'June', 
				7 => 'July', 8 => 'August', 9 => 'September',
				10 => 'October', 11 => 'November', 12 => 'December'
			];
		elseif($name == 'cc_exp_year'):
			$data = array();
			$start = date('Y');
			for($i = $start; $i <= ($start + 5); $i++):
				$data[$i] = $i;
			endfor;
		endif;
		
		$input = "
			<div class = 'form-group'>
				<label for = '".$name."'>".ucfirst($name)."</label>
				<select name = '".$name."' class = 'form-control' id = '".$name."'>
			";
		foreach($data as $k => $v):
			if($value == $k):
				$input .= "
					<option value = '".$k."' selected = 'selected'>
						".$v."
					</option>
				";
			else:
				$input .= "
					<option value = '".$k."'>
						".$v."
					</option>
				";
			endif;
		endforeach;
		
		if(array_key_exists($name, $errors)):
			$input .= "
				<span class = 'text-danger'>".$errors[$name]."</span>
			";
		endif;

		$input .= "
				 </select>
			</div> 
		";
		return $input;
	endif;
}
?>
