<?php 
/*
 * File Name: view_booking.php
 * Author: Daniel Hu
 * File Created; 2019-05-06
 * Purpose: The users can check and do actions to their own bookings.
 */
session_start();
if(!$_SESSION['uid']) {
    header("location:./login.php");
}

include "auth.php";

$uid = $_SESSION['uid'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * 
		FROM spm_customer_information 
		WHERE customer_id = '$uid'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	$name = $row['name'];
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Main Page</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
					<p>
						Welcome, <?php echo $name; ?>
					</p>
				</div>
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					 
					<button type="button" class="btn btn-success" onclick="location.href = './logout.php';">
						Logout
					</button>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					 
					<button onclick="location.href = './update.php';" type="button" class="btn btn-success">
						View/Update Information
					</button>
				</div>
				<div class="col-md-6">
					 
					<button onclick="location.href = './req_booking.php';" type="button" class="btn btn-success">
						New Booking
					</button>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3>
						Appointment List
					</h3>
					<table class="table">
						<thead>
							<tr>
								<th>Date</th>
								<th>Time From</th>
								<th>Time To</th>
								<th>Prof. Type</th>
								<th>Prof. Name</th>
								<th>Message</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
<?php 
	$cur_date = date("Y-m-d");
	$sql = "SELECT ab.booking_id, ab.hc_prof_id, ab.date, ab.message, pt.type, hc.name, t.from, t.to
	FROM spm_appointment_booking AS ab
		INNER JOIN spm_hc_prof_info AS hc 
			ON ab.hc_prof_id = hc.hc_prof_id
		INNER JOIN spm_prof_type AS pt 
			ON hc.type_id = pt.type_id
		INNER JOIN spm_time_slot AS t
			ON ab.time_id = t.time_id
	WHERE ab.customer_id = '$uid' AND ab.status = 1 AND ab.date >= '$cur_date'
	ORDER BY ab.date ASC";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
?>
			<tr>
				<td><?php echo $row['date']; ?></td>
				<td><?php echo $row['from']; ?></td>
				<td><?php echo $row['to']; ?></td>
				<td><?php echo $row['type']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['message']; ?></td>
				<td><form id='cancel' action='function.php' method='post' accept-charset='UTF-8'><input type='hidden' name='cancel' id='cancel' value='1'/><input type='hidden' name='app_id' id='app_id' value='<?php echo $row['booking_id'] ?>'/><input type='submit' name='Cancel' value='Cancel' /></form></td>
			</tr>
<?php
	}
?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3>
						Appointment History
					</h3>
					<table class="table">
						<thead>
							<tr>
								<th>Date</th>
								<th>Time From</th>
								<th>Time To</th>
								<th>Prof. Type</th>
								<th>Prof. Name</th>
								<th>Message</th>
							</tr>
						</thead>
						<tbody>
<?php 
	$sql = "SELECT ab.hc_prof_id, ab.date, ab.message, pt.type, hc.name, t.from, t.to
	FROM spm_appointment_booking AS ab
		INNER JOIN spm_hc_prof_info AS hc 
			ON ab.hc_prof_id = hc.hc_prof_id
		INNER JOIN spm_prof_type AS pt 
			ON hc.type_id = pt.type_id
		INNER JOIN spm_time_slot AS t
			ON ab.time_id = t.time_id
	WHERE ab.customer_id = '$uid' AND ab.status = 1 AND ab.date < '$cur_date'
	ORDER BY ab.date ASC";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
?>
			<tr>
				<td><?php echo $row['date']; ?></td>
				<td><?php echo $row['from']; ?></td>
				<td><?php echo $row['to']; ?></td>
				<td><?php echo $row['type']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['message']; ?></td>
			</tr>
<?php
	}
?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3>
						Canceled Appointments
					</h3>
					<table class="table">
						<thead>
							<tr>
								<th>Date</th>
								<th>Time From</th>
								<th>Time To</th>
								<th>Prof. Type</th>
								<th>Prof. Name</th>
								<th>Message</th>
							</tr>
						</thead>
						<tbody>
<?php 
	$sql = "SELECT ab.hc_prof_id, ab.date, ab.message, pt.type, hc.name, t.from, t.to
	FROM spm_appointment_booking AS ab
		INNER JOIN spm_hc_prof_info AS hc 
			ON ab.hc_prof_id = hc.hc_prof_id
		INNER JOIN spm_prof_type AS pt 
			ON hc.type_id = pt.type_id
		INNER JOIN spm_time_slot AS t
			ON ab.time_id = t.time_id
	WHERE ab.customer_id = '$uid' AND ab.status = 0
	ORDER BY ab.date ASC";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
?>
			<tr>
				<td><?php echo $row['date']; ?></td>
				<td><?php echo $row['from']; ?></td>
				<td><?php echo $row['to']; ?></td>
				<td><?php echo $row['type']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['message']; ?></td>
			</tr>
<?php
	}
?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>