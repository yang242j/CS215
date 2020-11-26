<?php
$validate = true;
$error = "";

$email = "";
$name = "";
$date = "yyyy-mm-dd";

	//img file check and upload
	$target_dir = "../uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));	

$reg_Email = "/^\w+@[a-zA-Z0-9_-]+?\.[a-zA-Z0-9_-]{2,3}$/";
$reg_Name = "/^[a-zA-Z0-9]+$/";
$reg_Date = "/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/";
$reg_Pswd = "/^(\S*)?\d+(\S*)?$/";
$reg_Space = "/^\S{2,}$/";

echo "<p>0</p>";
if (isset($_POST["submitted"]) && $_POST["submitted"])
{
	echo "<p>1</p>";
    $email = trim($_POST["email"]);
    $name = trim($_POST["name"]);
    $date = trim($_POST["date"]);
    $password = trim($_POST["password"]);
    $passwordR = trim($_POST["passwordR"]);

    //connecting to database
    $db = new mysqli("localhost", "yang242j", "yjk1996", "yang242j");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
        echo "<p>2</p>";
    }
    
    $q1 = "SELECT * FROM Users WHERE email = '$email'";
    $r1 = $db->query($q1);

    // if the email address is already taken.
    if($r1->num_rows > 0)
    {
        $validate = false;
        echo "<p>3</p>";
    }
    else
    {
    	
        // check email validation
    	$emailMatch = preg_match($reg_Email, $email);
        if($email == null || $email == "" || $emailMatch == false)
        {
            $validate = false;
            echo "<p>4.1</p>";
        }
        // check name validation
        $nameMatch = preg_match($reg_Name, $name);
        if($name == null || $name == "" || $nameMatch == false)
        {
        	$validate = false;
        	echo "<p>4.2</p>";
        }
        // check date validation
        $bdayMatch = preg_match($reg_Date, $date);
        if($date == null || $date == "" || $bdayMatch == false)
        {
        	$validate = false;
        	echo "<p>4.3</p>";
        }
        //check password validation
        $pswdLen = strlen($password);
        $pswdMatch = preg_match($reg_Pswd, $password);
        if($password == null || $password == "" || $pswdLen< 8 || $pswdMatch == false)
        {
            $validate = false;
            echo "<p>4.4</p>";
        }
        // check confirm password validation

        if($passwordR == null || $passwordR == "" || $passwordR != $password )
        {
        	$validate = false;
        	echo "<p>4.5</p>";
        }
    }
    
	// ---------------------------------------------------------------------------------------------------
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
    
    // Check if file already exists
    if (file_exists($target_file))
    {
    	echo "Sorry, file already exists.";
    	$uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000)
    {
    	echo "Sorry, your file is too large.";
    	$uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
    {
    	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    	$uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0)
    {
    	echo "Sorry, your file was not uploaded.";
    	// if everything is ok, try to upload file
    }
    else
    {
    	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
    	{
    		echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    	}
    	else
    	{
    		echo "Sorry, there was an error uploading your file.";
    	}
    }
    // ---------------------------------------------------------------------------------------------------
    
    if($validate == true)
    {
        $dateFormat = date("Y-m-d", strtotime($date));
		
        //add code here to insert a record into the table User;
        // table User attributes are: email, password, DOB
        // variables in the form are: email, password, dateFormat,
        // start with $q2 =
        
        $q2 = "INSERT INTO Users (email, screen_name, birthday, avatar, password) VALUES ('$email', '$name', '$dateFormat', '$target_file', '$password');";
        $r2 = $db->query($q2);
        echo "<p>5</p>";
        if ($r2 === true)
        {
            header("Location: ../mainpage.php");
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/external.css">
	<script type="text/javascript" src="../js/signup.js"></script>
</head>

<body class="SUbody">

	<h1 class="SUh1">Sign Up Page</h1>
	<article class="SUarticle">
		<b>
			<a>Please fill in this form to create an account.</a>
		</b>
		<hr>
		<form id="SignUp" action="signup.php" method="POST" enctype="multipart/form-data">
			
			<!------------------------------------Email---------------------------------------------------------->
			<label for="email"><b>Email</b></label>
			<input class="SUinput" type="text" placeholder="Enter Email" name="email" id="email">

			<label id="email_msg" class="err_msg"></label><br>
			<!--------------------------------------Name-------------------------------------------------------->
			<label for="name"><b>Name</b></label>
			<input class="SUinput" type="text" placeholder="Enter a Screen Name" name="name" id="name">

			<label id="name_msg" class="err_msg"></label><br>
			<!-------------------------------------Birthday--------------------------------------------------------->
			<label for="date"><b>Date of Birth</b></label>
			<input class="SUinput" type="date" placeholder="YYYY-MM-DD" name="date" id="date">

			<label id="birthday_msg" class="err_msg"></label><br>
			<!-------------------------------------Space--------------------------------------------------------->
			<br>
			<br>
			<!-----------------------------------Image----------------------------------------------------------->
			<label for="image"><b>Avatar Image</b></label>
			<input class="SUinput" type='file' name="fileToUpload" id="fileToUpload">
			<!------------------------------------Space---------------------------------------------------------->
			<br>
			<br>
			<!--------------------------------------Password-------------------------------------------------------->
			<label for="pwd"><b>Password</b></label>
			<input class="SUinput" type="password" placeholder="Enter Password" name="password" id="pwd">

			<label id="pwd_msg" class="err_msg"></label><br>
			<!----------------------------------Repeat Password------------------------------------------------------------>
			<label for="pswr"><b>Repeat Password</b></label>
			<input class="SUinput" type="password" placeholder="Repeat Password" name="passwordR" id="pwdr">

			<label id="pwdr_msg" class="err_msg"></label><br>
			<!---------------------------------------BOX------------------------------------------------------->
			<input class="SUinput" type="checkbox" checked="checked" name="remember" style="margin-bottom:15px">
			<b>Remember me</b><br>
			<!-- --------------------------------------HomePage---------------------------------------------------------- -->
			<a href="../mainpage.php">Click to Homepage</a>
			<input type="hidden" name="submitted" value="1"/>
			<!---------------------------------------Submit or Cancel------------------------------------------------------->
			<div class="clearfix">
				<input class="signupbtn" type="submit" value="Sign Up">
				<input class="cancelbtn" type="reset" value="Cancel">
			</div>
			<!---------------------------------------------------------------------------------------------->
		</form>
		<script type="text/javascript" src="../js/signup-r.js"></script>
	</article>
</body>

</html>