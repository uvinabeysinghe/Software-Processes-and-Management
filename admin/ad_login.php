<?php  session_start(); ?>


<!DOCTYPE html>
<html>
  <head>
    <title>AdminLogin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="../resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="../data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="../files/adminlogin/styles.css" type="text/css" rel="stylesheet"/>
    <script src="../data/document.js"></script>
    <script src="../files/adminlogin/data.js"></script>
    <script type="text/javascript">
      $axure.utils.getTransparentGifPath = function() { return 'resources/images/transparent.gif'; };
      $axure.utils.getOtherPath = function() { return 'resources/Other.html'; };
      $axure.utils.getReloadPath = function() { return 'resources/reload.html'; };
    </script>
  </head>
  <body>
    <form name="login" action="ad_login.php" method = "post">
    <div id="base" class="">
      <!-- Unnamed (Rectangle) -->
      <div id="u176" class="ax_default box_1">
        <div id="u176_div" class=""></div>
        <div id="u176_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u177" class="ax_default box_2">
        <div id="u177_div" class=""><?php
include "../auth.php";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = md5($_POST['psw']);
  $sql = "select * from spm_admin where email = '$email' AND password = '$password'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    $_SESSION['use']=$email;
    Redirect('./main.php', false);
  } else {
    echo  "Wrong username or password.";
  }
}
function Redirect($url, $permanent = false) {
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}
$conn->close();
?></div>
        <div id="u177_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u178" class="ax_default button">
        <div id="u178_div" class=""></div>
        <div id="u178_text" class="text ">
          <button type="submit" name="submit" >Login</button>
        </div>
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u179" class="ax_default text_field">
        <div id="u179_div" class=""></div>
        <input id="u179_input" type="text" value="" name="email" class="u179_input"/>
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u180" class="ax_default text_field">
        <div id="u180_div" class=""></div>
        <input id="u180_input" type="password" value="" name="psw" class="u180_input"/>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u181" class="ax_default paragraph">
        <div id="u181_div" class=""></div>
        <div id="u181_text" class="text ">
          <p><span style="text-decoration:none;">PASSWORD</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u182" class="ax_default paragraph">
        <div id="u182_div" class=""></div>
        <div id="u182_text" class="text ">
          <p><span style="text-decoration:none;">USERNAME</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u183" class="ax_default paragraph">
        <div id="u183_div" class=""></div>
        <div id="u183_text" class="text ">
          <p><span style="text-decoration:none;">health-care centre </span></p>
        </div>
      </div>

      <!-- Unnamed (Shape) -->
      <div id="u184" class="ax_default icon">
        <img id="u184_img" class="img " src="../images/login/u13.svg"/>
        <div id="u184_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>
    </div>

    <script src="resources/scripts/axure/ios.js"></script>
    </form>
  </body>
</html>
