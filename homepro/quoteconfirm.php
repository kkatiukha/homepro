<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		<title>HomePro, Inc</title>
	</head>

	<body>
		<div id="wrapper">
		
			<?php include 'include/header.php'; ?> 
			<?php include 'include/nav.php'; ?>  
		
			<div id="content">
				<div id="case">
					<p1> Free Quote</p1>	
					<?php

						$first_name = $_POST['first_name']; // required
						//	$last_name = $_POST['last_name']; // required
						$phone = $_POST['phone']; // required
						$email= $_POST['email']; // required
						//	$altphone = $_POST['altphone']; // not required
						$description = $_POST['comments']; // not required
						//	$job_type =$_POST['job_type']; 
						//	$zipcode=$_POST['zipcode'];
						$subscription_h =$_POST['subscription']; 
						if($subscription_h='subscription'){$subscription='yes';} else {$subscription='no';}
 
 
  					  	include 'variables/variables.php';
 
						$con=mysqli_connect($dbhostname, $dbusername, $dbpassword, $dbname);

						// Check connection
						if (mysqli_connect_errno($con))
						{    echo "Failed to connect to MySQL: " . mysqli_connect_error();   }

  					  	$query1="INSERT INTO customers(customerID,FirstName,LastName,Email,Phone,AltPhone,Zipcode,Newsletter) VALUES (null,'$first_name','','$email','$phone','','','$subscription')";
						mysqli_query($con,$query1);
						$inserted_id=mysqli_insert_id($con);
						
						$query2="INSERT INTO quotes(ID,CustomerID,Description) VALUES (null,'$inserted_id','$description')";
						mysqli_query($con,$query2);

 					   	mysqli_close($con); 

					?>

				</div><!--end case-->

 				<div id="contact">
					Your request for a free quote has been sent to HomePro. You will be contacted within 24 hours. Thank you!
				</div>
            
				<?php include 'include/footer.php'; ?>      
			
			</div> <!-- End #wrapper -->

	</body>

</html>

