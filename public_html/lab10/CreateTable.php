<?php
/// Create connection
$conn = new mysqli("localhost", "yang242j", "yjk1996", "yang242j");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE User_lab (
user_id INT NOT NULL AUTO_INCREMENT,
email VARCHAR(255) NOT NULL,
password VARCHAR(30) NOT NULL,
DOB DATE NOT NULL,
PRIMARY KEY (user_id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table User created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
 