<?php
require_once 'koneksi.php';
require_once 'agenda.php';

$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$tanggal = $_POST['tanggal'];
$waktu = $_POST['waktu'];

if($_SERVER['REQUEST_METHOD'] === “POST”){
    $sql = "INSERT INTO agenda (judul, deskripsi, tanggal, waktu) VALUES ('$judul', '$deskripsi', '$tanggal', '$waktu')";
    if ($conn->query($sql) === TRUE) {
        echo "Agenda berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?>
