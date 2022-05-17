<?php

$dbHost     = 'mysql';
$dbPort     = '3306';
$dbName     = '';
$dbUsername = 'root';
$dbPassword = '12345';
$dbCharset  = 'utf8';
$dbDSN      = 'mysql:host='.$dbHost.';port='.$dbPort.';dbname='.$dbName.';charset='.$dbCharset;

$dbOptions = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $db = new PDO($dbDSN, $dbUsername, $dbPassword, $dbOptions);
} catch (PDOException $e) {
    exit ($e->getMessage());
}

$sql = 'SELECT NOW() dt';
$stmt = $db->prepare($sql);
$stmt->execute();
$rows = $stmt->fetch();
echo 'Date from MySQL database: ' . $rows['dt'];

$sql = 'CREATE DATABASE IF NOT EXISTS test';
$stmt = $db->prepare($sql);
$stmt->execute();

echo '<hr>';

$sql = 'SHOW DATABASES';
$stmt = $db->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll();
var_dump($rows);

$sql = 'SELECT NOW() AS DT';
$stmt = $db->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll();
echo $rows[0]['DT'];
