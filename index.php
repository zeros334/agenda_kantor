<?php
// Include database connection
require_once 'db_connection.php';

// Fetch agenda items from the database
$query = "SELECT * FROM events";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="judul"><h2>Agenda</h2></div>

    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['deskripsi']; ?></td>
                <td><?php echo $row['start_datetime']; ?></td>
                <td><?php echo $row['end_datetime']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <a href="add.php">Add New Event</a>
</body>
</html>
