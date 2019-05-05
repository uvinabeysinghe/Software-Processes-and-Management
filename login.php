<?php 
/*
 * File Name: login.php
 * Author: Daniel Hu
 * File Created; 2019-05-05
 * Purpose: To allow the members to log into the system.
 */

include "auth.php";

$wrong_login = "";

if(isset($_POST['submitted'])) {
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbName);

	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 

	$email = $_POST['email'];
	$pwd = md5($_POST['pwd']);

	$sql = "SELECT * FROM spm_customer_information WHERE email = '$email' AND password = '$pwd'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		session_start();
		while($row = $result->fetch_assoc()) {
			$_SESSION["uid"] = $row["customer_id"];
		}
		echo "<script type='text/javascript'>location.href = './view_booking.php';</script>";
    	exit;
	} else {
		$wrong_login = "Wrong email or password";
	}

	$conn->close();
}
?>

<html>
	<body>
		<form id='login' action='login.php' method='post' accept-charset='UTF-8'>
			<fieldset>
				<legend>Login</legend>
					<input type='hidden' name='submitted' id='submitted' value='1'/>
					<label for='email' >Email: </label>
					<input type='text' name='email' id='email' maxlength="50" /><br>
					<label for='pwd' >Password: </label>
					<input type='password' name='pwd' id='pwd' maxlength="50" /><br>

					<p><?php echo $wrong_login; ?></p>
					<input type='submit' name='Submit' value='Submit' />
			</fieldset>
		</form>
	</body>
</html>