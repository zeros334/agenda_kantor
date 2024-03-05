<?php
require_once 'db_connection.php';

if (isset($_GET['id'])) {
    $event_id = $_GET['id'];

    // ambil semua data dari table database
    $query = "SELECT * FROM events WHERE id = $event_id";
    $result = mysqli_query($koneksi, $query);
    // cek kalau ada data
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $description = $row['deskripsi'];
        $start_datetime = $row['start_datetime'];
        $end_datetime = $row['end_datetime'];
    } else {
        echo "Event not found.";
        exit();
    }
} else {
    echo "Event ID not provided.";
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // sanitize input user
    $title = mysqli_real_escape_string($koneksi, $_POST['title']);
    $description = mysqli_real_escape_string($koneksi, $_POST['description']);
    $start_datetime = $_POST['start_datetime'];
    $end_datetime = $_POST['end_datetime'];

    
    $query = "UPDATE events SET title='$title', deskripsi='$description', start_datetime='$start_datetime', end_datetime='$end_datetime' WHERE id = $event_id";
    
    if (mysqli_query($koneksi, $query)) {
        
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Edit Event</h2>

    <form action="" method="POST">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?php echo $title; ?>" required><br>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required><?php echo $description; ?></textarea><br>

        <label for="start_datetime">Start Date and Time:</label>
        <input type="datetime-local" name="start_datetime" id="start_datetime" value="<?php echo $start_datetime; ?>" required><br>

        <label for="end_datetime">End Date and Time:</label>
        <input type="datetime-local" name="end_datetime" id="end_datetime" value="<?php echo $end_datetime; ?>" required><br>

        <input type="submit" value="Update Event">
    </form>

    <a href="index.php">Back to Agenda</a>
</body>
</html>
