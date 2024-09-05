<?php
$servername = "localhost"; // or your server
$username = "root"; // or your MySQL username
$password = ""; // or your MySQL password
$dbname = "product_assessment"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
