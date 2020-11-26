<?php
	session_start();
		  
	//If nobody is logged in, display login and signup page.
	if(isset($_SESSION["email"]))
	{
		$email = trim($_POST["email"]);
		$password = trim($_POST["password"]);
		
		$db = new mysqli("localhost", "li787", "lQ096-", "li787");
		if ($db->connect_error)
		{
			die ("Connection failed: " . $db->connect_error);
		}
	  	//If somebody is logged in, display a welcome message
		echo "Welcome, logged in as:  " .$_SESSION['email']. "<br />" ;	
              echo "<a href='Logout.php'>Logout</a>";
	}

	else
	{	
		echo "<H3>Please Login or Sign up</h3>";
		echo "<a href='storeLogin.php'>Login</a> <a href='RegistrationPage.php'>Signup</a>";	
				
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
<header>
<h1><img src="PUBGlogo.jpg" alt="logo" style = "float:left" width = "184" height = "86" /></h1>
<h1 class = "titlecenter">Mini PUBG Store</h1>

</header>

<section>

    <ul>
           <li><a href="HomeA.php">Home</a></li>

      <li><a href="AdministratorPage.html">Administrator Page</a></li>
      <li><a href="ProductsPageA.php">Products Page</a></li>
      <li><a href="CartPageA.php">Cart Page</a></li>


      <li><a href="RegistrationPage.php">Register</a></li>

      <li> <a><input type = "text" placeholder= "Find something!"  maxlength="20" id="search"> </a></li>
      
      <li><a><input type="submit" value ="Go!"></a></li>
    </ul>
    </section>

  
  <article>

  <div class="informationcenter">
    <h1><span style="color:red">Personal</span> Information:</h1>
    <?php
    
    session_start();
    
    //If nobody is logged in, display login and signup page.
    if(isset($_SESSION["email"]))
    {
    	$email = trim($_POST["email"]);
    	$password = trim($_POST["password"]);
    
    	$db = new mysqli("localhost", "li787", "lQ096-", "li787");
    	if ($db->connect_error)
    	{
    		die ("Connection failed: " . $db->connect_error);
    	}
    	//If somebody is logged in, display a welcome message
;
    	$sql = "SELECT email, password, firstname, lastname, DOB from Users where email='$_SESSION[email]' ";
    	$result = $db-> query($sql);
    	
    	
    	while ($row = $result-> fetch_assoc())
    	{
    		echo "<p>Email address: ".$row["email"]."</p>";
    		echo "<p>Password: ".$row["password"]."</p>";
    		echo "<p>First name: ".$row["firstname"]."</p>";
    		echo "<p>Last Name: ".$row["lastname"]."</p>";
    		echo "<p>Date of Birth: ".$row["DOB"]."</p>";
    	}
    }
    
    else
    {
    	echo "<H3>Please Login or Sign up</h3>";
    	echo "<a href='storeLogin.php'>Login</a> <a href='RegistrationPage.php'>Signup</a>";
    
    }

?>
<form>    <p><a href="editInformation.php">Edit</a></p></form>
    
    </div>

     <div class="informationcenter">
    <h1><span style="color:red">Wish</span> List</h1>
    <?php
    
    session_start();
    
    //If nobody is logged in, display login and signup page.
    if(isset($_SESSION["email"]))
    {
    	$email = trim($_POST["email"]);
    	$password = trim($_POST["password"]);
    
    	$db = new mysqli("localhost", "li787", "lQ096-", "li787");
    	if ($db->connect_error)
    	{
    		die ("Connection failed: " . $db->connect_error);
    	}
    	//If somebody is logged in, display a welcome message
;
    	$sql = "SELECT products from Wish where email='$_SESSION[email]' ";
    	$result = $db-> query($sql);
    	
    	
    	while ($row = $result-> fetch_assoc())
    	{
    		echo "<p>".$row["products"]."</p>";

    	}
    }
    
    else
    {
    	echo "<H3>Please Login or Sign up</h3>";
    	echo "<a href='storeLogin.php'>Login</a> <a href='RegistrationPage.php'>Signup</a>";
    
    }

?>
 <form action = 'ProfilePage.php' method='post' enctype='multipart/form-data'>
    		<input type='hidden' name = '123' value='1'/>
    		<?php

if (isset($_POST["123"]) && $_POST["123"])
{
	$removewish = $_POST["removeWish"];
/// Create connection
$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "DELETE FROM Wish Where products = '$removewish'";

if ($conn->query($sql) === TRUE) {
    echo "'$removewish' removed successfully";
    header("Location: ProfilePage.php");
} else {
    echo "Error remove wish: " . $conn->error;
}

$conn->close();
}
?>
<input type="text" placeholder="Remove wish" name="removeWish" required>
   <p><input type='submit' value ='Remove'></p>
   </form>

    </div>
    
     <p></p>
      <p></p>
    
  </article>
<script>document.getElementById("Remove").addEventListener("click", RemoveFromWish);</script>

<footer>
<p><a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fwww2.cs.uregina.ca%2F%7Eli787%2Fassignment%2FProfilePage.html">
  Validate HTML5</a></p>


</footer>

</body>
</html>