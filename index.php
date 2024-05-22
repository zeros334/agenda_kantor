<?php 
// Include database connection
require_once 'db_connection.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

echo "Welcome, " . $_SESSION['username'] . "!<br>";


function fetchAgendas($koneksi) {
    try {
        return $koneksi->query("SELECT * FROM events")->fetchAll();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

$agendas = fetchAgendas($koneksi);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</head>
<body class="container">
    <div id="judul"><h2>Agenda</h2></div>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Action</th>
        </tr>
        <?php foreach ($agendas as $agenda) { ?>
            <tr>
                <td><?php echo $agenda['title']; ?></td>
                <td><?php echo $agenda['deskripsi']; ?></td>
                <td><?php echo $agenda['start_datetime']; ?></td>
                <td><?php echo $agenda['end_datetime']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $agenda['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $agenda['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <a href="add.php">Add New Event</a>
    
</body>
</html>
