<?php
require 'db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Check if the ID is valid (a positive integer)
    if (filter_var($id, FILTER_VALIDATE_INT, array("options" => array("min_range"=>1))) === false) {
        die("Invalid ID.");
    }

    try {
        $stmt = $koneksi->prepare('DELETE FROM events WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount()) {
            echo "Record deleted successfully.";
        } else {
            echo "No record found with the specified ID.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID parameter is missing.";
}

?>
