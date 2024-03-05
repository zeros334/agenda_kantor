
<?php require_once 'db_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Event</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Add New Event</h2>

    <form action="add_process.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea><br>

        <label for="start_datetime">Start Date and Time:</label>
        <input type="datetime-local" name="start_datetime" id="start_datetime" required><br>

        <label for="end_datetime">End Date and Time:</label>
        <input type="datetime-local" name="end_datetime" id="end_datetime" required><br>

        <input type="submit" value="Add Event">
    </form>

    <a href="index.php">Back to Agenda</a>
</body>
</html>
