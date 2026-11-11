<?php
$host = 'localhost';
$dbname = 'f1_community';
$username = 'root'; // Inserisci il tuo utente MySQL
$password = '';     // Inserisci la tua password MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Errore di connessione: " . $e->getMessage());
}
?>