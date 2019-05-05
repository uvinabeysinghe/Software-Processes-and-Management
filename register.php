<?php 
/*
 * File Name: register.php
 * Author: Daniel Hu
 * File Created; 2019-05-05
 * Purpose: To allow the user of the system to create a membership account.
 */

include "auth.php";

$check_email = "";

if(isset($_POST['submitted'])) {
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbName);

	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 

	$name = $_POST['name'];
	$addr = $_POST['addr'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$pwd = md5($_POST['pwd']);

	$sql = "SELECT email FROM spm_customer_information WHERE email = '$email'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$check_email = "This email had already been used.";
	} else {
		$sql = "INSERT INTO spm_customer_information (name, home_address, phone_no, email, password)
	 		VALUES ('$name', '$addr', '$phone', '$email', '$pwd')";

		if ($conn->query($sql) === TRUE) {
    		echo "<script type='text/javascript'>location.href = './register_success.html';</script>";
    		exit;
		} else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	$conn->close();
}
?>


<html>
	<body>
		<form id='register' action='register.php' method='post' accept-charset='UTF-8'>
			<fieldset>
				<legend>Register</legend>
					<input type='hidden' name='submitted' id='submitted' value='1'/>
					<label for='name' >Your Full Name*: </label>
					<input type='text' name='name' id='name' maxlength="50" /><br>
					<label for='addr' >Home Address*: </label>
					<input type='text' name='addr' id='addr' maxlength="50" /><br>
					<label for='phone' >Your Phone*: </label>
					<input type='text' name='phone' id='phone' maxlength="50" /><br>
					<label for='email' >Email Address*:</label>
					<input type='text' name='email' id='email' maxlength="50" /><?php echo $check_email; ?><br>
					<label for='pwd' >Password*:</label>
					<input type='password' name='pwd' id='pwd' maxlength="50" /><br>
					
					<input type='submit' name='Submit' value='Submit' />
			</fieldset>
		</form>
	</body>
</html>