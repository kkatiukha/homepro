<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<meta name="description" content="" />

		<meta name="keywords" content="" />

		<meta name="author" content="" />

		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />

		<title>HomePro, Inc</title>


	</head>



	<body>

		<div id="wrapper">



			<?php include 'include/header.php'; ?>
		    <?php include 'include/nav.php'; ?>  -

			<div id="content">

	<div id="case">

		<p1> Schedule Your FREE Consultation Now to Speak with Designer</p1>
<?php

	$first_name = $_POST['first_name']; // required
	$last_name = $_POST['last_name']; // required
	$phone = $_POST['phone']; // required
	$email= $_POST['email']; // required
	$altphone = $_POST['altphone']; // not required
	$description = $_POST['comments']; //not required
	$job_type =$_POST['job_type'];
	$zipcode=$_POST['zipcode'];
	$subscription_h =$_POST['subscription'];
	if($subscription_h='subscription'){$subscription='yes';} else {$subscription='no';}


  include 'variables/variables.php';

// $con=mysqli_connect($dbhostname, $dbusername, $dbpassword, $dbname);

$connecting_string = sprintf("mongodb://%s:%d/%s", "ds163382.mlab.com", "63382", "learnixdb");
$con = new MongoClient($connecting_string,array("username"=>"homepromaster", "password"=>"homepro123"));

// $connecting_string = sprintf("mongodb://%s:%s@%s:%s/%s", $dbusername, $dbpassword, $dbhostname, '63382', $dbname);
// $con = new MongoClient($connecting_string);

// Check sql connection
// if (mysqli_connect_errno($con))
// {    echo "Failed to connect to MySQL: " . mysqli_connect_error();   }
if ($con->connect_error)
{    echo "Failed to connect to mongodb: " . $con->connect_error;   }

  $query1="INSERT INTO customers(customerID,FirstName,LastName,Email,Phone,AltPhone,Zipcode,Newsletter) VALUES (null,'$first_name','$last_name','$email','$phone','$altphone','$zipcode','$subscription')";
// mysqli_query($con,$query1);
// $inserted_id=mysqli_insert_id($con);
// $query2="INSERT INTO schedule(ID,CustomerID,Description,DateNeed,JobType) VALUES (null,'$inserted_id','$description',NOW(),'$job_type')";
// mysqli_query($con,$query2);
// mysqli_close($con);



?>
		</div><!--end case-->



 		<div id="contact">
Your Information has been sent to HomePro. You will be contacted within 24 hours. Thank you!

                </div>
           <?php include 'include/footer.php'; ?>

		</div> <!-- End #wrapper -->

	</body>

</html>
