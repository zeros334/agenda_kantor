<?php
// Koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'agenda';

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Ambil data acara dari database
$query = "SELECT * FROM events";
$result = mysqli_query($koneksi, $query);

?>