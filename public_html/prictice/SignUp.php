
<?php
//img file check and upload
	$target_dir = "../lecass/uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));	
    
	
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
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="Signup.js"></script>
</head>

<body class="SUbody">

	<h1>Sign Up Page</h1>
	<article>
		<form id="SignUp" action="SignUp.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="submitted" value="1"/>
			<!------------------------------------Email---------------------------------------------------------->
			
			<input type='file' name="fileToUpload" id="fileToUpload">

				<input type="submit" value="Sign Up">		
			<!---------------------------------------------------------------------------------------------->
		</form>
		<img src="../lecass/uploads/<?php echo $_FILES["fileToUpload"]["name"] ;?>" width="130" height="130"/>
	</article>
	<script type="text/javascript" src="SignupR.js"></script>
</body>

</html>