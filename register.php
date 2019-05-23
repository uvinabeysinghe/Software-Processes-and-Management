<?php 
/*
 * File Name: register.php
 * Author: Daniel Hu
 * File Created; 2019-05-05
 * Purpose: To allow the user of the system to create a membership account.
 */

include "auth.php";

$check_email = "";

include "function.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Register</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="files/register/styles.css" type="text/css" rel="stylesheet"/>
    <script src="data/document.js"></script>
    <script src="files/register/data.js"></script>
    <script type="text/javascript">
      $axure.utils.getTransparentGifPath = function() { return 'resources/images/transparent.gif'; };
      $axure.utils.getOtherPath = function() { return 'resources/Other.html'; };
      $axure.utils.getReloadPath = function() { return 'resources/reload.html'; };
    </script>
  </head>
  <body>
    <form id='register' action='register.php' method='post' accept-charset='UTF-8'>
    <input type='hidden' name='register' id='register' value='1'/>
    <div id="base" class="">

      <!-- Unnamed (Rectangle) -->
      <div id="u14" class="ax_default box_1">
        <div id="u14_div" class=""></div>
        <div id="u14_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Shape) -->
      <div id="u15" class="ax_default icon">
        <img id="u15_img" class="img " src="images/register/u15.svg"/>
        <div id="u15_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u16" class="ax_default paragraph">
        <div id="u16_div" class=""></div>
        <div id="u16_text" class="text ">
          <p><span style="text-decoration:none;">Become a member of the health center</span></p>
        </div>
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u17" class="ax_default text_field">
        <div id="u17_div" class=""></div>
        <input id="u17_input" type="text" name='addr' value="" class="u17_input" required/>
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u18" class="ax_default text_field">
        <div id="u18_div" class=""></div>
        <input id="u18_input" type="text" name='email' value="" class="u18_input" required/>
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u19" class="ax_default text_field">
        <div id="u19_div" class=""></div>
        <input id="u19_input" type="password" name='pwd' class="u19_input" required/>
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u20" class="ax_default text_field">
        <div id="u20_div" class=""></div>
        <input id="u20_input" type="text" name='phone' value="" class="u20_input" required/>
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u21" class="ax_default text_field">
        <div id="u21_div" class=""></div>
        <input id="u21_input" type="text" name="name" value="" class="u21_input" required/>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u22" class="ax_default paragraph">
        <div id="u22_div" class=""></div>
        <div id="u22_text" class="text ">
          <p><span style="text-decoration:none;">NAME</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u23" class="ax_default paragraph">
        <div id="u23_div" class=""></div>
        <div id="u23_text" class="text ">
          <p><span style="text-decoration:none;">HOME ADDRESS</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u24" class="ax_default paragraph">
        <div id="u24_div" class=""></div>
        <div id="u24_text" class="text ">
          <p><span style="text-decoration:none;">PHONE</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u25" class="ax_default paragraph">
        <div id="u25_div" class=""></div>
        <div id="u25_text" class="text ">
          <p><span style="text-decoration:none;">EMAIL* <?php echo $check_email; ?></span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u26" class="ax_default paragraph">
        <div id="u26_div" class=""></div>
        <div id="u26_text" class="text ">
          <p><span style="text-decoration:none;">PASSWORD</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u27" class="ax_default button">
        <div id="u27_div" class=""></div>
        <div id="u27_text" class="text ">
          <input type='submit' name='Submit' value='Register' />
          <!-- <p><span style="text-decoration:none;">Register</span></p> -->
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u28" class="ax_default button">
        <div id="u28_div" class=""></div>
        <div id="u28_text" class="text ">
          <p onclick="location.href = './index.php';" id="index"><span onclick="location.href = './index.php';" id="index" style="text-decoration:none;">Back</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u29" class="ax_default paragraph">
        <div id="u29_div" class=""></div>
        <div id="u29_text" class="text ">
          <p><span style="text-decoration:none;">health-care centre </span></p>
        </div>
      </div>

      <!-- Unnamed (Shape) -->
      <div id="u30" class="ax_default icon">
        <img id="u30_img" class="img " src="images/register/u30.svg"/>
        <div id="u30_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>
    </div>
    <script src="resources/scripts/axure/ios.js"></script>
  </form>
  </body>
</html>
