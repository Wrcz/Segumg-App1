<?php
//Creo Conexión
require_once ("../Clases/EncriptDecript.php");
Class Conexion{

  Public function DevuelveConexion()
  {
    try {

      $encr=new EncriptDecript();
      $pass="UUQAKVNjAicHYAwzD2NcZglhVmJSPQ==";
      $ConStr="UXAALVNuAiAHdwwoDzhceQllViFScwQxUiUHJQA4BC9UcgI9BSQAawZ3UmUAagAjWDxXNVBjBDZacgx+AG0HfFEuAC9TZwIhB3MMOw9wXCQJZFYyUnEENVI1B2QAdgRqVCgCKQU9AD8GYFJvAHoAJVh/VzxQYgQgWnMMPwAxBz9RMABnUyICFwdkDCoPY1xoCWFWIFJgBHRSagclAHYEflRqAnMFJAA5BnQ=";
      $Serv="UXcAP1NyAmkHdgw7D2VcfwltVjRSYQQ2UnoHdQBtBH9UKwItBTEAIwZyUmUAfwB4WDVXM1BzBDVaPQxvAHYHaVEtACtTawI9B2EMMQ91XHkJLlY9UmAEIFJ7BzQAMQQ8VDU=";

      $conn = new PDO($encr->decryption($ConStr), "segumg",$encr->decryption( $pass) );
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Conexion con SQL Server
    $connectionInfo = array("UID" => "segumg@segumgdb-php-server", "pwd" => $encr->decryption( $pass), "Database" => "sql-php", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
    $serverName = $encr->decryption($Serv);
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    return $conn;
  }
  catch (PDOException $e) {
      echo ("No se pudo establecer la conexion con la base de datos.");
      die(print_r($e));
  }
}
}
?>
