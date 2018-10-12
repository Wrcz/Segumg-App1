<?php
$BASEURL="../ResponsiveT_1/";

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
			$Empl->__SET('id',  $_REQUEST['id']);
			$Empl->__SET('nombre',$_REQUEST['nombre']);
			$Empl->__SET('departamento',$_REQUEST['departamento']);
			$Empl->__SET('puesto', $_REQUEST['puesto']);
			$Empl->__SET('fechaingreso', $_REQUEST['fechaingreso']);
      $Empl->__SET('direccion', $_REQUEST['direccion']);
      $Empl->__SET('telefonocasa', $_REQUEST['telefonocasa']);
      $Empl->__SET('telefonomovil', $_REQUEST['telefonomovil']);
      $Empl->__SET('sueldo', $_REQUEST['sueldo']);
      $Empl->__SET('sexo', $_REQUEST['sexo']);


      if (strlen($_REQUEST['nombre'])==0 || strlen($_REQUEST['departamento'])==0 ||
      strlen($_REQUEST['puesto'])==0 || strlen($_REQUEST['sueldo'])==0 )
      {
        echo '<script language="javascript">';
        echo 'alert("Debe ingresar información en los campos: nombre, departamento, puesto o sueldo.")';
        echo '</script>';
        break;
      }
			$Empl_db->Actualizar($Empl);
			header('Location: Empleados.php');
			break;

		case 'registrar':
    $Empl->__SET('nombre',  $_REQUEST['nombre']);
    $Empl->__SET('departamento',$_REQUEST['departamento']);
    $Empl->__SET('puesto', $_REQUEST['puesto']);
    $Empl->__SET('fechaingreso', $_REQUEST['fechaingreso']);
    $Empl->__SET('direccion', $_REQUEST['direccion']);
    $Empl->__SET('telefonocasa', $_REQUEST['telefonocasa']);
    $Empl->__SET('telefonomovil', $_REQUEST['telefonomovil']);
    $Empl->__SET('sueldo', $_REQUEST['sueldo']);
    $Empl->__SET('sexo', $_REQUEST['sexo']);

    if (strlen($_REQUEST['nombre'])==0 || strlen($_REQUEST['departamento'])==0 ||
    strlen($_REQUEST['puesto'])==0 || strlen($_REQUEST['sueldo'])==0 )
    {
      echo '<script language="javascript">';
      echo 'alert("Debe ingresar información en los campos: nombre, departamento, puesto o sueldo.")';
      echo '</script>';
      break;
    }

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
<html >
  <head>
    <meta charset="utf-8">
    <title>Mantenimiento de Empleados</title>

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
</head>
<body >

