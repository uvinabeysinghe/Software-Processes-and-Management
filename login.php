<?php 
/*
 * File Name: login.php
 * Author: Daniel Hu
 * File Created; 2019-05-05
 * Purpose: To allow the members to log into the system.
 */

include "auth.php";

$wrong_login = "";

include "function.php";

?>

<html><head>
    <title>Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link href="resources/css/axure_rp_page.css" type="text/css" rel="stylesheet">
    <link href="data/styles.css" type="text/css" rel="stylesheet">
    <link href="files/login/styles.css" type="text/css" rel="stylesheet">
    <script src="data/document.js"></script>
    <script src="files/login/data.js"></script>
    <script type="text/javascript">
      $axure.utils.getTransparentGifPath = function() { return 'resources/images/transparent.gif'; };
      $axure.utils.getOtherPath = function() { return 'resources/Other.html'; };
      $axure.utils.getReloadPath = function() { return 'resources/reload.html'; };
    </script>
  </head>
  <body>
  <form id='login' action='login.php' method='post' accept-charset='UTF-8'>
    <input type='hidden' name='login' id='login' value='1'/>
    <div id="base" class="">

      <!-- Unnamed (Rectangle) -->
      <div id="u3" class="ax_default box_1">
        <div id="u3_div" class=""></div>
        <div id="u3_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u4" class="ax_default box_2">
        <div id="u4_div" class=""></div>
        <div id="u4_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u5" class="ax_default link_button" style="cursor: pointer;">
        <div id="u5_div" class="" tabindex="0"></div>
        <div id="u5_text" class="text ">
          <p><?php echo $wrong_login; ?></p>
          <p onclick="location.href = './forgot_pwd.php';" id="register"><span style="text-decoration:none;">Forget password?</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u7" class="ax_default button" style="cursor: pointer;">
        <div id="u7_div" class="" tabindex="0"></div>
        <div id="u7_text" class="text ">
          <p onclick="location.href = './register.php';" id="register"><span style="text-decoration:none;" onclick="location.href = './register.php';" id="register">Register</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6" class="ax_default button" style="cursor: pointer;">
        <div id="u6_div" class="" tabindex="0"></div>
        <div id="u6_text" class="text ">
          <input type='submit' name='Submit' value='Login' />
          <!-- <p><span style="text-decoration:none;">Login</span></p> -->
        </div>
      </div>
    
      <!-- Unnamed (Text Field) -->
      <div id="u8" class="ax_default text_field">
        <div id="u8_div" class=""></div>
        <input id="u8_input" type="text" value="" name="email" class="u8_input" style="color: rgb(153, 153, 153);">
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u9" class="ax_default text_field">
        <div id="u9_div" class=""></div>
        <input id="u9_input" type="password" value="" name="pwd" class="u9_input" style="color: rgb(153, 153, 153);">
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u10" class="ax_default paragraph">
        <div id="u10_div" class=""></div>
        <div id="u10_text" class="text ">
          <p><span style="text-decoration:none;">PASSWORD</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u11" class="ax_default paragraph">
        <div id="u11_div" class=""></div>
        <div id="u11_text" class="text ">
          <p><span style="text-decoration:none;">USEREMAIL</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u12" class="ax_default paragraph">
        <div id="u12_div" class=""></div>
        <div id="u12_text" class="text ">
          <p onclick="location.href = './index.php';" id="index"><span style="text-decoration:none;">health-care centre </span></p>
        </div>
      </div>

      <!-- Unnamed (Shape) -->
      <div id="u13" class="ax_default icon">
        <img id="u13_img" class="img " src="images/login/u13.svg">
        <div id="u13_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>
    </div>
    <script src="resources/scripts/axure/ios.js"></script>
  

</form></body></html>