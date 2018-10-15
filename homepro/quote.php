<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<meta name="description" content="" />

		<meta name="keywords" content="" />

		<meta name="author" content="" />

		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />

		<title>HomePro, Inc</title>

           <script language="JavaScript" src="validation.js"></script>     
     
                
                 	<script type="text/javascript" language="JavaScript">
		function validate(form) {
		
			var bCheck = Boolean(true);
			
                
			if (bCheck) bCheck = checkString(form.first_name, "Name", false);
			 if (bCheck) bCheck = checkString(form.phone, "Phone", false);        
                  	       
			if (!bCheck) return false;
			else return true;
		}


	</script>                
                
	</head>



	<body>

		<div id="wrapper">



		<?php include 'include/header.php'; ?> 
		
		<?php include 'include/nav.php'; ?>  

					<div id="content">

	<div id="case">

		<p1> RECEIVE A FREE QUOTE TODAY </p1>	

		</div><!--end case-->

 		<div id="contact">

 	         <form name="quote" method="post" action="quoteconfirm.php" onsubmit="javascript: return validate(document.quote);">


		    <table width="450px">

			    <tr>

			    <td valign="top">

			      <label for="first_name">Name *</label>

			    </td>

			    <td valign="top">

			      <input  type="text" name="first_name" maxlength="50" size="30">

			    </td>

			    </tr>
			    <tr>

			    <td valign="top">

			      <label for="email">Email</label>

			    </td>

			    <td valign="top">

			      <input  type="text" name="email" maxlength="80" size="30">

			    </td>

			    </tr>
			    
			    <tr>

			    <td valign="top">

			      <label for="phone">Phone</label>

			    </td>

			    <td valign="top">

			      <input  type="text" name="phone" maxlength="12" size="12">

			    </td>

			    </tr>

			    <tr>

			    <td valign="top">

			      <label for="comments">Description</label>

			    </td>

			    <td valign="top">

			      <textarea  name="comments" maxlength="200" cols="25" rows="6"></textarea>

			    </td>

 </tr>

			    <tr>

			    <td colspan="2" style="text-align:left">

			      <input type="checkbox" name="subscription" value="subscription" checked="checked">I would like to receive your regular email communication and newsletters. <br>

			    </td>

			 

			   

			    <tr>

			    <td colspan="2" style="text-align:center">

			      <!-- We are grateful to you for keeping this link in place. thank you. -->

			      <input type="submit" value="Send">  <!-- ( <a href="http://www.freecontactform.com/html_form.php">HTML Form</a> )-->

			    </td>

			    </tr>

			    </table>

			    </form>

 		</div> <!--end contact-->

 			

			</div> <!-- end #content -->

	

		<!--	<?php include 'include/sidebar.php'; ?> -->

			<div id="sidebar">
	
			</div> <!-- end #sidebar -->

<?php include 'include/sidebar2.php'; ?> 		  
<?php include 'include/footer.php'; ?>
		

		</div> <!-- End #wrapper -->

	</body>

</html>

