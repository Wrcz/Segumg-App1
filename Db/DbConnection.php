<?php
    try {
        $conn = new PDO("sqlsrv:server = tcp:segumgdb-php-server.database.windows.net,1433; Database = sql-php", "segumg", "Guatemala18");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        print("No se pudo establecer la conexion con la base de datos.");
        die(print_r($e));
    }
    // Conexion con SQL Server
    $connectionInfo = array("UID" => "segumg@segumgdb-php-server", "pwd" => "Guatemala18", "Database" => "sql-php", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
    $serverName = "tcp:segumgdb-php-server.database.windows.net,1433";
    $conn = sqlsrv_connect($serverName, $connectionInfo);
  
 ?>
