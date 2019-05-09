<?php 
// set json headers
header("Access-Control-Allow-Methods: GET");
header('Content-Type: application/json');
 
$type_id=isset($_GET['type_id']) ? $_GET['type_id'] : die('Type ID not found.');
 
include "function.php";
 
$conn = connect_db();

$sql = "SELECT * FROM spm_hc_prof_info
		WHERE type_id = '$type_id'";
$result = $conn->query($sql);

echo json_encode(mysqli_fetch_all($result,MYSQLI_ASSOC));

?>