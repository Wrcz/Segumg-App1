<?php
require_once '../Clases/Proveedores_Ent.php';
require_once("../Db/DbConnection.php");

Class Proveedores_DB
{
          //Obtengo todos los empleados
          public function listar(){
              $Cls_Conn= new Conexion();
              $conn=$Cls_Conn->DevuelveConexion();

                  try {
                    if(isset($conn))
                    {
                    $tsql = "select * from Proveedores ";
                    $params = array();
                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                    $resultado = sqlsrv_query($conn, $tsql,$params,$options);

                    if ($resultado == FALSE)
                      die( print_r( sqlsrv_errors(), true));

                        while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) )
                        			{
                        				$Prov = new Proveedores();

                        				$Prov->__SET('id', $row['CodigoProveedor']);
                        				$Prov->__SET('razonsocial', $row['RazonSocial']);
                        				$Prov->__SET('nit', $row['RegistroTributrario']);
                        				$Prov->__SET('pais', $row['Pais']);
                        				$Prov->__SET('direccion',$row['Direccion']);
                        	       $Prov->__SET('telefono1', $row['Telefono1']);
                          	      $Prov->__SET('telefono2', $row['Telefono2']);

                        				$result[] = $Prov;
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

                        $tsql = "select * from proveedores where CodigoProveedor=?";
                        $params = array($id);
                        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                        $resultado = sqlsrv_query($conn, $tsql,$params,$options);

                        if ($resultado == FALSE)
                          die( print_r( sqlsrv_errors(), true));

                           $row = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC);
                            $contador = sqlsrv_num_rows($resultado);

                           $Prov = new Proveedores();
                             if ($contador>0)
                             {
                               $Prov->__SET('id', $row['CodigoProveedor']);
                               $Prov->__SET('razonsocial', $row['RazonSocial']);
                               $Prov->__SET('nit', $row['RegistroTributrario']);
                               $Prov->__SET('pais', $row['Pais']);
                               $Prov->__SET('direccion',$row['Direccion']);
                                $Prov->__SET('telefono1', $row['Telefono1']);
                                 $Prov->__SET('telefono2', $row['Telefono2']);

                                  }

                                  sqlsrv_free_stmt($resultado);
                                    sqlsrv_close($conn);
                                  return $Prov;
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

                            $tsql = "delete from proveedores where codigoproveedor=?";
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


                      public function actualizar(Proveedores $Prov){
                        $Cls_Conn= new Conexion();
                        $conn=$Cls_Conn->DevuelveConexion();

                              try {

                                if(isset($conn))
                                {

                                $tsql = "Update proveedores set RazonSocial=?,RegistroTributrario=?,Pais=?,Direccion=?,Telefono1=?,Telefono2=?  where CodigoProveedor=?";
                                $params = array($Prov->__Get('razonsocial'),$Prov->__Get('nit'),$Prov->__Get('pais'),$Prov->__Get('direccion'),$Prov->__Get('telefono1'),$Prov->__Get('telefono2'),$Prov->__Get('id'));
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


                          public function registrar(Proveedores $Prov){
                            $Cls_Conn= new Conexion();
                            $conn=$Cls_Conn->DevuelveConexion();

                                  try {

                                    if(isset($conn))
                                    {

                                    $tsql = "insert into  proveedores (RazonSocial, RegistroTributrario, Pais, Direccion, Telefono1, Telefono2) values (?,?,?,?,?,?)";
                                    $params = array($Prov->__Get('razonsocial'),$Prov->__Get('nit'),$Prov->__Get('pais'),$Prov->__Get('direccion'),$Prov->__Get('telefono1'),$Prov->__Get('telefono2'));
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
