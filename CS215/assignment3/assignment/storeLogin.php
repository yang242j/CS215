<?php

$validate = true;
$reg_Email = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
$reg_Pswd = "/^(\S*)?\d+(\S*)?$/";
$email = "";
$error = "";

if (isset($_POST["submitted"]) && $_POST["submitted"])
{
    $email = trim($_POST["email"]);
    $password = trim($_POST["pswd"]);
    
    $db = new mysqli("localhost", "li787", "lQ096-", "li787");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }

    //add code here to select * from table User where email = '$email' AND password = '$password'
    // start with $q = 
    $q = "SELECT * FROM Users where email = '$email'AND password = '$password'";
    $r = $db->query($q);
    $row = $r->fetch_assoc();
    

    if($email != $row["email"] && $password != $row["password"])
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
        $passwordMatch = preg_match($reg_Pswd, $password);
        if($password == null || $password == "" || $pswdLen < 8 || $passwordMatch == false)
        {
            $validate = false;
        }
    }
    
    if($validate == true)
    {
if($email == "admin@uregina.ca" && $password == "12345678")
{
        session_start();
        $_SESSION["email"] = $row["email"];
        header("Location: HomeA.php");
        $db->close();
        exit();
    }
    else 
    {
    	session_start();
    	$_SESSION["email"] = $row["email"];
    	header("Location: Home.php");
    	$db->close();
    	exit();
    }
    }
    else 
    {
        $error = "The email/password combination was incorrect. Login failed.";
        $db->close();
    }
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="homeEX.css" type="text/css" />
<title>Login</title>
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

<form class="modal-content animate" action="storeLogin.php" id="SignUp" method="post">
<input type="hidden" name="submitted" value="1"/>
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
 
      <label for="email" id="email_msg" class="err_msg"><b>Email</b></label>
      <input type="text" placeholder="Enter Email Address:cs215@uregina.ca" name="email" >

      <label for="pswd" id="pswd_msg" class="err_msg"><b>Password</b></label>
      <input type="password" placeholder="Enter Password:8 characters or longer, no spaces" name="pswd">
      
        <input type="submit" name="submit" value="Login"/>
        <input type="reset" name="Reset" value="Reset"/>

      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>

    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
<script>document.getElementById("SignUp").addEventListener("submit", SignUpForm, false);</script>
</body>
</html>