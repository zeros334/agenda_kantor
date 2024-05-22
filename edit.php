<?php
require 'db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Check if the ID is valid (a positive integer)
    if (filter_var($id, FILTER_VALIDATE_INT, array("options" => array("min_range"=>1))) === false) {
        die("Invalid ID.");
    }

    // Fetch the current data
    try {
        $stmt = $koneksi->prepare('SELECT * FROM events WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $agenda = $stmt->fetch();

        if (!$agenda) {
            die("No record found with the specified ID.");
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    die("ID parameter is missing.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $deskripsi = $_POST['deskripsi'];
    $start_datetime = $_POST['start_datetime'];
    $end_datetime = $_POST['end_datetime'];

    

    // Validate input
    if (empty($title) || empty($deskripsi) || empty($start_datetime) || empty($end_datetime)) {
        echo "All fields are required.";
    } 
    else {
        // Update the record in the database
        try {
            $stmt = $koneksi->prepare('UPDATE events SET title = :title, deskripsi = :deskripsi, start_datetime = :start_datetime, end_datetime = :end_datetime WHERE id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':deskripsi', $deskripsi);
            $stmt->bindParam(':start_datetime', $start_datetime);
            $stmt->bindParam(':end_datetime', $end_datetime);
            $stmt->execute();

            echo "Record updated successfully.";
            header('Location: index.php');
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Agenda</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Edit Agenda</h1>
    <form action="" method="POST">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($agenda['title']); ?>"><br>
        <label for="deskripsi">deskripsi:</label><br>
        <textarea id="deskripsi" name="deskripsi"><?php echo htmlspecialchars($agenda['deskripsi']); ?></textarea><br>
        <label for="start_datetime">Start Date and Time:</label>
        <input type="datetime-local" name="start_datetime" id="start_datetime" value="<?php echo htmlspecialchars($agenda['start_datetime']); ?>" required><br>
        <label for="end_datetime">End Date and Time:</label>
        <input type="datetime-local" name="end_datetime" id="end_datetime" value="<?php echo htmlspecialchars($agenda['end_datetime']); ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
