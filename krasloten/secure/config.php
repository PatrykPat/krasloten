<?php
$host = 'localhost';
$db = 'inloggenKras';
$user = 'root';
$password = '';
$patryk = "UTF8";
$dsn = "mysql:host=$host;dbname=$db;charset=$patryk";

$options = [
    PDO::ATTR_ERRMODE                          => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE               => PDO::FETCH_CLASS,
    PDO::ATTR_EMULATE_PREPARES                 => false,
    ];
    
try {
    $pdo = new PDO ($dsn, $user, $password, $options);
   
    } 
catch (\PDOException $e){
        throw new \PDOException($e->getMessage(), (int)$e->getCode ());
    }
 
if($pdo === false){
    die("ERROR: Could not connect. " . $pdo->connect_error);
}
?>