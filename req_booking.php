<?php 
/*
 * File Name: req_booking.php
 * Author: Daniel Hu
 * File Created; 2019-05-07
 * Purpose: Request a new appointment booking.
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

include "function.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Booking</title>
	<script>
			function handler(e){
    			// get id of selected type
    			var date=e.target.value;

    			var pid=$("#u171_input").find(':selected').val();

    			// set json url
				var json_url="dates_json.php?date=" + date + "&pid=" + pid;
 				
				// get json data
				jQuery.getJSON(json_url, function(data){
    				// empty contents of players dropdown
					$("#u173_input").html("");
 
					// put new dropdown values to players dropdown
					jQuery.each(data, function(key, val){
    				$("#u173_input").append("<option value='" + val.time_id + "'>" + val.from + "-" + val.to + "</option>")
					});
				});
			}
		</script>

    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="files/booking/styles.css" type="text/css" rel="stylesheet"/>
    <script src="data/document.js"></script>
    <script src="files/booking/data.js"></script>
    <script type="text/javascript">
      $axure.utils.getTransparentGifPath = function() { return 'resources/images/transparent.gif'; };
      $axure.utils.getOtherPath = function() { return 'resources/Other.html'; };
      $axure.utils.getReloadPath = function() { return 'resources/reload.html'; };
    </script>
  </head>
  <body>
  	<form id='update' action='function.php' method='post' accept-charset='UTF-8'>
  	<input type='hidden' name='new_req' id='new_req' value='1'/>
    <div id="base" class="">

      <!-- Unnamed (Rectangle) -->
      <div id="u155" class="ax_default box_2">
        <div id="u155_div" class=""></div>
        <div id="u155_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u156" class="ax_default paragraph">
        <div id="u156_div" class=""></div>
        <div id="u156_text" class="text ">
          <p><span style="text-decoration:none;">Welcome, <?php echo $name; ?></span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u157" class="ax_default link_button">
        <div id="u157_div" class=""></div>
        <div id="u157_text" class="text ">
          <p onclick="location.href = './logout.php';" id="logout"><span onclick="location.href = './logout.php';" id="logout" style="text-decoration:none;">Logout</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u158" class="ax_default link_button">
        <div id="u158_div" class=""></div>
        <div id="u158_text" class="text ">
          <p onclick="location.href = './update.php';" id="update"><span style="text-decoration:none;">View/Update information</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u159" class="ax_default link_button">
        <div id="u159_div" class=""></div>
        <div id="u159_text" class="text ">
          <p onclick="location.href = './req_booking.php';" id="req_booking"><span onclick="location.href = './req_booking.php';" id="req_booking" style="text-decoration:none;">Booking</span></p>
        </div>
      </div>

      <!-- Unnamed (Line) -->
      <div id="u160" class="ax_default line">
        <img id="u160_img" class="img " src="images/main_page/u68.svg"/>
        <div id="u160_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u161" class="ax_default box_1">
        <div id="u161_div" class=""></div>
        <div id="u161_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u162" class="ax_default paragraph">
        <div id="u162_div" class=""></div>
        <div id="u162_text" class="text ">
          <p><span style="text-decoration:none;">TYPE</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u163" class="ax_default paragraph">
        <div id="u163_div" class=""></div>
        <div id="u163_text" class="text ">
          <p><span style="text-decoration:none;">NAME</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u164" class="ax_default paragraph">
        <div id="u164_div" class=""></div>
        <div id="u164_text" class="text ">
          <p><span style="text-decoration:none;">DATE</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u165" class="ax_default paragraph">
        <div id="u165_div" class=""></div>
        <div id="u165_text" class="text ">
          <p><span style="text-decoration:none;">TIME</span></p>
        </div>
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u166" class="ax_default text_field">
        <div id="u166_div" class=""></div>
        <input name="message" id="u166_input" type="text" value="" class="u166_input"/>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u167" class="ax_default paragraph">
        <div id="u167_div" class=""></div>
        <div id="u167_text" class="text ">
          <p><span style="text-decoration:none;">OPTIONAL MESSAGE</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u168" class="ax_default paragraph">
        <div id="u168_div" class=""></div>
        <div id="u168_text" class="text ">
          <p><span style="text-decoration:none;">Create a Booking</span></p>
        </div>
      </div>

      <!-- Unnamed (Shape) -->
      <div id="u169" class="ax_default icon">
        <img id="u169_img" class="img " src="images/booking/u169.svg"/>
        <div id="u169_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Droplist) -->
      <div id="u170" class="ax_default droplist">
        <div id="u170_div" class=""></div>
        <select id="u170_input" class="u170_input" name="type">
        	<option value='0'>Select a Type</option>
			<option value='1'>Podiatrist</option>
			<option value='2'>Naturopath</option>
			<option value='3'>Chiropractor</option>
        </select>
      </div>

      <!-- Unnamed (Droplist) -->
      <div id="u171" class="ax_default droplist">
        <div id="u171_div" class=""></div>
        <select name="pid" id="u171_input" class="u171_input">
        </select>
      </div>

      <!-- Unnamed (Droplist) -->
      <div id="u172" class="ax_default droplist">
        <div id="u172_div" class="">
        <input type="date" name="date" id="date" onchange="handler(event);"/>
        </div>
      </div>

      <!-- Unnamed (Droplist) -->
      <div id="u173" class="ax_default droplist">
        <div id="u173_div" class=""></div>
        <select name="time" id="u173_input" class="u173_input">
        </select>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u174" class="ax_default button">
        <div id="u174_div" class=""></div>
        <div id="u174_text" class="text ">
          <input type='submit' name='Book' value='Book' />
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u175" class="ax_default button">
        <div id="u175_div" class=""></div>
        <div id="u175_text" class="text ">
          <p onclick="location.href = './view_booking.php';"><span onclick="location.href = './view_booking.php';" style="text-decoration:none;">Back</span></p>
        </div>
      </div>
    </div>
    <script src="resources/scripts/axure/ios.js"></script>
  </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
	// detect change of dropdown
	$("#u170_input").change(function(){ 
    	// get id of selected type
    	var type_id=$(this).find(':selected').val(); 

    	// set json url
		var json_url="names_json.php?type_id=" + type_id;
 
		// get json data
		jQuery.getJSON(json_url, function(data){
    		// empty contents of players dropdown
			$("#u171_input").html("");
 
			// put new dropdown values to players dropdown
			jQuery.each(data, function(key, val){
    		$("#u171_input").append("<option value='" + val.hc_prof_id + "'>" + val.name + " ($" + val.charge_per_hour + "/hr)</option>")
			});
		});
	});
	
	//$("#date").change(function(){ 

});

</script>