<?php
// Database connection
$servername = "localhost:8889";
$username = "root"; 
$password = "root";
$database = "studentsproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>