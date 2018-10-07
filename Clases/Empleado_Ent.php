<?php
/**
 *
 */
class Empleados
{
  private $id;
  private $nombre;
  private $departamento;
  private $puesto;
  private $fechaingreso;
  Private $direccion;
  Private $telefonocasa;
  Private $telefonomovil;
  Private $sueldo;
  Private $sexo;

  public function __GET($k){ return $this->$k; }
  public function __SET($k, $v){ return $this->$k = $v; }

}

 ?>
