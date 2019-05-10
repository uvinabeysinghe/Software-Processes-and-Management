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

if (isset($_GET['logout'])){
  session_destroy();
  Redirect("./ad_login.php");
}

if (isset($_GET['appointments'])){
  Redirect("./view_book.php");
}


if (isset($_GET['submit'])) {
  $type = $_GET['type'];
  $name= $_GET['name'];
  $email = $_GET['email'];
  $charge = $_GET['charge'];

  $sql = "INSERT INTO spm_hc_prof_info
          (type_id,name,email,charge_per_hour)
          VALUES ('$type','$name','$email','$charge')";

  if ($conn->query($sql) === TRUE) {
     echo "New record created successfully";
  } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
  }
}


function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}

$conn->close();

?>


<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
  </head>

  <form name="login" action="" method = "get">

    <div class="container">
      <label for="type"><b>Healthcare Professional Type</b></label>
      <select name="type" id="type">
        <option value="1">Podiatrist</option>
        <option value="2">Naturopath</option>
        <option value="3">Chiropractor</option>
      </select><br>
      <label for="type"><b>Name</b></label>
      <input type="text" placeholder="Name" name="name" required><br>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required><br>
      <label for="charge"><b>charge</b></label>
      <input type="text" placeholder="Charge Per Hour" name="charge" required><br>
      <button type="submit" name="submit" >Add</button>


    </div>
  </form>
  <form name="navi" action="" method = "get">
    <button type="submit" name="appointments" >Appointments</button>
    <button type="logout" name="logout" >Logout </button>
  </form>

</html>
