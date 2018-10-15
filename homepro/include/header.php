      <div id="header">
			<!--		<img src="../homePro/logo.jpg"/> -->
		<div id=headerbody>		<h1>Home Remodeling by HomePro</h1>
     			<span>See how much better your home can be</span>
		</div>
		<div id="login">

	<?php

	      if ((isset($_COOKIE["userpassword"])) && ($_COOKIE['userpassword']=='homepro123')) {
	         Print "";
	         Print "";
	         Print "You logged in as ".$_COOKIE['userlogin']. "! ";?>
	          <form name="form" method="post" action="loggedin.php">
	             <input type="submit" name="Submit" value="Log Out!" /></p>
	            </form>
	             <?php   }
	      else {
	?>
		 <form name="form" method="post" action="loggedin.php">


		      <label for="txtUsername">Username:</label>

		      <input type="text" title="Enter your Username" name="txtUsername" size=15/></p>



		      <label for="txtPassword">Password:</label>

		      <input type="password" title="Enter your password" name="txtPassword" size=15/></p>



		      <input type="submit" name="Submit" value="Log In!" /></p>

		      </form>
	<?php }
	?>
	</div>

		</div> <!-- end #header -->
