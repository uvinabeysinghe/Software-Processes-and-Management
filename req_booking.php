<?php 
/*
 * File Name: req_booking.php
 * Author: Daniel Hu
 * File Created; 2019-05-07
 * Purpose: Request a new appointment booking.
 */
session_start();
if(!$_SESSION['uid']) {
    header("location:./login.php");
}

include "auth.php";

$uid = $_SESSION['uid'];

include "function.php";
?>

<html>
	<head>
		<script>
			function handler(e){
    			// get id of selected type
    			var date=e.target.value; 

    			// set json url
				var json_url="dates_json.php?date=" + date;
 
				// get json data
				jQuery.getJSON(json_url, function(data){
    				// empty contents of players dropdown
					$("#time").html("");
 
					// put new dropdown values to players dropdown
					jQuery.each(data, function(key, val){
    				$("#time").append("<option value='" + val.time_id + "'>" + val.from + "-" + val.to + "</option>")
					});
				});
			}
		</script>
		<link rel="stylesheet" type="text/css" href="styles/style.css">
	</head>
	<body>
		<form id='logout' action='function.php' method='post' accept-charset='UTF-8'>
			<input type='submit' name='logout' value='logout' />
		</form>

		<form id='update' action='function.php' method='post' accept-charset='UTF-8'>
			<fieldset>
				<legend>New Appointment</legend>
					<input type='hidden' name='new_req' id='new_req' value='1'/>
					<label for='type' >Prof. Type</label>
					<select name="type" id="type">
						<option value='0'>Select a Type</option>
						<option value='1'>Podiatrist</option>
						<option value='2'>Naturopath</option>
						<option value='3'>Chiropractor</option>
					</select>
					<br>
					<label for='pid' >Preferred Prof. </label>
					<select name="pid" id="pid"></select>
					<br>
					<label for='date' >Date: </label>
					<input type="date" name="date" id="date" onchange="handler(event);"/><br>
					<label for='time' >Pick a Time </label>
					<select name="time" id="time"></select>
					<br>
					<label for='message' >Leave a message: </label>
					<input type='text' name='message' id='message'/><br>
					
					<input type='submit' name='Book' value='Book' />
			</fieldset>
		</form>
		<button onclick="location.href = './view_booking.php';" id="view_booking">Back to Main Page</button>
	</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
	// detect change of dropdown
	$("#type").change(function(){ 
    	// get id of selected type
    	var type_id=$(this).find(':selected').val(); 

    	// set json url
		var json_url="names_json.php?type_id=" + type_id;
 
		// get json data
		jQuery.getJSON(json_url, function(data){
    		// empty contents of players dropdown
			$("#pid").html("");
 
			// put new dropdown values to players dropdown
			jQuery.each(data, function(key, val){
    		$("#pid").append("<option value='" + val.hc_prof_id + "'>" + val.name + " ($" + val.charge_per_hour + "/hr)</option>")
			});
		});
	});
	
	//$("#date").change(function(){ 

});

</script>