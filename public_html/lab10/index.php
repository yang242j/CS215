<?php
	session_start();
		  
	//If somebody is logged in, display a welcome message
	if(isset($_SESSION["email"]))
	{
		echo "Welcome, logged in as:  " .$_SESSION['email']. "<br />" ;	
        echo "<a href='Logout.php'>Logout</a>";
	}
	//If nobody is logged in, display login and signup page.
	else
	{	
		echo "<H3>Please Login or Sign up</h3>";
		echo "<a href='Login.php'>Login</a> <a href='Signup.php'>Signup</a>";	
	}
?>
<!DOCTYPE html>
<head>
<title>Index page with SignUp and Login</title>
</head>
<body>
</body>
</html>
