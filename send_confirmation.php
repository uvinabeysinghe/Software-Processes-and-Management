<?php 
/*
 * File Name: send_confirmation.php
 * Author: Daniel Hu
 * File Created; 2019-05-07
 * Purpose: The confirm page for register.
 */
include "function.php";

$email = $_GET['email'];
$code = $_GET['code'];

$conn = connect_db();

$sql = "UPDATE spm_customer_information
		SET active = 1 
		WHERE email = '$email' AND password = '$code'";

$conn->query($sql);
echo "<script type='text/javascript'>location.href = './login.php';</script>";
exit;

?>