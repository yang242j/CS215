<?php
	// check to see if the form was submitted
	if (isset($_POST["submitted"]) && $_POST["submitted"]) {
		// get the username and password and check that they aren't empty
		$username = trim($_POST["username"]);
		$password = trim($_POST["password"]);
		if (strlen($username) > 0 && strlen($password) > 0) {
			// load the database and verify the username/password
			$db = new mysqli("localhost", "hoeber", "pwd", "hoeber");
		  	if ($db->connect_error) {
		  		die ("Connection failed: " . $db->connect_error);
		  	}
		  
		  	$q = "SELECT user_id, first_name FROM Users WHERE email = '$username' AND password = '$password';";
		  	$result = $db->query($q);
		  
		  	if ($row = $result->fetch_assoc()) {
		  		// login successful
		  		session_start();
				$_SESSION["user_id"] = $row["user_id"];
				$_SESSION["first_name"] = $row["first_name"];
				header("Location: orders.php");
				$db->close();
				exit();
			} else {
				// login unsuccessful
				$error = ("The username/password combination was incorrect.");
				$db->close();
			}
		} else {
			$error = ("You must enter a non-blank username/password combination to login.");
		}
	} else {
		$error = "";
	}

?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Login Form</title>
		<meta charset = "utf-8" />
		<link rel="stylesheet" type="text/css" href="inc/style.css">
		</link>
		<script type = "text/javascript"  src = "inc/q5.js" >
		</script>
	</head>
	<body>
		<h3>Login</h3>
		<p class="error"><?=$error?></p>
		<form action="index.php" method="post">
			<input type="hidden" name="submitted" value="1" />
			<p><label>
				<input type="text" id="username" name="username" />
				Username
				</label>
				<span id="username_error" class="hide_error"> 
					(You must enter your username.)</span>
			</p>
			<p><label>
				<input type="password"  id="password" name="password" />
				Password
				</label>
				<span id="password_error" class="hide_error">
					(You must enter your password.)</span>
			</p>
			<p>
				<input type="reset" />
				<input type="submit"  id="submit" />
			</p>
		</form>
		
		<p id="tooltip" class="hide_tooltip">placeholder text</p>
		
		<script type = "text/javascript"  src = "inc/q5r.js" >
		</script>
	
	</body>
</html>
