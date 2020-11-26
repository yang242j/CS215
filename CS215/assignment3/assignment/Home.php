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


      <li><a href="ProfilePage.php">Profile Page</a></li>

      <li><a href="ProductsPage.php">Products Page</a></li>

      <li><a href="CartPage.php">Cart Page</a></li>


      <li><a href="RegistrationPage.php">Register</a></li>
      <li> <a><input type = "text" placeholder= "Find something!"  maxlength="20" id="search"> </a></li>
      
      <li><a><input type="submit" value ="Go!"></a></li>
    </ul>
    </section>


<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

  
  <article>
    <h1>PUBG = Playerunknown's Battleground</h1>
    <p>PUBG is a popular game which is created by Bluehole company. If you want to play this game, you can download it in STEAM.</p>
    <p>In here, you can find anything you would see in PUBG. Enjoy your shopping!!</p>
    
  
<section id="Rifle">
<h2>Rifle</h2>
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
    		echo "<form action= Home.php method = 'post' >
      <input type='hidden' name='$row[Name]' value='1'/>
              		<input type = 'number'  min = '1' max='99' placeholder= 'Enter the quantity..' name = 'quantity' >
<input type='submit' value ='Add to Cart!'></form>";

    		echo "<button id='nothing'></button>";
    	
    	}

    	
 

?>
</section>
<section id="Sniper Rifle">
<h2>Sniper Rifle</h2>
<?php

    
    $sql = "SELECT Name, Quantity, Price, Description, Image from Sniper_Rifle ";
    $result = $db-> query($sql);
    

    	while ($row = $result-> fetch_assoc())
    	{
    		echo "<h1>".$row["Name"]."</h1>";
    		echo "<p><img src= ".$row["Image"]." style='float:left' width = '240' height = '240'>".$row["Description"]."</p>";
    		echo "<p>Price: $".$row["Price"]."</p>";
    		echo "<form action= Home.php method = 'post' >
      <input type='hidden' name='$row[Name]' value='1'/>
              		<input type = 'number'  min = '1' max='99' placeholder= 'Enter the quantity..' name = 'quantity' >
<input type='submit' value ='Add to Cart!'></form>";
    		echo "<button id='nothing'></button>";
    	
    	}

    	
 

?>
</section>
<section id="Submachine Gun">
<h2>Submachine Gun</h2>
<?php
 
    
    $sql = "SELECT Name, Quantity, Price, Description, Image from Submachine_Gun ";
    $result = $db-> query($sql);
    

    	while ($row = $result-> fetch_assoc())
    	{
    		echo "<h1>".$row["Name"]."</h1>";
    		echo "<p><img src= ".$row["Image"]." style='float:left'>".$row["Description"]."</p>";
    		echo "<p>Price: $".$row["Price"]."</p>";
    		echo "<form action= Home.php method = 'post' >
      <input type='hidden' name='$row[Name]' value='1'/>
              		<input type = 'number'  min = '1' max='99' placeholder= 'Enter the quantity..' name = 'quantity' >
<input type='submit' value ='Add to Cart!'></form>";
    		echo "<button id='nothing'></button>";
    	}

    	
?>
</section>
<section id="Handgun">
<h2>Handgun</h2>
<?php

    $sql = "SELECT Name, Quantity, Price, Description, Image from Handgun ";
    $result = $db-> query($sql);
    

    	while ($row = $result-> fetch_assoc())
    	{
    		echo "<h1>".$row["Name"]."</h1>";
    		echo "<p><img src= ".$row["Image"]." style='float:left'>".$row["Description"]."</p>";
    		echo "<p>Price: $".$row["Price"]."</p>";
    		echo "<form action= Home.php method = 'post' >
      <input type='hidden' name='$row[Name]' value='1'/>
              		<input type = 'number'  min = '1' max='99' placeholder= 'Enter the quantity..' name = 'quantity' >
<input type='submit' value ='Add to Cart!'></form>";
    		echo "<button id='nothing'></button>";
    	}

    	
 
$db-> close();
?>



