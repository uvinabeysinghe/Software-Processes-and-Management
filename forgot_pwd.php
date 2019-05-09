<?php 
/*
 * File Name: forgot_pwd.php
 * Author: Daniel Hu
 * File Created; 2019-05-08
 * Purpose: To let the user create a new password by sending a confirmation email.
 */

include "auth.php";

include "function.php";

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styles/style.css">
	</head>
	<body>
		<form id='login' action='function.php' method='post' accept-charset='UTF-8'>
			<fieldset>
				<legend>Forget Password</legend>
					<input type='hidden' name='forget_pwd' id='forget_pwd' value='1'/>
					<label for='email' >Email: </label>
					<input type='text' name='email' id='email' maxlength="50" /><br>

					<input type='submit' name='Submit' value='Submit' />
			</fieldset>
		</form>
		<button onclick="location.href = './register.php';" id="register">New here?</button>
	</body>
</html>