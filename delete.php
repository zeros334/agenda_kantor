<?php
require_once 'db_connection.php';


if (isset($_GET['id'])) {
    $event_id = $_GET['id'];

   
    $query = "DELETE FROM events WHERE id = $event_id";
    
    if (mysqli_query($koneksi, $query)) {
        
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
} else {
    echo "Event ID not provided.";
    exit();
}

mysqli_close($koneksi);
?>
