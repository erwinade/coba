<?php
$servername 	= "127.0.0.1";
$username 	    = "root";
$password 	    = "";
$db		        = "soendev";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>
