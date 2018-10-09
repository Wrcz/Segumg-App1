<?php
$BASEURL="../ResponsiveT_1/";
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
    <link rel="icon" type="image/png" href=<?php echo $BASEURL ."images/icons/favicon.ico";?>>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href=<?php echo $BASEURL. "vendor/bootstrap/css/bootstrap.min.css";?>>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href=<?php echo $BASEURL."fonts/font-awesome-4.7.0/css/font-awesome.min.css";?>>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href=<?php echo $BASEURL."vendor/animate/animate.css";?>>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href=<?php echo $BASEURL."vendor/select2/select2.min.css";?>>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href=<?php echo $BASEURL."vendor/perfect-scrollbar/perfect-scrollbar.css";?>>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href=<?php echo $BASEURL."css/util.css";?>>
    <link rel="stylesheet" type="text/css" href=<?php echo $BASEURL."css/main.css";?>>
     <meta name="viewport" content="width=device-width, initial-scale=1">
       <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body >

   <div class="limiter">
   <div class="container-table100">

   <form  action="?action=<?php echo $Prov->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post"  >
                     <input type="hidden" name="id" value="<?php echo $Prov->__GET('id'); ?>" />

                     <div class="wrap-table100">
                       <div class="table100">

                         <div class="text-center">
                           <label  style="color:white;font-size:25px;" >
                             Mantenimiento de Proveedores
                           </label>
                         </div>
                     <table >
                       <thead>
                         <tr class="table100-head">
                             <th class="column3" >Razon Social</th>
                             <th class="column3">Registro Tributario</th>
                             <th class="column3">Pais</th>
                             <th class="column3">Dirección</th>
                             <th class="column3">Teléfono 1</th>
                             <th class="column3">Teléfono 2</th>
                             <th class="column3"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                             <td><input type="text" name="razonsocial"   value="<?php echo $Prov->__GET('razonsocial'); ?>" /></td>
                             <td><input type="text" name="nit" value="<?php echo $Prov->__GET('nit'); ?>"  /></td>
                             <td><input type="text" name="pais" value="<?php echo $Prov->__GET('pais'); ?>" /></td>
                             <td><input type="text" name="direccion"  value="<?php echo $Prov->__GET('direccion'); ?>"  /></td>
                             <td><input type="text" name="telefono1"  value="<?php echo $Prov->__GET('telefono2'); ?>"  /></td>
                             <td><input type="text" name="telefono2" value="<?php echo $Prov->__GET('telefono2'); ?>" /></td>
                             <td><button  type="submit" class="pure-button pure-button-primary" onclick="return confirm('¿Seguro que desea modificar los datos.?')">Guardar</button></td>
                         </tr>
                     </table>
                   </div>
                   </div>
     </form>

     <div class="wrap-table100">
         <div class="table100">
 <table >
                  <thead>
                      <tr  class="table100-head">
                          <th class="column7" >Id</th>
                          <th class="column7" >Razon Social</th>
                          <th class="column7" >Registro Trib.</th>
                          <th class="column7" >Pais</th>
                          <th class="column7" >Dirección</th>
                          <th class="column7" >Teléfono 1</th>
                          <th class="column7">Teléfono 2</th>
                          <th class="column7"></th>
                          <th class="column7"></th>
                      </tr>
                    </thead>
<tbody>
                  <?php foreach($Prov_db->Listar() as $r): ?>
                      <tr>
                          <td class="column7" ><?php echo $r->__GET('id'); ?></td>
                          <td class="column7" ><?php echo $r->__GET('razonsocial'); ?></td>
                          <td class="column7" ><?php echo $r->__GET('nit'); ?></td>
                          <td class="column7" ><?php echo $r->__GET('pais'); ?></td>
                          <td class="column7" ><?php echo $r->__GET('direccion'); ?></td>
                          <td class="column7" ><?php echo $r->__GET('telefono1'); ?></td>
                          <td class="column7" ><?php echo $r->__GET('telefono2'); ?></td>
                          <td class="column7" >
                              <a href="?action=editar&id=<?php echo $r->id; ?>">Editar</a>
                          </td>
                          <td class="column7" >
                              <a href="?action=eliminar&id=<?php echo $r->id; ?>" onclick="return confirm('¿Seguro que desea eliminar el proveedor seleccionado.?')" >Eliminar</a>
                          </td>
                      </tr>
                  <?php endforeach; ?>
                </tbody>
  </table>

    <div class="text-center">
      <a href="../Paginas/Login.php" style="color:white;">
        Cerrar Sesión
      </a> &nbsp;
      <a href="../Paginas/Menu.php" style="color:white;">
        Menu Principal
      </a>
    </div>

  </div>
  </div>
 </div>
 </div>

 <!--===============================================================================================-->
   <script src=<?php echo $BASEURL."vendor/jquery/jquery-3.2.1.min.js";?>></script>
   <!--===============================================================================================-->
     <script src=<?php echo $BASEURL."vendor/bootstrap/js/popper.js";?>></script>
     <script src=<?php echo $BASEURL."vendor/bootstrap/js/bootstrap.min.js";?>></script>
     <!--===============================================================================================-->
       <script src=<?php echo $BASEURL."vendor/select2/select2.min.js";?>></script>

  </body>
</html>