<?php 
if (isset($_POST["Scar-L"]) && $_POST["Scar-L"])
{

$quantity = $_POST["quantity"];
	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$cart = "INSERT INTO Cart (email, products, quantity, price)
	VALUES ('$_SESSION[email]','Scar-L', '$quantity', '$quantity' * '900')
	";

	if ($conn->query($cart) === TRUE ) {
		echo "this product added to cart successfully";

	} else {
		echo "Error: " . $conn->error;
	}
}if (isset($_POST["M16A4"]) && $_POST["M16A4"])
{
	$quantity = $_POST["quantity"];
	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$cart = "INSERT INTO Cart (email, products, quantity, price)
	VALUES ('$_SESSION[email]','M16A4', '$quantity', '$quantity' * '700')
	";
	
	if ($conn->query($cart) === TRUE ) {
	echo "this product added to cart successfully";
	
	} else {
	echo "Error: " . $conn->error;
	}
}if (isset($_POST["AUG"]) && $_POST["AUG"])
{
	$quantity = $_POST["quantity"];
	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$cart = "INSERT INTO Cart (email, products, quantity, price)
	VALUES ('$_SESSION[email]','AUG', '$quantity', '$quantity' * '1100')
	";
	
	if ($conn->query($cart) === TRUE ) {
	echo "this product added to cart successfully";
	
	} else {
	echo "Error: " . $conn->error;
	}
}if (isset($_POST["QBZ-95"]) && $_POST["QBZ-95"])
{
	$quantity = $_POST["quantity"];
	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$cart = "INSERT INTO Cart (email, products, quantity, price)
	VALUES ('$_SESSION[email]','QBZ-95', '$quantity', '$quantity' * '900')
	";
	
	if ($conn->query($cart) === TRUE ) {
	echo "this product added to cart successfully";
	
	} else {
	echo "Error: " . $conn->error;
	}
}if (isset($_POST["Groza"]) && $_POST["Groza"])
{
	$quantity = $_POST["quantity"];
	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$cart = "INSERT INTO Cart (email, products, quantity, price)
	VALUES ('$_SESSION[email]','Groza', '$quantity', '$quantity' * '1100')
	";
	
	if ($conn->query($cart) === TRUE ) {
	echo "this product added to cart successfully";
	
	} else {
	echo "Error: " . $conn->error;
	}
}
if (isset($_POST["AWM"]) && $_POST["AWM"])
{
	$quantity = $_POST["quantity"];
	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$cart = "INSERT INTO Cart (email, products, quantity, price)
	VALUES ('$_SESSION[email]','AWM', '$quantity', '$quantity' * '2500')
	";
	
	if ($conn->query($cart) === TRUE ) {
	echo "this product added to cart successfully";
	
	} else {
	echo "Error: " . $conn->error;
	}
}
if (isset($_POST["VSS"]) && $_POST["VSS"])
{
	$quantity = $_POST["quantity"];
	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$cart = "INSERT INTO Cart (email, products, quantity, price)
	VALUES ('$_SESSION[email]','VSS', '$quantity', '$quantity' * '1250')
	";
	
	if ($conn->query($cart) === TRUE ) {
	echo "this product added to cart successfully";
	
	} else {
	echo "Error: " . $conn->error;
	}
}if (isset($_POST["Mini14"]) && $_POST["Mini14"])
{
	$quantity = $_POST["quantity"];
	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$cart = "INSERT INTO Cart (email, products, quantity, price)
	VALUES ('$_SESSION[email]','Mini14', '$quantity', '$quantity' * '1600')
	";
	
	if ($conn->query($cart) === TRUE ) {
	echo "this product added to cart successfully";
	
	} else {
	echo "Error: " . $conn->error;
	}
}if (isset($_POST["Tommy Gun"]) && $_POST["Tommy Gun"])
{
	$quantity = $_POST["quantity"];
	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$cart = "INSERT INTO Cart (email, products, quantity, price)
	VALUES ('$_SESSION[email]','Tommy Gun', '$quantity', '$quantity' * '600')
	";
	
	if ($conn->query($cart) === TRUE ) {
	echo "this product added to cart successfully";
	
	} else {
	echo "Error: " . $conn->error;
	}
}if (isset($_POST["Micro UZI"]) && $_POST["Micro UZI"])
{
	$quantity = $_POST["quantity"];
	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$cart = "INSERT INTO Cart (email, products, quantity, price)
	VALUES ('$_SESSION[email]','Micro UZI', '$quantity', '$quantity' * '500')
	";
	
	if ($conn->query($cart) === TRUE ) {
	echo "this product added to cart successfully";
	
	} else {
	echo "Error: " . $conn->error;
	}
}if (isset($_POST["Vector"]) && $_POST["Vector"])
{
	$quantity = $_POST["quantity"];
	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$cart = "INSERT INTO Cart (email, products, quantity, price)
	VALUES ('$_SESSION[email]','Vector', '$quantity', '$quantity' * '650')
	";
	
	if ($conn->query($cart) === TRUE ) {
	echo "this product added to cart successfully";
	
	} else {
	echo "Error: " . $conn->error;
	}
}if (isset($_POST["P1911"]) && $_POST["P1911"])
{
	$quantity = $_POST["quantity"];
	$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$cart = "INSERT INTO Cart (email, products, quantity, price)
	VALUES ('$_SESSION[email]','P1911', '$quantity', '$quantity' * '300')
	";
	
	if ($conn->query($cart) === TRUE ) {
	echo "this product added to cart successfully";
	
	} else {
	echo "Error: " . $conn->error;
	}
}

?>
</section>
  </article>


<footer>
<p><a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fwww2.cs.uregina.ca%2F%7Eli787%2Fassignment%2FHome.html">
  Validate HTML5</a></p>


</footer>

</body>
</html>