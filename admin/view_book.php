<?php  session_start(); ?>
<?php
include "../auth.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

if(!isset($_SESSION['use'])) {
  Redirect("./ad_login.php");
}

if (isset($_GET['add'])) {
  Redirect("./new_prof.php");
}

if (isset($_GET['logout'])){
  session_destroy();
  Redirect("./ad_login.php");
}

function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}
?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
  </head>
  <body>  
    <form name="login" action="" method = "get">
      <div class="container">

        <button type="submit" name="add" >Add new healthcare professionals </button>
        <button type="logout" name="logout" >Logout </button>

        <table>
          <tr>
            <th>Date</th>
            <th>Time From</th>
            <th>Time To</th>
            <th>Customer Name</th>
            <th>Prof. Type</th>
            <th>Prof. Name</th>
            <th>Message</th>
            <th>Status</th>
          </tr>
<?php 
  $sql = "SELECT ab.hc_prof_id, ab.date, ab.message, pt.type, hc.name AS p_name, t.from, t.to, ci.name AS c_name, ab.status
  FROM spm_appointment_booking AS ab
    INNER JOIN spm_hc_prof_info AS hc 
      ON ab.hc_prof_id = hc.hc_prof_id
    INNER JOIN spm_prof_type AS pt 
      ON hc.type_id = pt.type_id
    INNER JOIN spm_time_slot AS t
      ON ab.time_id = t.time_id
    INNER JOIN spm_customer_information AS ci
      ON ab.customer_id = ci.customer_id
  ORDER BY ab.date ASC";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
    $app_status = "";
    if($row['status'] == 0) $app_status = "Canceled";
?>
        <tr>
          <td><?php echo $row['date']; ?></td>
          <td><?php echo $row['from']; ?></td>
          <td><?php echo $row['to']; ?></td>
          <th><?php echo $row['c_name'] ?></th>
          <td><?php echo $row['type']; ?></td>
          <td><?php echo $row['p_name']; ?></td>
          <td><?php echo $row['message']; ?></td>
          <td><?php echo $app_status; ?></td>
        </tr>
<?php
  }
?>
      </table>
      </div>
    </form>
  </body>
</html>
