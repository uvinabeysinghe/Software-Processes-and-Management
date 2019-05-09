<?php 
/*
 * File Name: register.php
 * Author: Daniel Hu
 * File Created; 2019-05-05
 * Purpose: To allow the user of the system to create a membership account.
 */

include "auth.php";

$check_email = "";

include "function.php";
?>


<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styles/style.css">
	</head>
	<body>
		<form id='register' action='register.php' method='post' accept-charset='UTF-8'>
			<fieldset>
				<legend>Register</legend>
					<input type='hidden' name='register' id='register' value='1'/>
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
		<button onclick="location.href = './index.php';" id="index">Back to Index</button>
	</body>
</html>