<?php
class Proveedores
{
private $id;
private $razonsocial;
private $nit;
private $pais;
private $direccion;
private $telefono1;
private $telefono2;

  public function __GET($k){ return $this->$k; }
  public function __SET($k, $v){ return $this->$k = $v; }
}
?>
