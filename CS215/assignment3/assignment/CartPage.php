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
<li><a href="Home.php">Home</a></li>

<li><a href="ProfilePage.php">Profile Page</a></li>



<li><a href="ProductsPage.php">Products Page</a></li>





<li><a href="RegistrationPage.php">Register</a></li>
<li> <a><input type = "text" placeholder= "Find something!"  maxlength="20" id="search"> </a></li>

<li><a><input type="submit" value ="Go!"></a></li>
</ul>
</section>
<h1><span style="color:red">Cart</span></h1>
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
    	$sql = "SELECT products, quantity, price from Cart where email='$_SESSION[email]' ";
    	$result = $db-> query($sql);
    	$subtotal = 0;
    	$GST = 0;
    	$PST = 0;
    	$Total = 0;
    	echo "<table>
				<tr>
				<th>Product name</th>
				<th>Quantity</th>
				<th>Price</th>
				</tr>";
				
    	while ($row = $result-> fetch_assoc())
    	{
    		echo "
				<tr>
		<th>".$row["products"]."</th>
		<th>".$row["quantity"]."</th>
		<th>".$row["price"]."</th>
		</tr>
		";
    		$subtotal = $subtotal + $row[price];
    	}
    	$GST = $subtotal * 0.05;
    	$PST = $subtotal * 0.06;
    	$Total = $subtotal * 1.11;
    	echo "</table>";
    	echo "<table>
        <tr>
        <th>Subtotal</th>
    	<th>$subtotal</th>
    	</tr>
    	<tr>
        <th>GST</th>
    	<th>$GST</th>
    	</tr>
    	<tr>
        <th>PST SK</th>
    	<th>$PST</th>
    	</tr>
    	<tr>
        <th>Total</th>
    	<th>$Total</th>
    	</tr>
    	</table>";
    }
    
    else
    {
    	echo "<H3>Please Login or Sign up</h3>";
    	echo "<a href='storeLogin.php'>Login</a> <a href='RegistrationPage.php'>Signup</a>";
    
    }

?>




<footer>
<p><a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fwww2.cs.uregina.ca%2F%7Eli787%2Fassignment%2FCartPage.html">
Validate HTML5</a></p>

</footer>

</body>
</html>