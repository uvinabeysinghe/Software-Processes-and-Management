<?php 
/*
 * File Name: change_pwd.php
 * Author: Daniel Hu
 * File Created; 2019-05-06
 * Purpose: To let the member change their password.
 */
session_start();

if (!$_SESSION['uid'] && !isset($_GET['email'])) {
    header("location:./login.php");
}

include "auth.php";
include "function.php";

if (isset($_GET['email'])) {	
	$conn = connect_db();

	$email = $_GET['email'];
	$code = $_GET['code'];

	$sql = "SELECT customer_id, password 
			FROM spm_customer_information
			WHERE email = '$email'";
	$result = $conn->query($sql);
	$pwd = "default";

	while($row = $result->fetch_assoc()) {
		$pwd = $row['password'];
		$uid = $row['customer_id'];
	}

	if ($code != $pwd) {
		header("location:./login.php");
	}
} else {
	$uid = $_SESSION['uid'];
}
$message = "";
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Change Password</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="files/changepassword/styles.css" type="text/css" rel="stylesheet"/>
    <script src="data/document.js"></script>
    <script src="files/changepassword/data.js"></script>
    <script type="text/javascript">
      $axure.utils.getTransparentGifPath = function() { return 'resources/images/transparent.gif'; };
      $axure.utils.getOtherPath = function() { return 'resources/Other.html'; };
      $axure.utils.getReloadPath = function() { return 'resources/reload.html'; };
    </script>
  </head>
  <body>
  	<form id='change_pwd' action='change_pwd.php' method='post' accept-charset='UTF-8'>
  	<input type='hidden' name='change_pwd' id='change_pwd' value='1'/>
  	<input type='hidden' name='uid' id='uid' value='<?php echo $uid; ?>'>
    <div id="base" class="">

      <!-- Unnamed (Rectangle) -->
      <div id="u126" class="ax_default box_1">
        <div id="u126_div" class=""></div>
        <div id="u126_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u127" class="ax_default paragraph">
        <div id="u127_div" class=""></div>
        <div id="u127_text" class="text ">
          <p><span style="text-decoration:none;">NEW PASSWORD</span></p>
        </div>
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u128" class="ax_default text_field">
        <div id="u128_div" class=""></div>
        <input id="u128_input" type="password" value="" name="pwd" class="u128_input"/>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u129" class="ax_default button">
        <div id="u129_div" class=""></div>
        <div id="u129_text" class="text ">
          <input type='submit' name='Change' value='Change' />
          <!-- <p><span style="text-decoration:none;">Submit</span></p> -->
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u130" class="ax_default button">
        <div id="u130_div" class=""></div>
        <div id="u130_text" class="text ">
          <p onclick="location.href = './update.php';" id="update"><span onclick="location.href = './update.php';" id="update" style="text-decoration:none;">Back to Update</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u131" class="ax_default paragraph">
        <div id="u131_div" class=""></div>
        <div id="u131_text" class="text ">
          <p><span style="text-decoration:none;">health-care centre </span></p>
        </div>
      </div>

      <!-- Unnamed (Shape) -->
      <div id="u132" class="ax_default icon">
        <img id="u132_img" class="img " src="images/register/u30.svg"/>
        <div id="u132_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u133" class="ax_default paragraph">
        <div id="u133_div" class=""></div>
        <div id="u133_text" class="text ">
          <p><span style="text-decoration:none;">RETYPE NEW PASSWORD</span></p>
          <p><?php echo $message; ?></p>
        </div>
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u134" class="ax_default text_field">
        <div id="u134_div" class=""></div>
        <input id="u134_input" type="password" value="" name="repwd" class="u134_input"/>
      </div>
    </div>
    <script src="resources/scripts/axure/ios.js"></script>
  	</form>
  </body>
</html>
