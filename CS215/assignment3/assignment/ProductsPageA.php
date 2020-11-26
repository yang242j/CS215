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

<li><a href="ProfilePageA.php">Profile Page</a></li>
      <li><a href="AdministratorPage.html">Administrator Page</a></li>

<li><a href="CartPageA.php">Cart Page</a></li>


<li><a href="RegistrationPage.php">Register</a></li>
<li> <a><input type = "text" placeholder= "Find something!"  maxlength="20" id="search"> </a></li>

<li><a><input type="submit" value ="Go!"></a></li>
</ul>
</section>



<article>


<h1><span style="color:red">Rifles</span> </h1>

<?php
 $db = mysqli_connect("localhost", "li787", "lQ096-", "li787");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }

    
    $sql = "SELECT Name, Quantity, Price, Description, Image from Rifle ";
    $result = $db-> query($sql);
    

    	while ($row = $result-> fetch_assoc())
    	{
    		echo "<h1>".$row["Name"]."</h1>";
    		echo "<p><img src= ".$row["Image"]." style='float:left'>".$row["Description"]."</p>";
    		echo "<p>Price: $".$row["Price"]."</p>";
    		echo "<form> <input type = 'number'  min = '1' max='99' placeholder= 'Enter the quantity..'  >
<input type='submit' value ='Add to Cart!'></form>";
    		echo "<form action = 'ProductsPage.php' method='post' enctype='multipart/form-data'>
    		<input type='hidden' name = '$row[Name]' value='1'/>";
    		
    		
    		echo "<input type='submit' value ='Add to Wish List!'></form>";
    		echo "<button id='nothing'></button>";
    	
    	}

    	
 

?>
<h1><span style="color:red">Sniper Rifle</span> </h1>
<?php

    
    $sql = "SELECT Name, Quantity, Price, Description, Image from Sniper_Rifle ";
    $result = $db-> query($sql);
    

    	while ($row = $result-> fetch_assoc())
    	{
    		echo "<h1>".$row["Name"]."</h1>";
    		echo "<p><img src= ".$row["Image"]." style='float:left' width = '240' height = '240'>".$row["Description"]."</p>";
    		echo "<p>Price: $".$row["Price"]."</p>";
    		echo "<form> <input type = 'number'  min = '1' max='99' placeholder= 'Enter the quantity..'  >
<input type='submit' value ='Add to Cart!'></form>";
    		echo "<form action = 'ProductsPage.php' method='post' enctype='multipart/form-data'>
				<input type='hidden' name = '$row[Name]' value='1'/>";

				
		    echo "<input type='submit' value ='Add to Wish List!'></form>";
    		echo "<button id='nothing'></button>";
    	
    	}

    	
 

?>



<h1><span style="color:red">Submachine Gun</span> </h1>
<?php
 
    
    $sql = "SELECT Name, Quantity, Price, Description, Image from Submachine_Gun ";
    $result = $db-> query($sql);
    

    	while ($row = $result-> fetch_assoc())
    	{
    		echo "<h1>".$row["Name"]."</h1>";
    		echo "<p><img src= ".$row["Image"]." style='float:left'>".$row["Description"]."</p>";
    		echo "<p>Price: $".$row["Price"]."</p>";
    		echo "<form> <input type = 'number'  min = '1' max='99' placeholder= 'Enter the quantity..'  >
<input type='submit' value ='Add to Cart!'></form>";
    		echo "<form action = 'ProductsPage.php' method='post' enctype='multipart/form-data'>
    		<input type='hidden' name = '$row[Name]' value='1'/>";
    		
    		
    		echo "<input type='submit' value ='Add to Wish List!'></form>";
    		echo "<button id='nothing'></button>";
    	
    	}

    	
?>

<h1><span style="color:red">Handgun</span> </h1>
<?php

    $sql = "SELECT Name, Quantity, Price, Description, Image from Handgun ";
    $result = $db-> query($sql);
    

    	while ($row = $result-> fetch_assoc())
    	{
    		echo "<h1>".$row["Name"]."</h1>";
    		echo "<p><img src= ".$row["Image"]." style='float:left'>".$row["Description"]."</p>";
    		echo "<p>Price: $".$row["Price"]."</p>";
    		echo "<form> <input type = 'number'  min = '1' max='99' placeholder= 'Enter the quantity..'  >
<input type='submit' value ='Add to Cart!'></form>";
    		echo "<form action = 'ProductsPage.php' method='post' enctype='multipart/form-data'>
    		<input type='hidden' name = '$row[Name]' value='1'/>";
    		
    		
    		echo "<input type='submit' value ='Add to Wish List!'></form>";
    		echo "<button id='nothing'></button>";
    	
    	}

    	
 
$db-> close();
?>


