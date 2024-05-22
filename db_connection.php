<?php
$host = 'localhost';
$db = 'agenda';
$user = 'root';
$pass = '';

try {
    $koneksi = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}

$query = "SELECT * FROM events";



?>
