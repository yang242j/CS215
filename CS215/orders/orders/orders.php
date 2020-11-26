<?php
	session_start();
	if (!isset($_SESSION["user_id"])) {
		header("Location: index.php");
		exit();
	} else {
		$user_id = $_SESSION["user_id"];
		$first_name = $_SESSION["first_name"];
		
		// load the database and get the orders for this user
		$db = new mysqli("localhost", "hoeber", "pwd", "hoeber");
	  	if ($db->connect_error) {
	  		die ("Connection failed: " . $db->connect_error);
		}
	
		$q = "SELECT order_id, order_details FROM Orders WHERE user_id = $user_id;";
		$result = $db->query($q);	
	}
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Orders</title>
		<meta charset = "utf-8" />
		<link rel="stylesheet" type="text/css" href="inc/style.css">
		</link>
	</head>
	<body>
		<h3>Orders (<?=$first_name?>)</h3>

		<?php while ($row = $result->fetch_assoc()) { ?> <!--while loop open condition-->
			<p class="order">
				Order ID: 
					<a href="detail.php?oid=<?=$row["order_id"]?>">
						<?=$row["order_id"]?>
					</a>	<br/>
					<?=$row["order_details"]?>
			</p>
		<?php }	$db->close(); ?> <!---while loop close brackt-->

		<h5><a href="logout.php">logout</a></h5>
	</body>
</html>
