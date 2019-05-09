<?php
require("./class.phpmailer.php");

function send_config() {
	include "auth.php";
	$from = $gmail;
	$from_name = "Dynamic Devs";
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 2;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
	$mail->SMTPAutoTLS = false;
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->Username = $gmail;
	$mail->Password = $gpwd;
	$mail->SetFrom($from, $from_name);
	return $mail;
}

function send_confirm($option, $email, $code) {
	$mail = send_config();
	if ($option == "register") {
		$subject = "Register Mail";
		$body = "Hi, this is the register confirmation email sent by the Health Care Professional Service Website. Please press this URL: https://booking.hyhu.me/send_confirmation.php?email=".$email."&code=".$code." to complete your registration.";	
	} else if ($option == "forgot") {
		$subject = "Set New Password";
		$body = "Hi, this is the email sent by the Health Care Professional Service Website for you to setup a new password for your account. Please press this URL: https://booking.hyhu.me/change_pwd.php?email=".$email."&code=".$code." to change your password.";
	}
	
	$to = $email;

	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
    	$error = 'Mail error: '.$mail->ErrorInfo;
	}
}

function send_new_app($option, $my_email, $my_name, $opp_name, $date, $time, $message) {
	$mail = send_config();
	$subject = "New Appointment Mail";
	if ($option == "customer") {
		$body = "Hi ".$my_name.", this is an email sent by the Health Care Professional Service Website to inform you about the new appointment.
			On ".$date.", ".$time.", you have an appointment with Mr. ".$opp_name.". You left a message saying: ".$message;
	} else if ($option == "professional") {
		$body = "Hi ".$my_name.", this is an email sent by the Health Care Professional Service Website to inform you about the new appointment.
			On ".$date.", ".$time.", you have an appointment with Mr. ".$opp_name.". He left a message saying: ".$message;
	}
	$to = $my_email;

	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
    	$error = 'Mail error: '.$mail->ErrorInfo;
	}
}

