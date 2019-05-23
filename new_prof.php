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

<!DOCTYPE html>
<html>
  <head>
    <title>Add Professionals</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="../resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="../data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="../files/add_professionals/styles.css" type="text/css" rel="stylesheet"/>
    <script src="../data/document.js"></script>
    <script src="../files/add_professionals/data.js"></script>
    <script type="text/javascript">
      $axure.utils.getTransparentGifPath = function() { return 'resources/images/transparent.gif'; };
      $axure.utils.getOtherPath = function() { return 'resources/Other.html'; };
      $axure.utils.getReloadPath = function() { return 'resources/reload.html'; };
    </script>
  </head>
  <body>
    <form name="login" action="" method = "get">
    <div id="base" class="">

      <!-- Unnamed (Rectangle) -->
      <div id="u260" class="ax_default box_1">
        <div id="u260_div" class=""></div>
        <div id="u260_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u261" class="ax_default paragraph">
        <div id="u261_div" class=""></div>
        <div id="u261_text" class="text ">
          <p><span style="text-decoration:none;">Add professionals</span></p>
        </div>
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u262" class="ax_default text_field">
        <div id="u262_div" class=""></div>
        <input id="u262_input" type="text" value="" name="name" class="u262_input" required />
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u263" class="ax_default text_field">
        <div id="u263_div" class=""></div>
        <input id="u263_input" type="text" value="" name="charge" class="u263_input" required/>
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u264" class="ax_default text_field">
        <div id="u264_div" class=""></div>
        <input id="u264_input" type="text" value="" name="email" class="u264_input" required/>
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u265" class="ax_default text_field">
        <select name="type" id="type">
        <option value="1">Podiatrist</option>
        <option value="2">Naturopath</option>
        <option value="3">Chiropractor</option>
      </select>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u266" class="ax_default paragraph">
        <div id="u266_div" class=""></div>
        <div id="u266_text" class="text ">
          <p><span style="text-decoration:none;">Type</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u267" class="ax_default paragraph">
        <div id="u267_div" class=""></div>
        <div id="u267_text" class="text ">
          <p><span style="text-decoration:none;">NAME</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u268" class="ax_default paragraph">
        <div id="u268_div" class=""></div>
        <div id="u268_text" class="text ">
          <p><span style="text-decoration:none;">EMAIL ADDRESS</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u269" class="ax_default paragraph">
        <div id="u269_div" class=""></div>
        <div id="u269_text" class="text ">
          <p><span style="text-decoration:none;">CHARGE</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u270" class="ax_default button">
        <div id="u270_div" class=""></div>
        <div id="u270_text" class="text ">
          <button type="submit" name="submit" >Add</button>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u271" class="ax_default button">
        <div id="u271_div" class=""></div>
        <div id="u271_text" class="text ">
          <p onclick="location.href = './main.php';"><span onclick="location.href = './main.php';" style="text-decoration:none;">Back</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u272" class="ax_default paragraph">
        <div id="u272_div" class=""></div>
        <div id="u272_text" class="text ">
          <p><span style="text-decoration:none;">health-care centre </span></p>
        </div>
      </div>

      <!-- Unnamed (Shape) -->
      <div id="u273" class="ax_default icon">
        <img id="u273_img" class="img " src="../images/register/u30.svg"/>
        <div id="u273_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>
    </div>
    <script src="resources/scripts/axure/ios.js"></script>
  </form>
  </body>
</html>
