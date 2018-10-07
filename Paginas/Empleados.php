<?php
include("master.php");
require_once '../Clases/Empleado_Ent.php';
require_once '../Db/DbEmpleados.php';

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
$Empl = new Empleados();
$Empl_db = new Empleados_DB();

if(isset($_REQUEST['action']))
{

	switch($_REQUEST['action'])
	{

		case 'actualizar':
			$Empl->__SET('id',              $_REQUEST['id']);
			$Empl->__SET('nombre',          $_REQUEST['nombre']);
			$Empl->__SET('departamento',        $_REQUEST['departamento']);
			$Empl->__SET('puesto',            $_REQUEST['puesto']);
			$Empl->__SET('fechaingreso', $_REQUEST['fechaingreso']);
      $Empl->__SET('direccion', $_REQUEST['direccion']);
      $Empl->__SET('telefonocasa', $_REQUEST['telefonocasa']);
      $Empl->__SET('telefonomovil', $_REQUEST['telefonomovil']);
      $Empl->__SET('sueldo', $_REQUEST['sueldo']);
      $Empl->__SET('sexo', $_REQUEST['sexo']);

			$Empl_db->Actualizar($Empl);
			header('Location: Empleados.php');
			break;

		case 'registrar':
    $Empl->__SET('nombre',          $_REQUEST['nombre']);
    $Empl->__SET('departamento',        $_REQUEST['departamento']);
    $Empl->__SET('puesto',            $_REQUEST['puesto']);
    $Empl->__SET('fechaingreso', $_REQUEST['fechaingreso']);
    $Empl->__SET('direccion', $_REQUEST['direccion']);
    $Empl->__SET('telefonocasa', $_REQUEST['telefonocasa']);
    $Empl->__SET('telefonomovil', $_REQUEST['telefonomovil']);
    $Empl->__SET('sueldo', $_REQUEST['sueldo']);
    $Empl->__SET('sexo', $_REQUEST['sexo']);

			$Empl_db->registrar($Empl);
			header('Location: Empleados.php');
			break;

		case 'eliminar':
			$Empl_db->eliminar($_REQUEST['id']);
			header('Location: Empleados.php');
			break;

		case 'editar':
			$Empl = $Empl_db->obtener($_REQUEST['id']);
			break;
	}
}


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mantenimiento de Empleados</title>
     <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
       <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body >

<div class="wrap-man100">
<span class="login100-form-title p-b-37"> Mantenimiento de Empleados </span>
<div class="pure-g">
 <div class="pure-u-1-12">

   <form  action="?action=<?php echo $Empl->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form  pure-form-stacked " style="margin-bottom:10px;">
                     <input type="hidden" name="id" value="<?php echo $Empl->__GET('id'); ?>" />
                     <table style="width:1300px;">
                         <tr>
                             <th style="text-align:left;" >Nombre</th>
                             <td><input type="text" name="nombre"  style="width:90%;" value="<?php echo $Empl->__GET('nombre'); ?>" /></td>

                             <th >Departamento</th>
                             <td><input type="text" name="departamento" value="<?php echo $Empl->__GET('departamento'); ?>"  /></td>

                             <th >Puesto</th>
                             <td><input type="text" name="puesto" value="<?php echo $Empl->__GET('puesto'); ?>" /></td>

                             <th >Fecha Ingreso</th>
                             <td><input type="text" name="fechaingreso"  value="<?php echo $Empl->__GET('fechaingreso'); ?>"  /></td>
                           </tr>
                           <tr>
                             <th style="text-align:left;" >Dirección</th>
                             <td><input type="text" name="direccion" style="width:90%;" value="<?php echo $Empl->__GET('direccion'); ?>"  /></td>

                             <th >Teléfono Casa</th>
                             <td><input type="text" name="telefonocasa" value="<?php echo $Empl->__GET('telefonocasa'); ?>" /></td>

                             <th >Teléfono Móvil</th>
                             <td><input type="text" name="telefonomovil" value="<?php echo $Empl->__GET('telefonomovil'); ?>" /></td>

                             <th >Sueldo</th>
                             <td><input type="text" name="sueldo" value="<?php echo $Empl->__GET('sueldo'); ?>" /></td>

                           </tr>
                           <tr>
                             <th >Sexo</th>
                             <td>
                                 <select name="sexo" style="width:90%;">
                                     <option value="1" <?php echo $Empl->__GET('sexo') == 'M' ? 'selected' : ''; ?>>Masculino</option>
                                     <option value="2" <?php echo $Empl->__GET('sexo') == 'F' ? 'selected' : ''; ?>>Femenino</option>
                                 </select>
                             </td>

                             <th></th>
                             <td><button style="width:100%;" type="submit" class="pure-button pure-button-primary">Guardar</button></td>
                         </tr>

                     </table>
     </form>


<div class="table-content-class">

 <table class="pure-table pure-table-horizontal" >
                  <thead>
                      <tr>
                          <th style="text-align:left;">Id</th>
                          <th style="text-align:left;">Nombre</th>
                          <th style="text-align:left;">Departamento</th>
                          <th style="text-align:left;">Puesto</th>
                          <th style="text-align:left;">FechaIngreso</th>
                          <th style="text-align:left;">Dirección</th>
                          <th style="text-align:left;">TelefonoCasa</th>
                          <th style="text-align:left;">TelefonoMovil</th>
                          <th style="text-align:left;">Sueldo</th>
                          <th style="text-align:left;">Sexo</th>
                          <th></th>
                          <th></th>
                      </tr>
                  </thead>
                  <?php foreach($Empl_db->Listar() as $r): ?>
                      <tr>
                          <td><?php echo $r->__GET('id'); ?></td>
                          <td><?php echo $r->__GET('nombre'); ?></td>
                          <td><?php echo $r->__GET('departamento'); ?></td>
                          <td><?php echo $r->__GET('puesto'); ?></td>
                          <td><?php echo $r->__GET('fechaingreso'); ?></td>
                          <td><?php echo $r->__GET('direccion'); ?></td>
                          <td><?php echo $r->__GET('telefonocasa'); ?></td>
                          <td><?php echo $r->__GET('telefonomovil'); ?></td>
                          <td><?php echo $r->__GET('sueldo'); ?></td>
                          <td><?php echo $r->__GET('sexo') == 'M' ? 'M' : 'F'; ?></td>

                          <td>
                              <a href="?action=editar&id=<?php echo $r->id; ?>">Editar</a>
                          </td>
                          <td>
                              <a href="?action=eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
                          </td>
                      </tr>
                  <?php endforeach; ?>
  </table>

  </div>
    </div>
    </div>
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
