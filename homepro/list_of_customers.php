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
                        <?php include 'include/nav.php'; ?>
                        <div id="content">
                        <div id="case">
                <p1> List of customers</p1>
                </div><!--end case-->
                <?php
				include 'variables/variables.php';
				$con=mysqli_connect($dbhostname, $dbusername, $dbpassword, $dbname);
				
				// Check connection
				if (mysqli_connect_errno($con))
					{    echo "Failed to connect to MySQL: " . mysqli_connect_error();   }
				 $query="select * from customers order by customerID desc limit 10";
				 $data=mysqli_query($con,$query);
				
				Print "<table border cellpadding=3>";
				Print "<tr>";
				Print "<th>First Name</th>";
				Print "<th>Last Name</th>";
			        Print "<th>Email</th> ";
				Print "<th>Phone</th>";
				Print "<th>Action</th>";

				while($info=mysqli_fetch_array($data))
				{
					if($info['FirstName']!='')
					{$i=$i+1;
						Print "<tr>";
						Print " <td>".$info['FirstName'] . "</td>";
						Print " <td>".$info['LastName'] . "</td>";
						Print " <td>".$info['Email'] . "</td>";
						Print " <td>".$info['Phone'] . "</td>";
						
						$type="submit";
						$event="Details()";
						Print " <th>";
						Print " <button type=".$type." name=".$info['customerID']."onclick=".$event.">Details</button>";
						Print "</th>";
					}
				}
				
				Print "</table>";
				
				mysqli_close($con);
				
		?>
                <div id="contact">
                </div>
	</div> <!-- End #wrapper -->
	<?php include 'include/footer.php'; ?>
  </body>
</html>
