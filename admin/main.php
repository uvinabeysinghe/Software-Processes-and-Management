<?php  
session_start();
if(!isset($_SESSION['use'])) {
  Redirect("./ad_login.php");
}

function Redirect($url, $permanent = false) {
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Admin Main page</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="../resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="../data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="../files/admin_main_page/styles.css" type="text/css" rel="stylesheet"/>
    <script src="../data/document.js"></script>
    <script src="../files/admin_main_page/data.js"></script>
    <script type="text/javascript">
      $axure.utils.getTransparentGifPath = function() { return 'resources/images/transparent.gif'; };
      $axure.utils.getOtherPath = function() { return 'resources/Other.html'; };
      $axure.utils.getReloadPath = function() { return 'resources/reload.html'; };
    </script>
  </head>
  <body>
    <div id="base" class="">

      <!-- Unnamed (Rectangle) -->
      <div id="u185" class="ax_default paragraph">
        <div id="u185_div" class=""></div>
        <div id="u185_text" class="text ">
          <p><span style="text-decoration:none;">Welcome, Admin</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u186" class="ax_default link_button">
        <div id="u186_div" class=""></div>
        <div id="u186_text" class="text ">
          <p onclick="location.href = './logout.php';" id="logout"><span onclick="location.href = './logout.php';" id="logout" style="text-decoration:none;">Logout</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u187" class="ax_default box_1">
        <div id="u187_div" class=""></div>
        <div id="u187_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u188" class="ax_default button">
        <div id="u188_div" class=""></div>
        <div id="u188_text" class="text ">
          <p onclick="location.href = './new_prof.php';"><span onclick="location.href = './new_prof.php';" style="text-decoration:none;">Add Professionals</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u189" class="ax_default button">
        <div id="u189_div" class=""></div>
        <div id="u189_text" class="text ">
          <p onclick="location.href = './view_book.php';"><span onclick="location.href = './view_book.php';" style="text-decoration:none;">View Appointments</span></p>
        </div>
      </div>
    </div>
    <script src="resources/scripts/axure/ios.js"></script>
  </body>
</html>
