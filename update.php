<?php 
/*
 * File Name: update.php
 * Author: Daniel Hu
 * File Created; 2019-05-05
 * Purpose: To allow the members to update their data.
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
	$addr = $row['home_address'];
	$phone = $row['phone_no'];
	$email = $row['email'];
}

include "function.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Update/View information</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="files/update_view_information/styles.css" type="text/css" rel="stylesheet"/>
    <script src="data/document.js"></script>
    <script src="files/update_view_information/data.js"></script>
    <script type="text/javascript">
      $axure.utils.getTransparentGifPath = function() { return 'resources/images/transparent.gif'; };
      $axure.utils.getOtherPath = function() { return 'resources/Other.html'; };
      $axure.utils.getReloadPath = function() { return 'resources/reload.html'; };
    </script>
  </head>
  <body>
  <form id='update' action='update.php' method='post' accept-charset='UTF-8'>
  	<input type='hidden' name='update' id='update' value='1'/>
    <div id="base" class="">

      <!-- Unnamed (Rectangle) -->
      <div id="u135" class="ax_default box_2">
        <div id="u135_div" class=""></div>
        <div id="u135_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u136" class="ax_default paragraph">
        <div id="u136_div" class=""></div>
        <div id="u136_text" class="text ">
          <p><span style="text-decoration:none;">Welcome, <?php echo $name; ?></span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u137" class="ax_default link_button">
        <div id="u137_div" class=""></div>
        <div id="u137_text" class="text ">
          <p onclick="location.href = './logout.php';" id="logout"><span onclick="location.href = './logout.php';" id="logout" style="text-decoration:none;">Logout</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u138" class="ax_default link_button">
        <div id="u138_div" class=""></div>
        <div id="u138_text" class="text ">
          <p onclick="location.href = './update.php';" id="update"><span style="text-decoration:none;">View/Update information</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u139" class="ax_default link_button">
        <div id="u139_div" class=""></div>
        <div id="u139_text" class="text ">
          <p onclick="location.href = './req_booking.php';" id="req_booking"><span onclick="location.href = './req_booking.php';" id="req_booking" style="text-decoration:none;">Booking</span></p>
        </div>
      </div>

      <!-- Unnamed (Line) -->
      <div id="u140" class="ax_default line">
        <img id="u140_img" class="img " src="images/main_page/u68.svg"/>
        <div id="u140_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u141" class="ax_default box_1">
        <div id="u141_div" class=""></div>
        <div id="u141_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Shape) -->
      <div id="u142" class="ax_default icon">
        <img id="u142_img" class="img " src="images/register/u15.svg"/>
        <div id="u142_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u143" class="ax_default paragraph">
        <div id="u143_div" class=""></div>
        <div id="u143_text" class="text ">
          <p><span style="text-decoration:none;">Personal Information</span></p>
        </div>
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u144" class="ax_default text_field">
        <div id="u144_div" class=""></div>
        <input id="u144_input" type="text" name="addr" value="<?php echo $addr; ?>" class="u144_input" required/>
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u145" class="ax_default text_field">
        <div id="u145_div" class=""></div>
        <input id="u145_input" type="text" name="phone" value="<?php echo $phone; ?>" class="u145_input" required/>
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u146" class="ax_default text_field">
        <div id="u146_div" class=""></div>
        <input id="u146_input" type="text" name="name" value="<?php echo $name; ?>" class="u146_input" required/>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u147" class="ax_default paragraph">
        <div id="u147_div" class=""></div>
        <div id="u147_text" class="text ">
          <p><span style="text-decoration:none;">NAME</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u148" class="ax_default paragraph">
        <div id="u148_div" class=""></div>
        <div id="u148_text" class="text ">
          <p><span style="text-decoration:none;">HOME ADDRESS</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u149" class="ax_default paragraph">
        <div id="u149_div" class=""></div>
        <div id="u149_text" class="text ">
          <p><span style="text-decoration:none;">CONTACT NUMBER</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u150" class="ax_default paragraph">
        <div id="u150_div" class=""></div>
        <div id="u150_text" class="text ">
          <p><span style="text-decoration:none;">EMAIL ADDRESS (CANNOT BE CHANGED)</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u151" class="ax_default button">
        <div id="u151_div" class=""></div>
        <div id="u151_text" class="text ">
          <input type='submit' name='Update' value='Update' />
          <!-- <p><span style="text-decoration:none;">Update</span></p> -->
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u152" class="ax_default button">
        <div id="u152_div" class=""></div>
        <div id="u152_text" class="text ">
          <p onclick="location.href = './view_booking.php';" id="view_booking"><span onclick="location.href = './view_booking.php';" id="view_booking" style="text-decoration:none;">Back</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u153" class="ax_default box_2">
        <div id="u153_div" class=""><?php echo $email; ?></div>
        <div id="u153_text" class="text" style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u154" class="ax_default button">
        <div id="u154_div" class=""></div>
        <div id="u154_text" class="text ">
          <p onclick="location.href = './change_pwd.php';" id="change_pwd"><span onclick="location.href = './change_pwd.php';" id="change_pwd" style="text-decoration:none;">Change Password</span></p>
        </div>
      </div>
    </div>
    <script src="resources/scripts/axure/ios.js"></script>
  </form>
  </body>
</html>
