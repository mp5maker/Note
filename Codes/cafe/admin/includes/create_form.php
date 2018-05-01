<?php 
/**
 * Creates Form (Shortcut Way)
 */
class createForm{
	protected $form;

	/**
	 * Initializes the form
	 */
	public function __construct($file = false, $method = 'post'){
		if($file):
			$this->form = "<form method = '".$method."' action = '".$_SERVER['PHP_SELF']."' class = 'm-2' enctype = 'multipart/form-data'>";
		else:
			$this->form = "<form method = '".$method."' action = '".$_SERVER['PHP_SELF']."' class = 'm-2'>";
		endif;
	}

	/**
	 * createText
	 * @param  string $label  
	 * @param  string $name   
	 * @param  string $type   
	 * @param  string $errors 
	 * @return null           
	 */
	public function createText($label, $name, $type, $errors){
		if(isset($_POST[$name])):
			$value = $_POST[$name];
		else:
			$value = '';
		endif;
		$this->form .= "
			<div class = 'form-group'>
				<label for = '".$name."' class = 'control-label'>".$label."</label>
				<input type = '".$type."' name = '".$name."' id = '".$name."' 
					   value = '".$value."' class = 'form-control'/>
				";
		if(!empty($errors)):
			if(array_key_exists($name, $errors)):
				$this->form .= "
						<span class = 'text-danger'>".$errors[$name]."</span>
					</div>
				";
			else:
				$this->form .= "</div>";
			endif;
		else:
			$this->form .= "</div>";
		endif;
	}

	/**
	 * createNumber
	 * @param  string $label  
	 * @param  string $name   
	 * @param  string $type   
	 * @param  string $errors 
	 * @param  float  $step   
	 * @return null         
	 */
	public function createNumber($label, $name, $errors, $type = 'number', $step = 1){
		if(isset($_POST[$name])):
			$value = $_POST[$name];
		else:
			$value = '';
		endif;
		$this->form .= "
			<div class = 'form-group'>
				<label for = '".$name."' class = 'control-label'>".$label."</label>
				<input type = '".$type."' name = '".$name."' id = '".$name."' 
					   value = '".$value."' class = 'form-control' step = '".$step."'/>
				";
		if(!empty($errors)):
			if(array_key_exists($name, $errors)):
				$this->form .= "
						<span class = 'text-danger'>".$errors[$name]."</span>
					</div>
				";
			else:
				$this->form .= "</div>";
			endif;
		else:
			$this->form .= "</div>";
		endif;
	}

	/**
	 * createFile
	 * @param  string  $label  
	 * @param  string  $name   
	 * @param  string  $type   
	 * @param  array   $errors 
	 * @param  integer $size   
	 * @return null          	
	 */
	public function createFile($label, $name, $type, $errors, $size = 2000000){
		if(isset($_POST[$name])):
			$value = $_POST[$name];
		else:
			$value = '';
		endif;
		$this->form .= "
			<div class = 'form-group'>
				<label for = '".$name."' class = 'control-label'>".$label."</label>
				<input type = '".$type."' name = '".$name."' id = '".$name."' 
					   value = '".$value."' class = 'form-control' accept = 'image/*'/>
				<input type = 'hidden' name = 'MAX_FILE_SIZE' value = '".$size."' />
			";
		if(!empty($errors)):
			if(array_key_exists($name, $errors)):
				$this->form .= "
						<span class = 'text-danger'>".$errors[$name]."</span>
					</div>
				";
			else:
				$this->form .= "</div>";
			endif;
		else:
			$this->form .= "</div>";
		endif;

	}

