
<?php
 header('X-Frame-Options: DENY');
// Inicializar la sesión.
// Si está usando session_name("algo"), ¡no lo olvide ahora!
session_start();

// Destruir todas las variables de sesión.
$_SESSION = array();

// Si se desea destruir la sesión completamente, borre también la cookie de sesión.
// Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruir la sesión.
session_destroy();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Inicio de Sesión </title>
  <meta name="description" content=""/>
  <meta name="keywords" content=""/>


</head>

<body>
<?php  include("master.php"); ?>
	<form name="Frm_Login"action="../Db/DbUsuarios.php" method="post" >

    		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">

    			<form class="login100-form validate-form">
    				<span class="login100-form-title p-b-37">
    					Iniciar Sesión
    				</span>

    				<div class="wrap-input100 validate-input m-b-20" data-validate="Ingrese correo electrónico">
    					<input class="input100" type="text" name="name" placeholder="correo electrónico" id="name">
    					<span class="focus-input100"></span>
    				</div>

    				<div class="wrap-input100 validate-input m-b-25" data-validate = "Ingrese la contraseña">
    					<input class="input100" type="password" name="password" placeholder="contraseña" id="password">
    					<span class="focus-input100"></span>
    				</div>

    				<div class="container-login100-form-btn">
    					<button class="login100-form-btn" type="submit" >
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

    			<!--	<div class="text-center">
    					<a href="#" class="txt2 hov1">
    						Registrarse
    					</a>
    				</div>-->
    			</form>
    		</div>

    	<div id="dropDownSelect1">

      </div>
</form>

</body>
</html>
