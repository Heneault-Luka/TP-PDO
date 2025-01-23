<?php
$hostnom = 'host=srvmysql.btssio.dedyn.io';
$usernom = 'HENEAUL';
$password = '18102006';
$bdd = 'HENEAULT_Biblio';

try {
    $monPdo = new PDO("mysql:$hostnom;dbname=$bdd;charset=utf8", $usernom, $password);
    $monPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
    $monPdo = null;
}
?>