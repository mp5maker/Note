<?php
 $message = true;
 $from = $admin_email;
 $to = $_SESSION['email'];
 $subject = "Coffee Raid: Order Confirmation";
 $headers = "From:" . $from;
 $message = "
			Thank you for your order # ".$_SESSION['order_id']."
			Please use this email to correspondence with us. 
			A charge of $".($_SESSION['order_total']/100)." will appear on your credit card when the order ships. 
			All orders are processed on the next business days. You will be contacted in case of any delays.			
			";

if(mail($to,$subject,$message, $headers)):
    echo "Email sent.";
else: 
    echo "Failed to send the email.";
endif; 