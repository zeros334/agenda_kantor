<?php
session_start();
require 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}

echo "Welcome, Admin " . $_SESSION['username'];
// Fetch agendas
$result = $koneksi->query("SELECT * FROM events");

while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<h3>" . $row['title'] . "</h3>";
    echo "<p>" . $row['description'] . "</p>";
    echo "<p>" . $row['date'] . "</p>";
    echo "</div>";
}
?>
<a href="add.php">Add Agenda</a>
<a href="logout.php">Logout</a>
