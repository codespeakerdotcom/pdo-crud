<?php 

$host     = 'localhost';
$dbname   = 'pdodb';
$username = 'root';
$password = '';
$conn     = "mysql:host=$host;dbname=$dbname;"; 

try {
    $pdo = new PDO($conn, $username, $password);  
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch(PDOException $e) {
    echo $e->getMessage();
}