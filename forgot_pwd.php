<?php 
/*
 * File Name: forgot_pwd.php
 * Author: Daniel Hu
 * File Created; 2019-05-08
 * Purpose: To let the user create a new password by sending a confirmation email.
 */

include "auth.php";

include "function.php";

?>

<!DOCTYPE html>
<html>
  <head>
    <title>ForgetPassword</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="files/forgetpassword/styles.css" type="text/css" rel="stylesheet"/>
    <script src="data/document.js"></script>
    <script src="files/forgetpassword/data.js"></script>
    <script type="text/javascript">
      $axure.utils.getTransparentGifPath = function() { return 'resources/images/transparent.gif'; };
      $axure.utils.getOtherPath = function() { return 'resources/Other.html'; };
      $axure.utils.getReloadPath = function() { return 'resources/reload.html'; };
    </script>
  </head>
  <body>
  <form id='login' action='function.php' method='post' accept-charset='UTF-8'>
  	<input type='hidden' name='forget_pwd' id='forget_pwd' value='1'/>
    <div id="base" class="">

      <!-- Unnamed (Rectangle) -->
      <div id="u113" class="ax_default box_1">
        <div id="u113_div" class=""></div>
        <div id="u113_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u114" class="ax_default paragraph">
        <div id="u114_div" class=""></div>
        <div id="u114_text" class="text ">
          <p><span style="text-decoration:none;">Please enter your email address</span></p>
        </div>
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u115" class="ax_default text_field">
        <div id="u115_div" class=""></div>
        <input id="u115_input" type="text" value="" name="email" class="u115_input"/>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u116" class="ax_default button">
        <div id="u116_div" class=""></div>
        <div id="u116_text" class="text ">
          <input type='submit' name='Submit' value='Submit' />
          <!-- <p><span style="text-decoration:none;">Submit</span></p> -->
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u117" class="ax_default button">
        <div id="u117_div" class=""></div>
        <div id="u117_text" class="text ">
          <p onclick="location.href = './login.php';"><span onclick="location.href = './login.php';" style="text-decoration:none;">Back</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u118" class="ax_default link_button">
        <div id="u118_div" class=""></div>
        <div id="u118_text" class="text ">
          <p onclick="location.href = './register.php';"><span onclick="location.href = './register.php';" style="text-decoration:none;">New here?</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u119" class="ax_default paragraph">
        <div id="u119_div" class=""></div>
        <div id="u119_text" class="text ">
          <p><span style="text-decoration:none;">health-care centre </span></p>
        </div>
      </div>

      <!-- Unnamed (Shape) -->
      <div id="u120" class="ax_default icon">
        <img id="u120_img" class="img " src="images/register/u30.svg"/>
        <div id="u120_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>
    </div>
    <script src="resources/scripts/axure/ios.js"></script>
  </form>
  </body>
</html>
