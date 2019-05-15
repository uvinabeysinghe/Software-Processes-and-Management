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