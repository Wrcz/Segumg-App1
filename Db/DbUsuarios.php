<?php
include('DbConnection.php');
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST["name"]))
     $name = $_POST['name'];
else {
$name="";
}

if (isset($_POST["password"]))
     $password = $_POST['password'];
else {
 $password="";
}

       try
       {
           //$conn = OpenConnection();
           $tsql = "SELECT * FROM usuarios WHERE correoelectronico = ? AND CONVERT(VARCHAR(MAX), DECRYPTBYPASSPHRASE('segumg18', contrasenia)) = ? COLLATE SQL_Latin1_General_CP1_CS_AS";
           $params = array($name,$password);
           $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
           $getuser = sqlsrv_query($conn, $tsql,$params,$options);

           if ($getuser == FALSE)
               die(FormatErrors(sqlsrv_errors()));

          $row = sqlsrv_fetch_array($getuser,SQLSRV_FETCH_ASSOC);
           $usercount = sqlsrv_num_rows($getuser);


            if ($usercount===1)
            {

              $_SESSION['name']=$row['NombreUsuario'];
              $_SESSION['email']=$row['CorreoElectronico'];
              $_SESSION['Id']=$row['IdUsuario'];
              $_SESSION['perfil']=$row['CodigoPerfil'];
              header("location: ../Paginas/Menu.php");
             }
                else
            {
              echo("No se encontró el usuario o contraseña.");
              $_SESSION['name']=NULL;
              $_SESSION['email']=NULL;
              $_SESSION['Id']=NULL;
                $_SESSION['perfil']=NULL;
               session_destroy();
              header("location: ../Paginas/Login.php");
            }
         sqlsrv_free_stmt($getuser);
           sqlsrv_close($conn);
       }
       catch(Exception $e)
       {
           echo("Error al intentar consultar en la base de datos!");
       }
 }

 ?>
