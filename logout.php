<?php 
/*
 * File Name: logout.php
 * Author: Daniel Hu
 * File Created; 2019-05-05
 * Purpose: The simply function of member logout.
 */

	session_start();
	
	// destroy the session 
	session_destroy(); 

    header("location:./index.php");
?>