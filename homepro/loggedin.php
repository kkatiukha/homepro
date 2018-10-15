<?php
             if($_POST['txtUsername'] != null && $_POST['txtPassword'] != null)
             {
	      $userusername=$_POST['txtUsername'];
	      $userpassword=$_POST['txtPassword'];

	        if ($userusername =="homepro"&&$userpassword=="homepro123")
	          {setcookie ( "userlogin", "homepro", time()+60*60*24 );
	           setcookie ( "userpassword", "homepro123", time()+60*60*24 ); }
	           }

	       else {
	       setcookie ( "userlogin", "homepro", time()-60*60*24 );
	       setcookie ( "userpassword", "homepro123", time()-60*60*24 );}

	      header('Location: index.php');

?>
