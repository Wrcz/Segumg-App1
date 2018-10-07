// PHP Data Objects(PDO) Sample Code:
<?php

// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:segumgdb-php-server.database.windows.net,1433; Database = sql-php", "segumg", "Guatemala18");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "segumg@segumgdb-php-server", "pwd" => "Guatemala18", "Database" => "sql-php", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:segumgdb-php-server.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

?>
