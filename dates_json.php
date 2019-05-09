<?php 
// set json headers
header("Access-Control-Allow-Methods: GET");
header('Content-Type: application/json');
 
$date=isset($_GET['date']) ? $_GET['date'] : die('Date not found.');
 
include "function.php";
 
$conn = connect_db();

$sql = "SELECT * FROM spm_time_slot
		WHERE time_id NOT IN 
			(SELECT time_id 
			 FROM spm_appointment_booking
			 WHERE date = '$date' AND status = 1)";

$result = $conn->query($sql);

echo json_encode(mysqli_fetch_all($result,MYSQLI_ASSOC));

?>