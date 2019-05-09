<?php 
/*
 * File Name: change_pwd.php
 * Author: Daniel Hu
 * File Created; 2019-05-06
 * Purpose: To let the member change their password.
 */
session_start();

if (!$_SESSION['uid'] && !isset($_GET['email'])) {
    header("location:./login.php");
}

include "auth.php";
include "function.php";

if (isset($_GET['email'])) {	
	$conn = connect_db();

	$email = $_GET['email'];
	$code = $_GET['code'];

	$sql = "SELECT customer_id, password 
			FROM spm_customer_information
			WHERE email = '$email'";
	$result = $conn->query($sql);
	$pwd = "default";

	while($row = $result->fetch_assoc()) {
		$pwd = $row['password'];
		$uid = $row['customer_id'];
	}

	if ($code != $pwd) {
		header("location:./login.php");
	}
} else {
	$uid = $_SESSION['uid'];
}
$message = "";
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styles/style.css">
	</head>
	<body>
		<form id='logout' action='function.php' method='post' accept-charset='UTF-8'>
			<input type='submit' name='logout' value='logout' />
		</form>

		<form id='change_pwd' action='change_pwd.php' method='post' accept-charset='UTF-8'>
			<fieldset>
				<legend>Change Password</legend>
					<input type='hidden' name='change_pwd' id='change_pwd' value='1'/>
					<input type='hidden' name='uid' id='uid' value='<?php echo $uid; ?>'>
					<label for='pwd' >New Password: </label>
					<input type='password' name='pwd' id='pwd' maxlength="50"/><br>
					<label for='repwd' >Retype New Password: </label>
					<input type='password' name='repwd' id='repwd' maxlength="50"/><br>
					
					<p><?php echo $message; ?></p>

					<input type='submit' name='Change' value='Change' />
			</fieldset>
		</form>
		<button onclick="location.href = './update.php';" id="update">Back to Update</button>
	</body>
</html>