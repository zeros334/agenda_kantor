<?php
require_once 'db_connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // sanitize input
    $title = mysqli_real_escape_string($koneksi, $_POST['title']);
    $description = mysqli_real_escape_string($koneksi, $_POST['description']);
    $start_datetime = $_POST['start_datetime'];
    $end_datetime = $_POST['end_datetime'];

   
    $query = "INSERT INTO events (title, deskripsi, start_datetime, end_datetime) VALUES ('$title', '$description', '$start_datetime', '$end_datetime')";
    
    if (mysqli_query($koneksi, $query)) {
        
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>
