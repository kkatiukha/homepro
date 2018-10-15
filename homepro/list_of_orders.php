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
                <p1> List of Orders</p1>
                </div><!--end case-->
		
		<?php
			include 'variables/variables.php';
			$con=mysqli_connect($dbhostname, $dbusername, $dbpassword, $dbname);

			// Check connection
			if (mysqli_connect_errno($con))
			{    echo "Failed to connect to MySQL: " . mysqli_connect_error();   }
			$query="select concat(c.FirstName, ' ', c.LastName) as Customer, c.Email, s.JobType, s.DateNeed, s.Description from customers c join schedule s on c.customerID = s.CustomerID order by s.ID desc limit 15";
			$data=mysqli_query($con,$query);
			
			Print "<table border cellpadding=3>";
				Print "<tr>";
					Print "<th>Customer</th>";
					Print "<th>Email</th>";
					Print "<th>JobType</th> ";
					Print "<th>DateNeed</th>";
					Print "<th>Description</th>";
					Print "<th>Action</th>";
					while($info=mysqli_fetch_array($data))
					{
						{ $i=$i+1;
							Print "<tr>";
								Print " <td>".$info['Customer'] . "</td>";
								Print " <td>".$info['Email'] . "</td>";
								Print " <td>".$info['JobType'] . "</td>";
								Print " <td>".$info['DateNeed'] . "</td>";
								Print " <td>".$info['Description'] . "</td>";
								$type="submit";
								$event="Action()";
								Print " <th>";
									Print " <button type=".$type." name=".$info['customerID']."onclick=".$event.">Contact</button>";
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