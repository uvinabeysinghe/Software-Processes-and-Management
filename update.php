<?php 
/*
 * File Name: update.php
 * Author: Daniel Hu
 * File Created; 2019-05-05
 * Purpose: To allow the members to update their data.
 */
session_start();
if(!$_SESSION['uid']) {
    header("location:./login.php");
}

include "auth.php";

$uid = $_SESSION['uid'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * 
		FROM spm_customer_information 
		WHERE customer_id = '$uid'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	$name = $row['name'];
	$addr = $row['home_address'];
	$phone = $row['phone_no'];
	$email = $row['email'];
}

include "function.php";
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styles/style.css">
	</head>
	<body>
		<form id='logout' action='function.php' method='post' accept-charset='UTF-8'>
			<input type='submit' name='logout' value='logout' />
		</form>

		<form id='update' action='update.php' method='post' accept-charset='UTF-8'>
			<fieldset>
				<legend>Update Details</legend>
					<input type='hidden' name='update' id='update' value='1'/>
					<label for='name' >Your Full Name*: </label>
					<input type='text' name='name' id='name' maxlength="50" value="<?php echo $name ?>"/><br>
					<label for='addr' >Home Address*: </label>
					<input type='text' name='addr' id='addr' maxlength="50" value="<?php echo $addr; ?>"/><br>
					<label for='phone' >Your Phone*: </label>
					<input type='text' name='phone' id='phone' maxlength="50" value="<?php echo $phone; ?>"/><br>
					<p>Your Email: <?php echo $email; ?></p>
					<p>(Email Cannot be changed)</p>
					
					<input type='submit' name='Update' value='Update' />
			</fieldset>
		</form>
		<button onclick="location.href = './change_pwd.php';" id="change_pwd">Change Password</button>
		<button onclick="location.href = './view_booking.php';" id="view_booking">Back to Main Page</button>
	</body>
</html>