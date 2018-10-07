<?php
include('DbConnection.php');

$id=0;
$perfil=0;
if(isset($_SESSION['Id']))
  $id=$_SESSION['Id'];

  if(isset($_SESSION['Id']))
    $perfil=$_SESSION['Id'];

       try
       {
           //$conn = OpenConnection();
           $tsql = "select c.* from usuarios a inner join Perfil_MenuOpciones b on a.CodigoPerfil=b.CodigoPerfil inner join MenuOpciones c on c.idObjetoMenu=b.IdObjetoMenu where a.IdUsuario=' $id ' COLLATE SQL_Latin1_General_CP1_CS_AS order by orden";
           $params = array();
           $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
           $getmenu = sqlsrv_query($conn, $tsql,$params,$options);

           if ($getmenu == FALSE)
               die(FormatErrors(sqlsrv_errors()));

        //  $row = sqlsrv_fetch_array($getmenu,SQLSRV_FETCH_ASSOC);
        //   $usercount = sqlsrv_num_rows($getmenu);

while( $row = sqlsrv_fetch_array( $getmenu, SQLSRV_FETCH_ASSOC) ) {
  ?>
  <div class="container-login100-form-btn">
    <a href=" <?php echo($row['NombrePagina']); ?>"  class="login100-form-btn"> <?php echo($row['TituloObjeto']); ?></a>
  </div>
</br>
<?php
           }

         sqlsrv_free_stmt($getmenu);
           sqlsrv_close($conn);
       }
       catch(Exception $e)
       {
           echo("Error al intentar consultar en la base de datos!");
       }


 ?>
