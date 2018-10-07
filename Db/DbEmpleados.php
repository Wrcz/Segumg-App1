<?php
require_once '../Clases/Empleado_Ent.php';
require_once("../Db/DbConnection.php");

Class Empleados_DB
{
          //Obtengo todos los empleados
          public function listar(){
              $Cls_Conn= new Conexion();
              $conn=$Cls_Conn->DevuelveConexion();

                  try {
                    if(isset($conn))
                    {
                    $tsql = "select * from Empleados ";
                    $params = array();
                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                    $resultado = sqlsrv_query($conn, $tsql,$params,$options);

                    if ($resultado == FALSE)
                      die( print_r( sqlsrv_errors(), true));

                        while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) )
                        			{
                        				$Empl = new Empleados();

                        				$Empl->__SET('id', $row['CodigoEmpleado']);
                        				$Empl->__SET('nombre', $row['NombreEmpleado']);
                        				$Empl->__SET('departamento', $row['Departamento']);
                        				$Empl->__SET('puesto', $row['Puesto']);
                        				$Empl->__SET('fechaingreso',$row['FechaIngreso']->format('Y-m-d'));
                        	       $Empl->__SET('direccion', $row['Direccion']);
                          	      $Empl->__SET('telefonocasa', $row['TelefonoCasa']);
                            	     $Empl->__SET('telefonomovil', $row['TelefonoMovil']);
                              	    $Empl->__SET('sueldo', $row['Sueldo']);
                                	$Empl->__SET('sexo', $row['Sexo']);

                        				$result[] = $Empl;
                        			}

                              sqlsrv_free_stmt($resultado);
                                sqlsrv_close($conn);
                        			return $result;
                }

                    } catch (\Exception $e) {
                      echo ($e->getMessage());
                      die($e->getMessage());
                    }
              }


              //Obtengo todos los empleados
              public function obtener($id){
                $Cls_Conn= new Conexion();
                $conn=$Cls_Conn->DevuelveConexion();

                      try {
                        if(isset($conn))
                        {

                        $tsql = "select * from Empleados where codigoempleado=?";
                        $params = array($id);
                        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                        $resultado = sqlsrv_query($conn, $tsql,$params,$options);

                        if ($resultado == FALSE)
                          die( print_r( sqlsrv_errors(), true));

                           $row = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC);
                            $contador = sqlsrv_num_rows($resultado);

                           $Empl = new Empleados();
                             if ($contador>0)
                             {
                                    $Empl->__SET('id', $row['CodigoEmpleado']);
                                    $Empl->__SET('nombre', $row['NombreEmpleado']);
                                    $Empl->__SET('departamento', $row['Departamento']);
                                    $Empl->__SET('puesto', $row['Puesto']);
                                    $Empl->__SET('fechaingreso',$row['FechaIngreso']->format('Y-m-d'));
                                     $Empl->__SET('direccion', $row['Direccion']);
                                      $Empl->__SET('telefonocasa', $row['TelefonoCasa']);
                                       $Empl->__SET('telefonomovil', $row['TelefonoMovil']);
                                        $Empl->__SET('sueldo', $row['Sueldo']);
                                      $Empl->__SET('sexo', $row['Sexo']);
                                  }

                                  sqlsrv_free_stmt($resultado);
                                    sqlsrv_close($conn);
                                  return $Empl;
                    }}

                         catch (\Exception $e)
                         {
                          die($e->getMessage());
                        }
                  }


                  public function eliminar($id){
                    $Cls_Conn= new Conexion();
                    $conn=$Cls_Conn->DevuelveConexion();

                          try {
                            if(isset($conn))
                            {

                            $tsql = "delete from Empleados where codigoempleado=?";
                            $params = array($id);
                            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                            $resultado = sqlsrv_query($conn, $tsql,$params,$options);

                            if ($resultado == FALSE)
                              die( print_r( sqlsrv_errors(), true));

                                      sqlsrv_free_stmt($resultado);
                                        sqlsrv_close($conn);
                              }}

                             catch (\Exception $e)
                             {
                              die($e->getMessage());
                            }
                      }


                      public function actualizar(Empleados $Emp){
                        $Cls_Conn= new Conexion();
                        $conn=$Cls_Conn->DevuelveConexion();

                              try {

                                if(isset($conn))
                                {

                                $tsql = "Update Empleados set nombreempleado=?,departamento=?,puesto=?,fechaingreso=?,direccion=?,telefonocasa=?,telefonomovil=?,sueldo=?  where codigoempleado=?";
                                $params = array($Emp->__Get('nombre'),$Emp->__Get('departamento'),$Emp->__Get('puesto'),$Emp->__Get('fechaingreso'),$Emp->__Get('direccion'),$Emp->__Get('telefonocasa'),$Emp->__Get('telefonomovil'),$Emp->__Get('sueldo'),$Emp->__Get('sexo'),$Emp->__Get('id'));
                                $resultado = sqlsrv_query($conn, $tsql,$params);

                                if ($resultado == FALSE)
                                  die( print_r( sqlsrv_errors(), true));

                                          sqlsrv_free_stmt($resultado);
                                            sqlsrv_close($conn);
                            }}

                                 catch (\Exception $e)
                                 {

                                  die($e->getMessage());
                                }
                          }


                          public function registrar(Empleados $Emp){
                            $Cls_Conn= new Conexion();
                            $conn=$Cls_Conn->DevuelveConexion();

                                  try {

                                    if(isset($conn))
                                    {

                                    $tsql = "insert into  Empleados (NombreEmpleado, Departamento, Puesto, FechaIngreso, Direccion, TelefonoCasa, TelefonoMovil, Sueldo, Sexo) values (?,?,?,?,?,?,?,?,?)";
                                    $params = array($Emp->__Get('nombre'),$Emp->__Get('departamento'),$Emp->__Get('puesto'),$Emp->__Get('fechaingreso'),$Emp->__Get('direccion'),$Emp->__Get('telefonocasa'),$Emp->__Get('telefonomovil'),$Emp->__Get('sueldo'),$Emp->__Get('sexo'),$Emp->__Get('id'));
                                    $resultado = sqlsrv_query($conn, $tsql,$params);

                                    if ($resultado == FALSE)
                                      die( print_r( sqlsrv_errors(), true));

                                              sqlsrv_free_stmt($resultado);
                                                sqlsrv_close($conn);
                                }}

                                     catch (\Exception $e)
                                     {
                                      die($e->getMessage());
                                    }
                              }

}
 ?>
