<?php
//Creo Conexión
    try {
      $pass="UUQAKVNjAicHYAwzD2NcZglhVmJSPQ==";
      $ConStr="UXAALVNuAiAHdwwoDzhceQllViFScwQxUiUHJQA4BC9UcgI9BSQAawZ3UmUAagAjWDxXNVBjBDZacgx+AG0HfFEuAC9TZwIhB3MMOw9wXCQJZFYyUnEENVI1B2QAdgRqVCgCKQU9AD8GYFJvAHoAJVh/VzxQYgQgWnMMPwAxBz9RMABnUyICFwdkDCoPY1xoCWFWIFJgBHRSagclAHYEflRqAnMFJAA5BnQ=";
      $Serv="UXcAP1NyAmkHdgw7D2VcfwltVjRSYQQ2UnoHdQBtBH9UKwItBTEAIwZyUmUAfwB4WDVXM1BzBDVaPQxvAHYHaVEtACtTawI9B2EMMQ91XHkJLlY9UmAEIFJ7BzQAMQQ8VDU=";

        $conn = new PDO(decryption($ConStr), "segumg",decryption( $pass) );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        print("No se pudo establecer la conexion con la base de datos.");
        die(print_r($e));
    }
    // Conexion con SQL Server
    $connectionInfo = array("UID" => "segumg@segumgdb-php-server", "pwd" => decryption( $pass), "Database" => "sql-php", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
    $serverName = decryption($Serv);
    $conn = sqlsrv_connect($serverName, $connectionInfo);
 ?>

 <?php
 function keyED($txt,$encrypt_key) {
       $encrypt_key = md5($encrypt_key);
       $ctr=0;
       $tmp = "";
       for ($i=0;$i<strlen($txt);$i++)
       {
       if ($ctr==strlen($encrypt_key)) $ctr=0;
       $tmp.= substr($txt,$i,1) ^ substr($encrypt_key,$ctr,1);
       $ctr++;
       }
       return $tmp;
 }

 function encryption($txt, $sub = 0, $start = 3) {
      //$key = $this->encryption_key;
      $key = "hihuihuihiuhuh";

      if($sub)$key = substr($key, $start, $sub);

      srand((double)microtime()*1000000);

      $encrypt_key = md5(rand(0,32000));
      $encrypt_key = md5(9265);
      $ctr=0;
      $tmp = "";
      for ($i=0;$i<strlen($txt);$i++)
      {
      if ($ctr==strlen($encrypt_key)) $ctr=0;
      $tmp.= substr($encrypt_key,$ctr,1) .
      (substr($txt,$i,1) ^ substr($encrypt_key,$ctr,1));
      $ctr++;
      }
      //return keyED($tmp,$key);
      $a = keyED($tmp,$key);
      return base64_encode($a);
}

function decryption($txt, $sub = 0, $start = 3) {
      //$key = $this->encryption_key;
      $key = "hihuihuihiuhuh";

      if($sub)$key = substr($key, $start, $sub);
      $txt = base64_decode($txt);
      $txt = keyED($txt,$key);       //
      $tmp = "";
      for ($i=0;$i<strlen($txt);$i++)
      {
      $md5 = substr($txt,$i,1);
      $i++;
      $tmp.= (substr($txt,$i,1) ^ $md5);
      }
      return $tmp;
}

  ?>
