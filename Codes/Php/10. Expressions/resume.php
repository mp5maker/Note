<?php 
$show_form = TRUE;
$error = array();
if(isset($_POST['submit'])){
    $first_name   = $_POST['first_name'];
    $last_name    = $_POST['last_name'];
    $email        = $_POST['email'];
    $phone        = $_POST['phone'];
    $desired_job  = $_POST['desired_job'];
    $resume_paste = $_POST['resume_paste'];
    
    if(empty($first_name)){
         $error['first_name'] = "Please enter your first name!";
	     $show_form = TRUE;
    }
	
	if(empty($last_name)){
	      $error['last_name'] = "Please enter your last name!";
	      $show_form = TRUE;
	}
	
	if(empty($email)){
	      $error['email'] = "Please enter your email!";
	      $show_form = TRUE;
	}
    if(!empty($email)){
    	// $regex = "/^[a-zA-Z0-9\_\.]+@[a-zA-Z0-9]+\.\w{3}$/";
    	$regex = "/^[a-zA-Z0-9\_\.]+@/";
    	if(!preg_match($regex, $email)){
    		$error['email_format'] = "xxxx@xxxx.xxx format do not match!";
    	}
    	else{
    		 $domain = preg_replace($regex, '', $email);
    		 if(!checkdnsrr($domain)){
	    		$error['email_format'] = "Domain do not match!";
    		 }
    	}
     }

	if(empty($phone)){
	      $error['phone'] = "Please enter your phone number!";
	      $show_form = TRUE;
	}
    if(!empty($phone)){
    	$regex = "/^[0-2]\d{2}-\d{3}-\d{3}(\d{4})?$/";
    	if(!preg_match($regex, $phone)){
    		$error['phone_format'] = "XXX-XXX-XXX format do not match!";
    	}
    }    
	
	if(empty($desired_job)){
	      $error['desired_job'] = "Please fill in your desired job!";
	      $show_form = TRUE;
	}
	
	if(empty($resume_paste)){
	      $error['resume_paste'] = "Please fill in your resume!";
	      $show_form = TRUE;
	}
}

if($show_form){
	echo "<!doctype html>";
	echo "  <html>";
	echo "  	<head>";
	echo "  		<title> Resume </title>";
	echo "  		<meta charset = 'UTF-8'/>";
	echo "  	</head>";
	echo "  	<body>";
	echo "		<form method = 'post' action = '".$_SERVER['PHP_SELF']."'>";
	
	echo "		 <label for = 'first_name'> First Name </label><br/>";
	$first_name  =(!empty($_POST['first_name']))?  $_POST['first_name'] : "";
	echo "		 <input type = 'text' name = 'first_name' value = '"
	             .$first_name
	             ."'/>";
    $first_error = (!empty($error['first_name']))? $error['first_name'] : "";
    echo "       <span>".$first_error."</span>";
	echo "		 <br/>";
	
	echo "		 <label for = 'last_name'> Last Name </label><br/>";
	$last_name   =(!empty($_POST['last_name']))?  $_POST['last_name'] : "";
	echo "		 <input type = 'text' name = 'last_name' value ='"
                  .$last_name
	              ."'/>";
    $last_error  = (!empty($error['last_name']))? $error['last_name'] : "";
    echo "       <span>".$last_error."</span>";
	echo "		 <br/>";
	
	echo "		 <label for = 'email'> Email </label><br/>";
	$email       =(!empty($_POST['email']))?  $_POST['email'] : "";
	echo "		 <input type = 'text' name = 'email' value = '"
                  .$email 
	              ."'/>";
    $email_error = (!empty($error['email']))? $error['email'] : "";
    $email_format = (!empty($error['email_format']))? $error['email_format'] : "";
    echo "       <span>".$email_error." ".$email_format."</span>";
	echo "		 <br/>";
	
	echo "		 <label for = 'phone'> Phone </label><br/>";
	$phone       =(!empty($_POST['phone']))?  $_POST['phone'] : "";
	echo "		 <input type = 'text' name = 'phone' value = '"
	              .$phone
	              ."'/>";
    $phone_error = (!empty($error['phone']))? $error['phone'] : "";
    $phone_format = (!empty($error['phone_format']))? $error['phone_format'] : "";
    echo "       <span>".$phone_error." ".$phone_format."</span>";
	echo "		 <br/>";
	
	echo "		 <label for = 'desired_job'> Desired Job </label><br/>";
	$desired_job =(!empty($_POST['desired_job']))?  $_POST['desired_job'] : "";
	echo "		 <input type = 'text' name = 'desired_job' value ='"
				 .$desired_job
	             ."'/>";
    $desired_error = (!empty($error['desired_job']))? $error['desired_job'] : "";
    echo "       <span>".$desired_error."</span>";
	echo "		 <br/>";
	
	echo "		 <label for = 'resume_paste'> Resume Paste </label><br/>";
    $resume_paste = (!empty($_POST['resume_paste']))? $_POST['resume_paste'] : "";
	echo "		 <textarea name = 'resume_paste'>"
			     .$resume_paste
	             ."</textarea>";
    $resume_error = (!empty($error['resume_paste']))? $error['resume_paste'] : "";
    echo "       <span>".$resume_error."</span>";
	echo "		 <br/>";
	
	echo "		 <input type = 'submit' name = 'submit' value = 'Confirm'/>";
	echo "		</form>";
	echo "  	</body>";
	echo "  </html>";
}
?>
