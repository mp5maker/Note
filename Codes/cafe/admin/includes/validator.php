<?php
/**
 * Validator class
 */
class Validator{
	protected $errors;
	protected $messages;

	/**
	 * Email
	 * @param  string $email 
	 * @param  string $name  
	 * @return null        
	 */
	public function email($email, $name){
		if(empty($email)):
			$this->errors[$name] = 'Email Address cannot be empty';
		else:
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
				$this->errors[$name] = 'Please enter your valid email address';
			endif;
		endif;
	}

	/**
	 * Password
	 * @param  string $password 
	 * @param  string $name     
	 * @return null           
	 */
	public function password($password, $name){
		if(strlen($password) < 6):
			$this->errors[$name] = 'Password needs to be at least 6 letters';
		elseif(strlen($password) > 16):
			$this->errors[$name] = 'Password cannot exceed more than 16 letters';
		else:
			$pattern = "/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[\_!\$@#%\^&*\(\)]).{6,16}$/";
			if(!preg_match($pattern, $password)):
				$this->errors[$name] = 'Password needs to have symbols';
			endif;
		endif;
	}

	public function file($file, $name, $size = 2000000, $image = true){
		if($image):
			$file_types = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
		else:
			$file_types = array();
		endif;
		if(empty($file['tmp_name'])):
			$this->errors[$name] = 'Please enter the file path!';
		else:	
			if(is_uploaded_file($file['tmp_name']) && $file['size'] < $size):
				if(in_array($file['type'], $file_types)):
					if($file['error'] == 0):
						$path = $_SERVER['DOCUMENT_ROOT']."/cafe/img/".$_POST['upload_image_name'];
						if(!file_exists($path)):
							if(move_uploaded_file($file['tmp_name'], $path)):
								$this->messages[$name] = "File Successfully Uploaded";
							else:
								unlink($file['tmp_name']);
							endif;
						else:
							$this->errors[$name] = 'This file already exist!';
							unlink($file['tmp_name']);
						endif;
					endif;
				else:
					$this->errors[$name] = 'Please upload only gif, jpg, jpeg and gif!';
				endif;
			else:
				$this->errors[$name] = 'Maximum File size should not exceed 2MB!';
				unlink($file['tmp_name']);
			endif;
		endif;
	}

	/**
	 * Return Errors
	 * @return array 
	 */
	public function errors(){
		return $this->errors;
	}

	/**
	 * Return Messages
	 * @return array 
	 */
	public function messages(){
		return $this->messages;
	}
}

