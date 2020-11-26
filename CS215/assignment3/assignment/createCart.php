<?php
/// Create connection
$conn = new mysqli("localhost", "li787", "lQ096-", "li787");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE Cart (
				ID INT NOT NULL AUTO_INCREMENT,
email VARCHAR(255) NOT NULL,
products VARCHAR(255) NOT NULL,
price INT NOT NULL,
quantity INT NOT NULL,
PRIMARY KEY (ID)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Cart created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>