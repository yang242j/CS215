<?php
$error = "";

// check to see if the form was submitted
if (isset($_POST["submitted"]) && $_POST["submitted"])
	{	
		// get the username and password and check that they aren't empty
	    $email = trim($_POST["email"]);
	    $password = trim($_POST["password"]);
	    
	    if (strlen($email) > 0 && strlen($password) > 0) 
		    {	
		    	// load the database and verify the username/password
			    $db = new mysqli("localhost", "yang242j", "yjk1996", "yang242j");
			    if ($db->connect_error)
			    {
			        die ("Connection failed: " . $db->connect_error);
			        echo "<p>3</p>";
			    }
			    //add code here to select * from table User where email = '$email' AND password = '$password'
			    // start with $q =
			    
			    $q1 = "SELECT user_id, screen_name FROM Users WHERE email = '$email' AND password = '$password';";
			    $r1 = $db->query($q1);
			    
			    if ($row = $r1->fetch_assoc()) 
			    {	
			    	// login successful
			    	session_start();
			    	$_SESSION["user_id"] = $row["user_id"];
			    	$_SESSION["screen_name"] = $row["screen_name"];
			    	header("Location: html/poll_managment.php");
			    	$db->close();
			    	exit();
			    } 
			    else 
			    {	
			    	// login unsuccessful
			    	$error = ("The email/password combination was incorrect.");
			    	$db->close();
			    }
		    } 
	} 
else 
	{
		$error = "";
	}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/login.js"></script>
    <link rel="stylesheet" type="text/css" media="only screen and (min-device-width: 481px)" href="css/external.css">
</head>

<body class="Mbody">
    <header class="Mheader">
        <table>
            <tr>
                <td>
                    <img class="logo" src="img/logo.jpg" alt="logo">
                </td>
                <td>
                    <h1 class="Title">Welcome to J.K. Yang's micro-polling site Mainpage</h1>
                </td>
            </tr>
        </table>
    </header>

    <nav class="nav">
        <ul>
            <li><a id="recient" href="#recient">Recient</a></li>
            <li>||</li>
            <li><a id="login" href="#login">To login</a></li>
            <li>||</li>
            <li><a href="html/signup.php">Sign up</a></li>
            <li>||</li>
            <li><a href="html/votepage.php">Vote Page</a></li>
            <li>||</li>
             <li><a href="img/erd.png">ERD</a></li>
            <li>||</li>
             <li><a href="txt/SQL_statment.txt">my_SQL</a></li>
            <li>||</li>
            <li><a href="html/poll_result.php">Poll Result</a></li>
        </ul>
    </nav>


    <section class="Msection" id="recient">
        <h1>FIVE most recent active polls</h1>
        <article class="Marticle">
            <h2>Activity 1</h2>
            <p>**********************</p>
        </article>
        <article class="Marticle">
            <h2>Activity 2</h2>
            <p>**********************</p>
        </article>
        <article class="Marticle">
            <h2>Activity 3</h2>
            <p>**********************</p>
        </article>
        <article class="Marticle">
            <h2>Activity 4</h2>
            <p>**********************</p>
        </article>
        <article class="Marticle">
            <h2>Activity 5</h2>
            <p>**********************</p>
        </article>
    </section>

    <aside class="Maside" id="login">
    	<h2 class="Mh2">To Login</h2>
    	<p class="error" style="color: red"><?=$error?></p>
        <form id="Login" action="mainpage.php" method="POST">
            <!-----------------------Email----------------------------------------->
            <label for="email"><b>Email</b></label>
            <input class="Minput" type="text" placeholder="Enter Email" name="email" id="email" size="30">

            <label id="email_msg" class="err_msg"></label><br>
            <!--------------------------Password----------------------------------->
            <label for="psw"><b>Password</b></label>
            <input class="Minput" type="password" placeholder="Enter Password" name="password" id="password" size="30">

            <label id="password_msg" class="err_msg"></label><br>
            <!-------------------------Check-box------------------------------------>
            <label>
                <input class="Minput" type="checkbox" checked="checked" name="checkbox" style="margin-bottom:15px">
                Remember me
            </label>
            <!------------------------------------------------------------------- -->
            <input type="hidden" name="submitted" value="1"/>
            <!-------------------------Login---------------------------------------->
            <label>
                <button type="submit" class="Minput" name="login" value="login" id="login">Login</button>
            </label>
            <!-------------------------Login---------------------------------------->
        </form>

        <p>
            Don't have an account yet? <a href="html/signup.php">Sign Up</a><br>
        </p>

        <script type="text/javascript" src="js/login-r.js"></script>
    </aside>

    <footer class="Mfooter">
        <p>© 2018 JK Yang All rights reserved.
            <a class="linkText" href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fwww2.cs.uregina.ca%2F~li787%2F">Validate
                HTML5</a>
        </p>
    </footer>
</body>

</html>