<?php 
if (isset($_POST["Scar-L"]) && $_POST["Scar-L"])
{


	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$Wish = "INSERT INTO Wish (email, products)
	VALUES ('$_SESSION[email]','Scar-L')
	";

	if ($conn->query($Wish) === TRUE ) {
		echo "this product added to wish list successfully";

	} else {
		echo "Error: " . $conn->error;
	}
}if (isset($_POST["M16A4"]) && $_POST["M16A4"])
{
	
	
	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$Wish = "INSERT INTO Wish (email, products)
	VALUES ('$_SESSION[email]','M16A4')
	";
	 
	if ($conn->query($Wish) === TRUE ) {
		echo "this product added to wish list successfully";

	} else {
		echo "Error: " . $conn->error;
	}
}if (isset($_POST["AUG"]) && $_POST["AUG"])
{
	
	
	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$Wish = "INSERT INTO Wish (email, products)
	VALUES ('$_SESSION[email]','AUG')
	";
	 
	if ($conn->query($Wish) === TRUE ) {
		echo "this product added to wish list successfully";

	} else {
		echo "Error: " . $conn->error;
	}
}if (isset($_POST["QBZ-95"]) && $_POST["QBZ-95"])
{
	
	
	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$Wish = "INSERT INTO Wish (email, products)
	VALUES ('$_SESSION[email]','QBZ-95')
	";
	 
	if ($conn->query($Wish) === TRUE ) {
		echo "this product added to wish list successfully";

	} else {
		echo "Error: " . $conn->error;
	}
}if (isset($_POST["Groza"]) && $_POST["Groza"])
{
	
	
	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$Wish = "INSERT INTO Wish (email, products)
	VALUES ('$_SESSION[email]','Groza')
	";
	 
	if ($conn->query($Wish) === TRUE ) {
		echo "this product added to wish list successfully";

	} else {
		echo "Error: " . $conn->error;
	}
}
if (isset($_POST["AWM"]) && $_POST["AWM"])
{
	
	
	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$Wish = "INSERT INTO Wish (email, products)
	VALUES ('$_SESSION[email]','AWM')
	";
	 
	if ($conn->query($Wish) === TRUE ) {
		echo "this product added to wish list successfully";

	} else {
		echo "Error: " . $conn->error;
	}
}
if (isset($_POST["VSS"]) && $_POST["VSS"])
{


	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$Wish = "INSERT INTO Wish (email, products)
	VALUES ('$_SESSION[email]','VSS')
	";

	if ($conn->query($Wish) === TRUE ) {
		echo "this product added to wish list successfully";

	} else {
		echo "Error: " . $conn->error;
	}
}if (isset($_POST["Mini14"]) && $_POST["Mini14"])
{
	
	
	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$Wish = "INSERT INTO Wish (email, products)
	VALUES ('$_SESSION[email]','Mini14')
	";
	 
	if ($conn->query($Wish) === TRUE ) {
		echo "this product added to wish list successfully";

	} else {
		echo "Error: " . $conn->error;
	}
}if (isset($_POST["Tommy Gun"]) && $_POST["Tommy Gun"])
{
	
	
	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$Wish = "INSERT INTO Wish (email, products)
	VALUES ('$_SESSION[email]','Tommy Gun')
	";
	 
	if ($conn->query($Wish) === TRUE ) {
		echo "this product added to wish list successfully";

	} else {
		echo "Error: " . $conn->error;
	}
}if (isset($_POST["Micro UZI"]) && $_POST["Micro UZI"])
{
	
	
	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$Wish = "INSERT INTO Wish (email, products)
	VALUES ('$_SESSION[email]','Micro UZI')
	";
	 
	if ($conn->query($Wish) === TRUE ) {
		echo "this product added to wish list successfully";

	} else {
		echo "Error: " . $conn->error;
	}
}if (isset($_POST["Vector"]) && $_POST["Vector"])
{
	
	
	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$Wish = "INSERT INTO Wish (email, products)
	VALUES ('$_SESSION[email]','Vector')
	";
	 
	if ($conn->query($Wish) === TRUE ) {
		echo "this product added to wish list successfully";

	} else {
		echo "Error: " . $conn->error;
	}
}if (isset($_POST["P1911"]) && $_POST["P1911"])
{
	
	
	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$Wish = "INSERT INTO Wish (email, products)
	VALUES ('$_SESSION[email]','P1911')
	";
	 
	if ($conn->query($Wish) === TRUE ) {
		echo "this product added to wish list successfully";

	} else {
		echo "Error: " . $conn->error;
	}
}

?>

</article>


<footer>
<p><a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fwww2.cs.uregina.ca%2F%7Eli787%2Fassignment%2FProductsPage.html">
Validate HTML5</a></p>

</footer>

</body>
</html>
