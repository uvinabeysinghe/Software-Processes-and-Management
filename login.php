<?php 
/*
 * File Name: login.php
 * Author: Daniel Hu
 * File Created; 2019-05-05
 * Purpose: To allow the members to log into the system.
 */

include "auth.php";

$wrong_login = "";

include "function.php";

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styles/style.css">
	</head>
	<body>
		<form id='login' action='login.php' method='post' accept-charset='UTF-8'>
			<fieldset>
				<legend>Login</legend>
					<input type='hidden' name='login' id='login' value='1'/>
					<label for='email' >Email: </label>
					<input type='text' name='email' id='email' maxlength="50" /><br>
					<label for='pwd' >Password: </label>
					<input type='password' name='pwd' id='pwd' maxlength="50" /><br>

					<p><?php echo $wrong_login; ?></p>
					<input type='submit' name='Submit' value='Submit' />
			</fieldset>
		</form>
		<button onclick="location.href = './register.php';" id="register">New here?</button>
		<button onclick="location.href = './forgot_pwd.php';" id="register">Forgot Password?</button>
	</body>
</html>