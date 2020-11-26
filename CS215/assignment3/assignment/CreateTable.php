<?php
/// Create connection
$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE Users (
		
email VARCHAR(255) NOT NULL,
password VARCHAR(30) NOT NULL,
firstname VARCHAR(255) NOT NULL,
lastname VARCHAR(255) NOT NULL,
DOB DATE NOT NULL

)";

if ($conn->query($sql) === TRUE) {
    echo "Table User created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
 
