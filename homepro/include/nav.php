<div id="nav">
			<a href="index.php">Home</a>
			<a href="aboutus.php">About Us</a>
			<a href="gallery.php">Photo Gallery</a>
			<a href="quote.php">Free Quote</a>
			<a href="order.php">Schedule an Appointment</a>

			<?php if ((isset($_COOKIE["userpassword"])) && ($_COOKIE['userpassword']=='homepro123')) {
    			?> <a href="list_of_customers.php">List of Customers</a> <?php
					?> <a href="list_of_orders.php">List of Orders</a> <?php
			} ?>

			<a href="https://learnixtree.atlassian.net">Report a Bug</a>
	</div> <!-- end #nav -->