	/**
	 * createSelect 
	 * @param  string $label   
	 * @param  string $name    
	 * @param  array  $options 
	 * @param  string $errors  
	 * @return null          
	 */
	public function createSelect($label, $name, $options, $errors){
		$this->form .= "
			<div class = 'form-group'>
				<label for = '".$name."' class = 'control-label'>".$label."</label>
				<select name = '".$name."' id = '".$name."' class = 'form-control'>
		";
		foreach($options as $k => $v):
			$this->form .= "<option value = '$k'>".$v."</option>";
		endforeach;
		$this->form .= "</select>";
		if(!empty($errors)):
			if(array_key_exists($name, $errors)):
				$this->form .= "
						<span class = 'text-danger'>".$errors[$name]."</span>
					</div>
				";
			else:
				$this->form .= "</div>";
			endif;
		else:
			$this->form .= "</div>";
		endif;
	}

	/**
	 * createRadio
	 * @param  string $label   
	 * @param  string $name    
	 * @param  array  $options 
	 * @param  array  $errors  
	 * @return null          
	 */
	public function createRadio($label, $name, $options, $errors){
		$this->form .= "
			<div class = 'form-group'>
				<label for = '".$name."' class = 'control-label'>".$label."</label>
				<div class = 'radio'>
		";
		foreach($options as $k => $v):
			$this->form .= "
							<input type = 'radio' name = '".$name."' value = '".$k."''>
							<label>".$v."</label>
						";
		endforeach;
		$this->form .= "</div>";
		if(!empty($errors)):
			if(array_key_exists($name, $errors)):
				$this->form .= "
						<span class = 'text-danger'>".$errors[$name]."</span>
					</div>
				";
			else:
				$this->form .= "</div>";
			endif;
		else:
			$this->form .= "</div>";
		endif;
	}

	/**
	 * createTextArea
	 * @param  string $label  
	 * @param  string $name   
	 * @param  array  $errors 
	 * @return null         
	 */
	public function createTextArea($label, $name, $errors){
		if(isset($_POST[$name])):
			$value = $_POST[$name];
		else:
			$value = '';
		endif;
		$this->form .= "
			<div class = 'form-group'>
				<label for = '".$name."' class = 'control-label'>".$label."</label>
				<textarea name = '".$name."' id = '".$name."'class = 'form-control'/>
					".$value."
				</textarea>
				";
		if(!empty($errors)):
			if(array_key_exists($name, $errors)):
				$this->form .= "
						<span class = 'text-danger'>".$errors[$name]."</span>
					</div>
				";
			else:
				$this->form .= "</div>";
			endif;
		else:
			$this->form .= "</div>";
		endif;
	}

	/**
	 * [createCaptcha description]
	 * @param  [type] $label [description]
	 * @param  [type] $name  [description]
	 * @param  [type] $src   [description]
	 * @return [type]        [description]
	 */
	public function createCaptcha($label, $name, $src, $errors){
		$this->form .= "
			<div class = 'form-group'>
				<label for = '".$name."'>".$label."</label><br/>
				<img src = '".$src."'/>
  				<input type = 'text' name = '".$name."' class = 'form-control'>
  				";
  		if(!empty($errors)):
			if(array_key_exists($name, $errors)):
				$this->form .= "
						<span class = 'text-danger'>".$errors[$name]."</span>
					</div>
				";
			else:
				$this->form .= "</div>";
			endif;
		else:
			$this->form .= "</div>";
		endif;
	}

	/**
	 * createHidden
	 * @param  string $name  
	 * @param  string $value 
	 * @return null        
	 */
	public function createHidden($name, $value){
		$this->form .= "
			<div class = 'form-group'>
				<input type = 'hidden' name = '".$name."' value = '".$value."' />
			</div>
			";
	}

	/**
	 * createSubmit
	 * @param  string $name  
	 * @param  string $type  
	 * @param  string $value 
	 * @param  string $color 
	 * @return null        
	 */
	public function createSubmit($name, $type, $value, $color = 'btn-success'){
		$this->form .= "
			<input type = 'submit' class = 'btn ".$color."' value = '".$value."' name = '".$name."'/>
		";
	}

	/**
	 * End of the form
	 * @return string 
	 */
	public function end(){
		$this->form .= "</form>";
		return $this->form;
	}

	/**
	 * __toString
	 * @return string Converts the form object into string
	 */
	public function __toString(){
		return $this->form;
	}
}

