<?php

$BASEURL="../";

require_once '../Clases/Proveedores_Ent.php';
require_once '../Db/DbProveedores.php';

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

<?php
// Logica
$Prov = new Proveedores();
$Prov_db = new Proveedores_DB();

if(isset($_REQUEST['action']))
{

	switch($_REQUEST['action'])
	{

		case 'actualizar':
			$Prov->__SET('id',  $_REQUEST['id']);
			$Prov->__SET('razonsocial',$_REQUEST['razonsocial']);
			$Prov->__SET('nit',$_REQUEST['nit']);
			$Prov->__SET('pais', $_REQUEST['pais']);
			$Prov->__SET('direccion', $_REQUEST['direccion']);
      $Prov->__SET('telefono1', $_REQUEST['telefono1']);
      $Prov->__SET('telefono2', $_REQUEST['telefono2']);

      if (strlen($_REQUEST['razonsocial'])==0 || strlen($_REQUEST['nit'])==0 ||
      strlen($_REQUEST['direccion'])==0 || strlen($_REQUEST['telefono1'])==0 )
      {
        echo '<script language="javascript">';
        echo 'alert("Debe ingresar información en los campos: Razon social, Nit., direccion y télefono.")';
        echo '</script>';
        break;
      }
			$Prov_db->Actualizar($Prov);
			header('Location: Proveedores.php');
			break;

		case 'registrar':
    $Prov->__SET('razonsocial',$_REQUEST['razonsocial']);
    $Prov->__SET('nit',$_REQUEST['nit']);
    $Prov->__SET('pais', $_REQUEST['pais']);
    $Prov->__SET('direccion', $_REQUEST['direccion']);
    $Prov->__SET('telefono1', $_REQUEST['telefono1']);
    $Prov->__SET('telefono2', $_REQUEST['telefono2']);

    if (strlen($_REQUEST['razonsocial'])==0 || strlen($_REQUEST['nit'])==0 ||
    strlen($_REQUEST['direccion'])==0 || strlen($_REQUEST['telefono1'])==0 )
    {
      echo '<script language="javascript">';
      echo 'alert("Debe ingresar información en los campos: Razon social, Nit., direccion y télefono.")';
      echo '</script>';
      break;
    }

			$Prov_db->registrar($Prov);
			header('Location: Proveedores.php');
  		break;

		case 'eliminar':
			$Prov_db->eliminar($_REQUEST['id']);
			header('Location: Proveedores.php');
			break;

		case 'editar':
			$Prov = $Prov_db->obtener($_REQUEST['id']);
			break;
	}
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mantenimiento de Proveedores</title>
     <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">

      <link rel="stylesheet" type="text/css" href=<?php echo $BASEURL."css/responsivetables2.css";?>>
       <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body >
   <?php include("master.php"); ?>
   <span class="login100-form-title p-b-37"> Mantenimiento de Proveedores </span>
   <form  action="?action=<?php echo $Prov->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post"  style="margin-bottom:10px;">
                     <input type="hidden" name="id" value="<?php echo $Prov->__GET('id'); ?>" />

                     <table class="rwd-table" >
                         <tr>
                             <th >Razon Social</th>
                             <td><input type="text" name="razonsocial"   value="<?php echo $Prov->__GET('razonsocial'); ?>" /></td>

                             <th >Registro Tributario</th>
                             <td><input type="text" name="nit" value="<?php echo $Prov->__GET('nit'); ?>"  /></td>

                             <th >Pais</th>
                             <td><input type="text" name="pais" value="<?php echo $Prov->__GET('pais'); ?>" /></td>

                             <th >Dirección</th>
                             <td><input type="text" name="direccion"  value="<?php echo $Prov->__GET('direccion'); ?>"  /></td>
                           </tr>
                           <tr>
                             <th  >Teléfono 1</th>
                             <td><input type="text" name="telefono1"  value="<?php echo $Prov->__GET('telefono2'); ?>"  /></td>

                             <th >Teléfono 2</th>
                             <td><input type="text" name="telefono2" value="<?php echo $Prov->__GET('telefono2'); ?>" /></td>

                             <td><button style="width:100%;" type="submit" class="pure-button pure-button-primary" onclick="return confirm('¿Seguro que desea modificar los datos.?')">Guardar</button></td>
                         </tr>
                     </table>
     </form>

 <table class="rwd-table" >
                  <tbody>
                      <tr>
                          <th style="text-align:center;">Id</th>
                          <th style="text-align:center;">Razon Social</th>
                          <th style="text-align:center;">Registro Trib.</th>
                          <th style="text-align:center;">Pais</th>
                          <th style="text-align:center;">Dirección</th>
                          <th style="text-align:center;">Teléfono 1</th>
                          <th style="text-align:center;">Teléfono 2</th>


                          <th></th>
                          <th></th>
                      </tr>

                  <?php foreach($Prov_db->Listar() as $r): ?>
                      <tr>
                          <td><?php echo $r->__GET('id'); ?></td>
                          <td><?php echo $r->__GET('razonsocial'); ?></td>
                          <td><?php echo $r->__GET('nit'); ?></td>
                          <td><?php echo $r->__GET('pais'); ?></td>
                          <td><?php echo $r->__GET('direccion'); ?></td>
                          <td><?php echo $r->__GET('telefono1'); ?></td>
                          <td><?php echo $r->__GET('telefono2'); ?></td>
                          <td>
                              <a href="?action=editar&id=<?php echo $r->id; ?>">Editar</a>
                          </td>
                          <td>
                              <a href="?action=eliminar&id=<?php echo $r->id; ?>" onclick="return confirm('¿Seguro que desea eliminar el proveedor seleccionado.?')" >Eliminar</a>
                          </td>
                      </tr>
                  <?php endforeach; ?>
                </tbody>
  </table>

    <div class="text-center">
      <a href="../Paginas/Login.php" class="txt2 hov1">
        Cerrar Sesión
      </a> &nbsp;
      <a href="../Paginas/Menu.php" class="txt2 hov1">
        Menu Principal
      </a>
    </div>


  </body>
</html>
