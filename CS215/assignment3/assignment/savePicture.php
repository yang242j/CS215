<?php

$target_dir = "Uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
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
if (file_exists($target_file)) {
	echo "Sorry, file already exists.";
	$uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
	echo "Sorry, your file is too large.";
	$uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
} else {
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

		echo "<table border>
		<tr>
		<td rowspan='1'>
		<img src='$target_file' width='130' height='130'/>
		</td>

		</table>";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
	}
	

?>
<!DOCTYPE html>
<html>
<head>
<title>Save Picture Page</title>

<style>
.err_msg{ color:red;}
</style>

</head>

<body>

<h1>Sign Up Page</h1>
<form action="savePicture.php" id="savePicture" method="post" enctype="multipart/form-data">
<table>

<tr><td></td><td><label id="photo_msg" class="err_msg"></label></td></tr>
<tr><td>Photo: </td><td> <input type="file"  name="fileToUpload" id="fileToUpload"></td></tr>


</table><br />
<input type="submit" value="savePicture" />
<input type="reset" value="Reset" />
</form>



</body>
</html>
