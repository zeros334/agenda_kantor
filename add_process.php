<?php
require_once 'db_connection.php';

function sanitizeInput($koneksi, $data) {
    return htmlspecialchars(strip_tags($data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // sanitize input
    $title = sanitizeInput($koneksi, $_POST['title']);
    $description = sanitizeInput($koneksi, $_POST['description']);
    $start_datetime = sanitizeInput($koneksi, $_POST['start_datetime']);
    $end_datetime = sanitizeInput($koneksi, $_POST['end_datetime']);

    // prepare and bind
    $stmt = $koneksi->prepare("INSERT INTO events (title, deskripsi, start_datetime, end_datetime) VALUES (:title, :description, :start_datetime, :end_datetime)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':start_datetime', $start_datetime);
    $stmt->bindParam(':end_datetime', $end_datetime);

    try {
        $stmt->execute();
        header("Location: index.php");
        exit();
    } catch (koneksiException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$koneksi = null;
?>
