<?php 
/*
 * File Name: function.php
 * Author: Daniel Hu
 * File Created; 2019-05-06
 * Purpose: All the membership related functions is here.
 */
include "auth.php";
include "send.php";
session_start();

function connect_db() {
	include "auth.php";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbName);

	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 

	return $conn;
}

/*
 * Purpose: Provide the login function.
 */
if(isset($_POST['login'])) {
	$conn = connect_db();

	$email = $_POST['email'];
	$pwd = md5($_POST['pwd']);

	$sql = "SELECT * 
			FROM spm_customer_information 
			WHERE email = '$email'
				AND password = '$pwd'
					AND active = 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		session_start();
		while($row = $result->fetch_assoc()) {
			$_SESSION["uid"] = $row["customer_id"];
		}
		echo "<script type='text/javascript'>location.href = './view_booking.php';</script>";
    	exit;
	} else {
		$wrong_login = "Wrong email or password or not activated";
	}

	$conn->close();
}

/*
 * Purpose: The simply function of member logout.
 */
if(isset($_POST['logout'])) {
	session_start();
	
	// destroy the session 
	session_destroy(); 

    header("location:./index.php");
}

/*
 * Purpose: To allow the user of the system to create a membership account.
 */
if(isset($_POST['register'])) {
	$conn = connect_db();

	$name = $_POST['name'];
	$addr = $_POST['addr'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	//$pwd = $_POST['pwd'];
	$pwd = md5($_POST['pwd']);

	$sql = "SELECT email
			FROM spm_customer_information
			WHERE email = '$email'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$check_email = "been used.";
	} else {
		$sql = "INSERT INTO spm_customer_information
				(name, home_address, phone_no, email, password)
	 			VALUES ('$name', '$addr', '$phone', '$email', '$pwd')";

	 	send_confirm("register", $email, $pwd);

		if ($conn->query($sql) === TRUE) {
    		echo "<script type='text/javascript'>location.href = './register_success.html';</script>";
    		exit;
		} else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	$conn->close();
}


/*
 * Purpose: To update the member's data.
 */
if(isset($_POST['update'])) {
	$conn = connect_db();

	$uid = $_SESSION['uid'];
	$name = $_POST['name'];
	$addr = $_POST['addr'];
	$phone = $_POST['phone'];

	$sql = "UPDATE spm_customer_information 
			SET name = '$name',
				home_address = '$addr',
				phone_no = '$phone'
			WHERE customer_id = '$uid'";

	if ($conn->query($sql) === TRUE) {
    	echo "<script type='text/javascript'>location.href = './update.php';</script>";
    	exit;
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

/*
 * Let the users change their password.
 */
if(isset($_POST['change_pwd'])) {
	$conn = connect_db();
	
	$uid = $_POST['uid'];
	$pwd = md5($_POST['pwd']);
	$repwd = md5($_POST['repwd']);

	if ($pwd != $repwd) {
		$message = "The 2 passwords you typed does not match";
	} else {
		$sql = "UPDATE spm_customer_information
				SET password = '$pwd'
				WHERE customer_id = '$uid'";
		if ($conn->query($sql) === TRUE) {
    		echo "<script type='text/javascript'>location.href = './update.php';</script>";
    		exit;
		} else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}

/*
 * Let the users change their password.
 */
if(isset($_POST['forget_pwd'])) {
	$conn = connect_db();
	
	$email = $_POST['email'];
	$sql = "SELECT password 
			FROM spm_customer_information
			WHERE email = '$email'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$code = $row['password'];
		}
		send_confirm("forgot", $email, $code);

		echo "<script type='text/javascript'>location.href = './login.php';</script>";
    	exit;
	}
	echo "<script type='text/javascript'>location.href = './login.php';</script>";
	exit;
}

/*
 * Request a new booking appointment & send email
 */
if(isset($_POST['new_req'])) {
	$conn = connect_db();

	$uid = $_SESSION['uid'];
	$pid = $_POST['pid'];
	$date = $_POST['date'];
	$tid = $_POST['time'];
	$message = $_POST['message'];

	$sql = "INSERT INTO spm_appointment_booking
			(hc_prof_id, customer_id, date, time_id,
			 message, status)
			VALUES ($pid, $uid, '$date', $tid,
			'$message', 1)";

	if ($conn->query($sql) === TRUE) {
		$sql = "SELECT *
				FROM spm_time_slot
				WHERE time_id = $tid";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
			$time = $row['from'];
		}
		$sql = "SELECT name, email 
				FROM spm_customer_information
				WHERE customer_id = $uid";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
			$c_name = $row['name'];
			$c_email = $row['email'];
		}
		$sql = "SELECT name, email 
				FROM spm_hc_prof_info
				WHERE hc_prof_id = $pid";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
			$p_name = $row['name'];
			$p_email = $row['email'];
		}
		send_new_app("customer", $c_email, $c_name, $p_name, $date, $time, $message);
		
		send_new_app("professional", $p_email, $p_name, $c_name, $date, $time, $message);
    	echo "<script type='text/javascript'>location.href = './view_booking.php';</script>";
    	exit;
	} 
	//else {
    //	echo "Error: " . $sql . "<br>" . $conn->error;
	//}
	echo "<script type='text/javascript'>location.href = './view_booking.php';</script>";
    	exit;
}

/*
 * Cancel Booking
 */
if(isset($_POST['cancel'])) {
	$conn = connect_db();

	$bid = $_POST['app_id'];
	$sql = "UPDATE spm_appointment_booking
			SET status = 0
			WHERE booking_id = $bid";
	$result = $conn->query($sql);
	
	if ($conn->query($sql) === TRUE) {
		$sql = "SELECT hc_prof_id, customer_id, date, time_id
				FROM spm_appointment_booking
				WHERE booking_id = $bid";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
			$tid = $row['time_id'];
			$uid = $row['customer_id'];
			$pid = $row['hc_prof_id'];
			$date = $row['date'];
		}
		$sql = "SELECT *
				FROM spm_time_slot
				WHERE time_id = $tid";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
			$time = $row['from'];
		}
		$sql = "SELECT name, email 
				FROM spm_customer_information
				WHERE customer_id = $uid";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
			$c_name = $row['name'];
			$c_email = $row['email'];
		}
		$sql = "SELECT name, email 
				FROM spm_hc_prof_info
				WHERE hc_prof_id = $pid";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
			$p_name = $row['name'];
			$p_email = $row['email'];
		}
		send_cancel_app("customer", $c_email, $c_name, $p_name, $date, $time);
		send_cancel_app("professional", $p_email, $p_name, $c_name, $date, $time);
    	$conn->close();
    	echo "<script type='text/javascript'>location.href = './view_booking.php';</script>";
    	exit;
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>