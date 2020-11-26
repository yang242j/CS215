<?php

if (isset($_POST["submitted"]) && $_POST["submitted"])
{
	
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

			$cate = $_POST["cate"];
			$name = $_POST["name"];
			$price = $_POST["price"];
			$quantity = $_POST["quantity"];
			$description = $_POST["description"];
			/// Create connection
			$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			
			// sql to create table
			
			$sql = "INSERT INTO $cate (Name, Quantity, Price, Description, Image)
			VALUES ('$name', '$quantity', '$price', '$description', '$target_file')
			";
			
			if ($conn->query($sql) === TRUE ) {
				echo "Product '$name' added to '$cate' successfully";
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
			echo "Error: " . $conn->error;
				}
				}
				else{
				echo "Error";
}
			
			$conn->close();
		}

		
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
<form class="modal-content animate" action="newProduct.php" id="AddProduct" method="post" enctype="multipart/form-data">
<input type="hidden" name="submitted" value="1"/>
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.jpg" alt="Avatar" class="avatar">
    </div>

<h1> New Products </h1>


	<h3>Category</h3><label id="cate_msg" class="err_msg"></label>
  <input type="text" name="cate" placeholder="which category you want to add?"size="30" />
	<h3>Title</h3><label id="title_msg" class="err_msg"></label>
  <input type="text" name="name" placeholder="no leading or trailing spaces"size="30" />
 	
    <h3>Price:</h3><label id="price_msg" class="err_msg"></label>
<input type="text" name="price" placeholder="proper price formation 00.00" size="30" />
 	
    <h3>Quantity:</h3><label id="quantity_msg" class="err_msg"></label>
<input type="text" name="quantity" placeholder="can’t be 0 or more than 99" size="30" />
 	
 	<h3>Description:</h3><label id="description_msg" class="err_msg"></label>
<input type="text" name="description" placeholder="non-blank; more than 150 characters/show a character counter" size="150" />
 	
    <h3>Image:</h3><label id="Image_msg" class="err_msg"></label>
<input type="file"  name="fileToUpload" id="fileToUpload">
 	
 


<br />
<h5><input type="submit" name="submit" value="Add!!!" /></h5>

<script>document.getElementById("AddProduct").addEventListener("submit", NewProductForm, false);</script>




    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>

    </div>
  </form>
</body>
</html>