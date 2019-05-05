<?php
include "auth.php";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styles/style.css">
	</head>
	<body>
		<div id="middle">
			<h1>Health Care Professional Booking System</h1><br/>
			<p>Developed by Dynamic Devs</p>
		</div>
	</body>
</html>