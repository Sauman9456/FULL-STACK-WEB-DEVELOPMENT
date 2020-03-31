<?php
	$name = $_POST['name'];
	$visitor_email = $_POST['email'];
	$message = $_POST['message'];
	$to = "mns.contactus@gmail.com";
	
	$email_body = "User Name: $name.\n".
					"User Email: $visitor_email.\n".
						"User Message: $message.\n";
	
	require 'PHPMailer-master/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "sonfb1@gmail.com";
   $mail ->Password = "fuzail1221";
   $mail ->SetFrom("sonfb1@gmail.com");
   $mail ->Subject = $name;
   $mail ->Body = $email_body;
   $mail ->AddAddress($to);
	
	$email_from = "sonfb1@gmail.com";
	
	$email_subject = "Query";
	
	
	$headers = "Form: $email_from \r\n"; 
	
	$headers .= "Reply-To: $visitor_email \r\n";
	
	mail($to,$email_subject,$email_body,$headers);
	
	if(!$mail->Send())
   {
       echo "Mail Not Sent";
   }
   else
   {
       echo "Mail Sent";
   }

?>