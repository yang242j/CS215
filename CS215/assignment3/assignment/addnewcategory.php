<?php

if (isset($_POST["submitted"]) && $_POST["submitted"])
{
	$addCate = $_POST["EnterCate"];
/// Create connection
$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE $addCate (
		ID INT NOT NULL AUTO_INCREMENT,
Name VARCHAR(255) NOT NULL,
Quantity INT NOT NULL,
Price INT NOT NULL,
Description VARCHAR(255) NOT NULL,
Image VARCHAR(255) NOT NULL,
PRIMARY KEY (ID)

)";

if ($conn->query($sql) === TRUE) {
    echo "Table '$addCate' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
}
?>

<?php

if (isset($_POST["submitted1"]) && $_POST["submitted1"])
{
	$removeCate = $_POST["removeCate"];
/// Create connection
$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "DROP TABLE $removeCate";

if ($conn->query($sql) === TRUE) {
    echo "Table '$removeCate' removed successfully";
} else {
    echo "Error remove table: " . $conn->error;
}

$conn->close();
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
 <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
<h1 class="center">Menus and Categories</h1>
<p></p>
   <table style="width:100%">
  <tr>
    <th>Rifle</th>
    <th>Sniper Rifle</th> 
    <th>Submachine Gun</th>
    <th>Handgun</th>
  </tr>
  <tr>
    <td>Scar-L</td>
    <td>AWM</td>
    <td>Thomson</td>
    <td>P1911</td>

  </tr>
  <tr>
    <td>M16A4</td>
    <td>VSS</td>
    <td>UZI</td>
  </tr>
  <tr>
    <td>AUG</td>
    <td>Mini14</td>
    <td>Vector</td>

  </tr>
  <tr>
    <td>QBZ-95</td>

  </tr>
  <tr>
  <td>Groza</td>
  </tr>
  <tr>
  <td><a><button id="RemoveRifle">Remove</button></a></td>
  <td><a><button id="RemoveSniperR">Remove</button></a></td>
  <td><a><button id="RemoveSub">Remove</button></a></td>
  <td><a><button id="RemoveHandgun">Remove</button></a></td>
  </tr>
</table>
<script>document.getElementById("RemoveRifle").addEventListener("click", RemoveCate);</script>
<script>document.getElementById("RemoveSniperR").addEventListener("click", RemoveCate);</script>
<script>document.getElementById("RemoveSub").addEventListener("click", RemoveCate);</script>
<script>document.getElementById("RemoveHandgun").addEventListener("click", RemoveCate);</script>
    </div>
AdministratorPage.html
    <div class="container">
      <label for="Cata"><b>Categories</b></label>
      <p></p>
      <form action = "addnewcategory.php" method="post">
      <input type="hidden" name="submitted" value="1"/>
      <label id="EnterCate_msg" class="err_msg"></label>
      <input type="text" placeholder="Add Category" name="EnterCate" required>
      <input type="submit" name="addnewcategory"value="Add New Category"/>
      </form>
      
      
      <form action = "addnewcategory.php" method="post">
      <input type="hidden" name="submitted1" value="1"/>
      <input type="text" placeholder="Remove Category" name="removeCate" required>
      <input type="submit" name="removecategory"value="Remove A Category"/>
      </form>
              <button type="button" value="SaveCate" onclick="AddCateForm()">Save</button>

    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
 
    </div>

</body>
</html>
 
