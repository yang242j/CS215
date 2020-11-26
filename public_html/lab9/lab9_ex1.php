<!DOCTYPE html>
<html>
<head>
	<title>A Sample Php Program</title>
</head>

<body>

<?php
	echo "<h1>Hello CS215 Students!<h1>";
 	echo "<p>Hi this is a sentence.</p>";
?>

<?php
echo "<p>Hi this is a sentence written using echo ... .</p>";
$colors = array("red","green","blue","yellow");
for ($x=0; $x<4; $x++) {
	
     echo '<p style="color:'.$colors[$x].'" > ';  
	 
	 
	 if ($x%2==0) {
	 	echo "The sentence number is: $x   </p>";
	 } 
	 else {
	 echo "The  sentence  color is: $colors[$x]  </p>";
	 }
	 
}
?> 
</body>
</html>

