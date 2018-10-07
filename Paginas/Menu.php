<?php
session_start();
if(isset($_SESSION['Id']))
{
  if (  $_SESSION['Id']==NULL)
  {
    header("location: ../Paginas/Login.php");
  }
 }
else
    header("location: ../Paginas/Login.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Menu Principal</title>
  </head>
  <body>
 <?php include("master.php"); ?>
<!-- -->
   <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">

<span class="login100-form-title p-b-37"> Menu Principal </span>
 <form name="Frm_Menu" >
 <?php include("../Db/DbMenu.php"); ?>
 <div class="text-center p-t-57 p-b-20">
   <span class="txt1">
     <?php echo($_SESSION['name']); ?>
   </span>
 </div>
 <div class="text-center">
   <a href="../Paginas/Login.php" class="txt2 hov1">
     Cerrar Sesión
   </a>
 </div>
 </form>

 </div>

  </body>
</html>
