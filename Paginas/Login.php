<?php
     $ds = DIRECTORY_SEPARATOR;
     $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
    //require_once("{$base_dir}Db{$ds}DbConnection.php");  //Error Fatal
//echo phpinfo();
    $file = "{$base_dir}Db{$ds}DbConnection.php";
     INclude_once($file);  //Advertencia

    //$BASEURL ="/Segumg-App1/" ;
    $BASEURL="/";

Ñ  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Inicio de Sesión -DEV </title>
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
<link rel="stylesheet" type="text/css" href=<?php echo $BASEURL."css/util.css";?>>
<link rel="stylesheet" type="text/css" href=<?php echo $BASEURL."css/main.css";?>>
<!--===============================================================================================-->

</head>

<body>

	<form name="Frm_Login"action="" method="post" >

    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
    		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
    			<form class="login100-form validate-form">
    				<span class="login100-form-title p-b-37">
    					Iniciar Sesión
    				</span>

    				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
    					<input class="input100" type="text" name="username" placeholder="username or email">
    					<span class="focus-input100"></span>
    				</div>

    				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
    					<input class="input100" type="password" name="pass" placeholder="password">
    					<span class="focus-input100"></span>
    				</div>

    				<div class="container-login100-form-btn">
    					<button class="login100-form-btn">
    						Ingresar
    					</button>
    				</div>

    				<div class="text-center p-t-57 p-b-20">
    					<span class="txt1">
    						Iniciar con
    					</span>
    				</div>

    				<div class="flex-c p-b-112">
    					<a href="#" class="login100-social-item">
    						<i class="fa fa-facebook-f"></i>
    					</a>

    					<a href="#" class="login100-social-item">
    						<img src=<?php echo $BASEURL."images/icons/icon-google.png" ;?> alt="GOOGLE">
    					</a>
    				</div>

    				<div class="text-center">
    					<a href="#" class="txt2 hov1">
    						Registrarse
    					</a>
    				</div>
    			</form>


    		</div>
    	</div>



    	<div id="dropDownSelect1"></div>

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

	</form>




</body>
</html>
