<?php
$host = 'localhost';
$db   = 'trabalhosemestral';
$user = 'postgres';
$pass = '1711';

$dsn = "pgsql:host=$host;port=5432;dbname=$db;";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>