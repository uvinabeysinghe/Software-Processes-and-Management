<?php  session_start(); ?>
<?php
include "../auth.php";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['submit'])) {

echo $_GET['email'];
echo $_GET['psw'];

$email = $_GET['email'];
$password = md5($_GET['psw']);

$sql = "select * from spm_admin where email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $_SESSION['use']=$email;
    Redirect('./view_book.php', false);
} else {
    echo "Uer Not Found";
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
      <label for="email"><b>Username</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <button type="submit" name="submit" >Login</button>
    </div>
  </form>
</html>
