<?php
	session_start();
		  
	//If nobody is logged in, display login and signup page.
	if(isset($_SESSION["email"]))
	{
		$email = trim($_POST["email"]);
		$password = trim($_POST["password"]);
		
		$db = new mysqli("localhost", "li787", "lQ096-", "li787");
		if ($db->connect_error)
		{
			die ("Connection failed: " . $db->connect_error);
		}
	  	//If somebody is logged in, display a welcome message
		echo "Your email address is " .$_SESSION['email']. "<br />" ;	

	}

	else
	{	
		echo "<H3>Please Login or Sign up</h3>";
		echo "<a href='storeLogin.php'>Login</a> <a href='RegistrationPage.php'>Signup</a>";	
				
	}
?>


<?php

if (isset($_POST["submitted"]) && $_POST["submitted"])
{

	
			$password = trim($_POST["password"]);
			$first = trim($_POST["first"]);
			$last = trim($_POST["last"]);

			/// Create connection
			$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
				
			// sql to create table
				
			
			$pswd = "update Users set password = '$password' where email = '$_SESSION[email]'
			";
			$fst = "update Users set firstname = '$first' where email = '$_SESSION[email]'
			";
			$lst = "update Users set lastname = '$last' where email = '$_SESSION[email]'
			";


				
			if ($conn->query($pswd) === TRUE && $conn->query($fst) === TRUE && $conn->query($lst) === TRUE ) {
				echo "Information changed successfully";

			} else {
				echo "Error: " . $conn->error;
			}

			
		$conn->close();



} else {
	echo "Sorry, there was an error uploading your file.";
}
?>



<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="homeEX.css" type="text/css" />
<title>Mini PUBG Store</title>
<script type="text/javascript" src="TotalJS.js"> </script>
<style type="text/css">

.err_msg
{
	color:red;
	text-decoration:underline;

}
</style>
</head>
<body>
<form class="modal-content animate" action="editInformation.php" id="EditInformation" method="post" enctype="multipart/form-data">
<input type="hidden" name="submitted" value="1"/>
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.jpg" alt="Avatar" class="avatar">
    </div>

<h1> Edit Information </h1>


	<h3>Password</h3><label id="cate_msg" class="err_msg"></label>
  <input type="text" name="password" placeholder="new password"size="30" />
	<h3>First name</h3><label id="title_msg" class="err_msg"></label>
  <input type="text" name="first" placeholder="new first name"size="30" />
 	
    <h3>Last name</h3><label id="price_msg" class="err_msg"></label>
<input type="text" name="last" placeholder="new last name" size="30" />
 	

 
<br />
<h5><input type="submit" name="submit" value="Change Information" /></h5>


    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>

    </div>
  </form>
</body>
</html>