<?php
$validate = true;
$error = "";
$reg_Email = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
$reg_Pswd = "/^(\S*)?\d+(\S*)?$/";
$reg_first = "/^[a-zA-Z0-9_-]+$/";
$reg_last = "/^[a-zA-Z0-9_-]+$/";
$reg_Bday = "/^\d{1,2}\/\d{1,2}\/\d{4}$/";
$email = "";
$date = "mm/dd/yyyy";


if (isset($_POST["submitted"]) && $_POST["submitted"])
{
    $email = trim($_POST["email"]);
    $date = trim($_POST["birth"]);
    $password = trim($_POST["pswd"]);
    $first = trim($_POST["first"]);
    $last = trim($_POST["last"]);
    $db = new mysqli("localhost", "li787", "lQ096-", "li787");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }
    
    $q1 = "SELECT * FROM Users WHERE email = '$email'";
    $r1 = $db->query($q1);

    // if the email address is already taken.
    if($r1->num_rows > 0)
    {
        $validate = false;
    }
    else
    {
        $emailMatch = preg_match($reg_Email, $email);
        if($email == null || $email == "" || $emailMatch == false)
        {
            $validate = false;
        }
        
              
        $pswdLen = strlen($password);
        $pswdMatch = preg_match($reg_Pswd, $password);
        if($password == null || $password == "" || $pswdLen< 8 || $pswdMatch == false)
        {
            $validate = false;
        }
        
        $firstMatch = preg_match($reg_first, $first);
        if($first == null || $first == "" || $firstMatch == false)
        {
        	$validate = false;
        }
        
        $lastMatch = preg_match($reg_last, $last);
        if($last == null || $last == "" || $lastMatch == false)
        {
        	$validate = false;
        }

        $bdayMatch = preg_match($reg_Bday, $date);
        if($date == null || $date == "" || $bdayMatch == false)
        {
            $validate = false;
        }
    }

    if($validate == true)
    {
        $dateFormat = date("Y-m-d", strtotime($date));
        //add code here to insert a record into the table User;
        // table User attributes are: email, password, DOB
        // variables in the form are: email, password, dateFormat, 
        // start with $q2 =
        $q2 = "INSERT INTO Users (email, password, firstname, lastname, DOB)
VALUES ('$email', '$password', '$first', '$last', '$dateFormat')";
       
        $r2 = $db->query($q2);
        
        if ($r2 === true)
        {
            header("Location: storeLogin.php");
            $db->close();
            exit();
        }
    }
    else
    {
        $error = "email address is not available. Signup failed.";
        $db->close();
    }

}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="homeEX.css" type="text/css" />
<title>Registration Page</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="TotalJS.js"> </script> 
<style type="text/css">

.err_msg
{
	color:red; 
	text-decoration:underline;
	
}
</style>
<style>
.err_msg{ color:red;}
</style>
</head>
<body>
<header>
<h1 class = "titlecenter">Registration Page</h1>
</header>

<form action="RegistrationPage.php" id="Registration"  method="post">
<input type="hidden" name="submitted" value="1"/>
<p><label id="email_msg" class="err_msg"></label>
    Email address:  <input type="text" name="email" placeholder="Enter Email Address:cs215@uregina.ca" size="30" /></P>
<p><label id="first_msg" class="err_msg"></label>
First name:  <input type="text" name="first" placeholder="no leading or trailing spaces" size="30" /></p>
<p><label id="last_msg" class="err_msg"></label>
    Last name:  <input type="text" name="last" placeholder="no leading or trailing spaces" size="30" /> 

<p><label id="pswd_msg" class="err_msg"></label>
Password:  <input type="password" name="pswd" placeholder="8 characters long or more" size="30" />    </p>
<p><label id="pswdr_msg" class="err_msg"></label>
Confirm Password:  <input type="password" name="pswdr" placeholder="Please matches password" size="30" /></p>
<p><label id="birth_msg" class="err_msg"></label>
date of birth:  <input type="text" name="birth" placeholder="mm/dd/yyyy" size="10" /> </p>
<p>Image Profile:  <input type="File" name="image" size="30"/></p>


<p><input type="submit" name="Registration"value="submit"/>
<input type="reset" name="Reset" value="Reset"/></p>
</form>
<footer>
<p><a href = "Home.html">Back to Home page</a>
<i class="fa fa-car"></i><i class="fa fa-car"></i><i class="fa fa-car"></i>
<i class="fa fa-cloud" style="font-size:48px;color:red;"></i><i class="fa fa-cloud" style="font-size:48px;color:lightblue;"></i>
</p>
</footer>

<script>document.getElementById("Registration").addEventListener("submit", RegistrationForm, false);</script>

</body>
</html>