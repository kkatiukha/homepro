<?php

	define('SENDER', 'kkatiukha@gmail.com');        
	define('RECIPIENT', 'kseniiak@yahoo.com');  
	define('USERNAME','AKIAJRABCHH5LP3VH6CA');  
	define('PASSWORD','AgI7IuMEswCUHKONHbFvMWaeDENhobV5Yzvfr1h9/XIN');
	define('HOST', 'email-smtp.us-west-2.amazonaws.com');  
	define('PORT', '587');     

	// Other message information                                               
	define('SUBJECT','Amazon SES test (SMTP interface accessed using PHP)');
	define('BODY','This email was sent through the Amazon SES SMTP interface by using PHP.');

	require_once 'Mail.php';

	$headers = array (
  	'From' => SENDER,
 	'To' => RECIPIENT,
	'Subject' => SUBJECT);

	$smtpParams = array (
 		'host' => HOST,
 		'port' => PORT,
  		'auth' => true,
  		'username' => USERNAME,
  		'password' => PASSWORD
	);

 	// Create an SMTP client.
	$mail = Mail::factory('smtp', $smtpParams);

	// Send the email.
	$result = $mail->send(RECIPIENT, $headers, BODY);

	if (PEAR::isError($result)) {
  	  echo("Email not sent. " .$result->getMessage() ."\n");
	} else {
 	   echo("Email sent!"."\n");
	}

?>