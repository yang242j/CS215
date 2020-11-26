<?php
	session_start();
	if (!isset($_SESSION["user_id"])) {
		header("Location: index.php");
		exit();
	} else {
		$order_id = $_GET["oid"];
		
		// load the database and get the orders for this user
		$db = new mysqli("localhost", "hoeber", "pwd", "hoeber");
	  	if ($db->connect_error) {
	  		die ("Connection failed: " . $db->connect_error);
		}
	
		$q = "SELECT order_id, order_details FROM Orders WHERE order_id = $order_id;";
		$result = $db->query($q);	
	}
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Order Details</title>
		<meta charset = "utf-8" />
		<link rel="stylesheet" type="text/css" href="inc/style.css">
		</link>
	</head>
	<body>
		<h3>Order Detials (<?=$order_id?>)</h3>
<?php
	$row = $result->fetch_assoc()
?>	
	<p class="order">Order ID: <?=$row["order_id"]?><br /><?=$row["order_details"]?></p>
<?php		
	$db->close();
?>		
		<h5><a href="orders.php">return to orders</a></h5>
		<h5><a href="logout.php">logout</a></h5>
	</body>
</html>