<div class="limiter">
<div class="container-table100">
   <form  action="?action=<?php echo $Empl->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" >
      <input type="hidden" name="id" value="<?php echo  htmlentities($Empl->__GET('id')); ?>" />


       <div class="wrap-table100">
         <div class="table100">

           <div class="text-center">
             <label  style="color:white;font-size:25px;" >
               Mantenimiento de Empleados
             </label>
           </div>

                     <table>
                        <thead>
                          <tr class="table100-head">
                              <th class="column3" style="width:100%;">Nombre</th>
                              <th class="column3" style="width:160px;">Departamento</th>
                              <th class="column3" style="width:160px;">Puesto</th>
                              <th class="column3" style="width:100px;">Fecha Ingreso</th>
                              <th class="column3" style="width:160px;">Dirección</th>
                              <th class="column3" style="width:80px;">Tel. Casa</th>
                              <th class="column3" style="width:80px;">Tel. Móvil</th>
                              <th class="column3" style="width:80px;">Sueldo</th>
                              <th class="column3" style="width:80px;">Sexo</th>
                              <th class="column3"></th>
                          </tr>
                        </thead>
                          <tbody>
                          <tr>
                             <td class="column3"><input type="text" name="nombre" style="width:150px;"   value="<?php echo  htmlentities(trim($Empl->__GET('nombre'),"")); ?>"  /></td>
                             <td class="column3"><input type="text" name="departamento"  style="width:160px;" value="<?php echo  htmlentities($Empl->__GET('departamento')); ?>"  /></td>
                             <td class="column3"><input type="text" name="puesto"  style="width:160px;"  value="<?php echo  htmlentities($Empl->__GET('puesto')); ?>" /></td>
                             <td class="column3"><input type="text" name="fechaingreso"   style="width:75px;"  value="<?php echo  htmlentities($Empl->__GET('fechaingreso')); ?>"  /></td>
                             <td class="column3"><input type="text" name="direccion"   style="width:120px;"  value="<?php echo  htmlentities($Empl->__GET('direccion')); ?>"   /></td>
                             <td class="column3"> <input type="text" name="telefonocasa"  style="width:80px;"  value="<?php echo  htmlentities($Empl->__GET('telefonocasa')); ?>"  /></td>
                             <td class="column3"><input type="text" name="telefonomovil"  style="width:80px;"  value="<?php echo  htmlentities($Empl->__GET('telefonomovil')); ?>"  /></td>
                             <td class="column3"><input type="text" name="sueldo"  style="width:80px;"  value="<?php echo  htmlentities($Empl->__GET('sueldo')); ?>" /></td>
                             <td class="column3"style="width:80px;">
                                 <select name="sexo" >
                                     <option value="1" <?php echo  htmlentities($Empl->__GET('sexo')) == 'M' ? 'selected' : ''; ?>>M</option>
                                     <option value="2" <?php echo  htmlentities($Empl->__GET('sexo')) == 'F' ? 'selected' : ''; ?>>F</option>
                                 </select>
                             </td>
                             <td class="column3"><button  type="submit"  onclick="return confirm('¿Seguro que desea modificar los datos.?')">Guardar</button></td>
                         </tr>
                      </tbody>
                     </table>
                   </div>
                   </div>

     </form>

     <div class="wrap-table100">
         <div class="table100">
  <table  >
                 <thead>
                       <tr class="table100-head">
                           <th class="column7">Id</th>
                           <th class="column7">Nombre</th>
                           <th class="column7">Departamento</th>
                           <th class="column7">Puesto</th>
                           <th class="column7">Fecha Ingreso</th>
                           <th class="column7">Dirección</th>
                           <th class="column7">Tel. Casa</th>
                           <th class="column7">Tel. Móvil</th>
                           <th class="column7">Sueldo</th>
                           <th class="column7">Sexo</th>
                           <th class="column7"></th>
                           <th class="column7"></th>
                       </tr>
                     </thead>
                     <tbody>
                   <?php foreach($Empl_db->Listar() as $r): ?>
                       <tr >
                           <td class="column7" ><?php echo  htmlentities($r->__GET('id')); ?></td>
                           <td class="column7" ><?php echo  htmlentities($r->__GET('nombre')); ?></td>
                           <td class="column7"><?php echo  htmlentities($r->__GET('departamento')); ?></td>
                           <td class="column7"><?php echo  htmlentities($r->__GET('puesto')); ?></td>
                           <td class="column7"><?php echo  htmlentities($r->__GET('fechaingreso')); ?></td>
                           <td class="column7"><?php echo  htmlentities($r->__GET('direccion')); ?></td>
                           <td class="column7"><?php echo  htmlentities($r->__GET('telefonocasa')); ?></td>
                           <td class="column7"><?php echo  htmlentities($r->__GET('telefonomovil')); ?></td>
                           <td class="column7"><?php echo  htmlentities($r->__GET('sueldo')); ?></td>
                           <td class="column7"><?php echo  htmlentities($r->__GET('sexo')) == 'M' ? 'M' : 'F'; ?></td>
                           <td class="column7">
                               <a href="?action=editar&id=<?php echo  htmlentities($r->id); ?>">Editar </a>
                           </td>
                           <td class="column7">
                               <a href="?action=eliminar&id=<?php echo  htmlentities($r->id); ?>" onclick="return confirm('¿Seguro que desea eliminar el empleado seleccionado.?')" >Eliminar</a>
                           </td>
                       </tr>
                   <?php endforeach; ?>
                 </tbody>
   </table>
   <div class="text-center">
     <a href="../Paginas/Login.php"  style="color:white;" >
       Cerrar Sesión
     </a> &nbsp;
     <a href="../Paginas/Menu.php"  style="color:white;">
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
