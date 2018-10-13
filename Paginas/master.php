<?php
 header('X-Frame-Options: DENY');
    $BASEURL="../";
     $ds = DIRECTORY_SEPARATOR;
     $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
 ?>
 <!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en" dir="ltr">
  <head>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Master Page</title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href=<?php echo $BASEURL ."images/icons/favicon.ico";?>>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href=<?php echo $BASEURL. "vendor/bootstrap/css/bootstrap.min.css";?>>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href=<?php echo $BASEURL."fonts/font-awesome-4.7.0/css/font-awesome.min.css";?>>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href=<?php echo $BASEURL."fonts/iconic/css/material-design-iconic-font.min.css";?>>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href=<?php echo $BASEURL."vendor/animate/animate.css";?>>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href=<?php echo $BASEURL."vendor/css-hamburgers/hamburgers.min.css";?>>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href=<?php echo $BASEURL."vendor/animsition/css/animsition.min.css";?>>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href=<?php echo $BASEURL."vendor/select2/select2.min.css";?>>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href=<?php echo $BASEURL."vendor/daterangepicker/daterangepicker.css";?>>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href=<?php echo $BASEURL."vendor/perfect-scrollbar/perfect-scrollbar.css";?>>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href=<?php echo $BASEURL."css/util.css";?>>
  <link rel="stylesheet" type="text/css" href=<?php echo $BASEURL."css/main.css";?>>
  <!--===============================================================================================-->
  </head>
  <body class="container-login100" style="background-image: url(<?php echo $BASEURL.'images/bg-01.jpg';?>);">

  </body>
  <!--===============================================================================================-->
    <script src=<?php echo $BASEURL."vendor/jquery/jquery-3.2.1.min.js";?>></script>
  <!--===============================================================================================-->
    <script src=<?php echo $BASEURL."vendor/animsition/js/animsition.min.js";?>></script>
  <!--===============================================================================================-->
    <script src=<?php echo $BASEURL."vendor/bootstrap/js/popper.js";?>></script>
    <script src=<?php echo $BASEURL."vendor/bootstrap/js/bootstrap.min.js";?>></script>
  <!--===============================================================================================-->
    <script src=<?php echo $BASEURL."vendor/select2/select2.min.js";?>></script>
  <!--===============================================================================================-->
    <script src=<?php echo $BASEURL."vendor/daterangepicker/moment.min.js";?>></script>
    <script src=<?php echo $BASEURL."vendor/daterangepicker/daterangepicker.js";?>></script>
  <!--===============================================================================================-->
    <script src=<?php echo $BASEURL."vendor/countdowntime/countdowntime.js";?>></script>
  <!--===============================================================================================-->
    <script src=<?php echo $BASEURL."js/main.js";?>></script>

</html>
