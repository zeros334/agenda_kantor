<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Kantor</title>
</head>
<body>
    <h2>Agenda Kantor</h2>
    <table border="1">
        <tr>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal</th>
            <th>Waktu</th>
        </tr>
        <?php
        $sql = "SELECT * FROM agenda";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["judul"]."</td>";
                echo "<td>".$row["deskripsi"]."</td>";
                echo "<td>".$row["tanggal"]."</td>";
                echo "<td>".$row["waktu"]."</td>";
                echo "</tr>";
            }
        } else {
            echo "Tidak ada agenda.";
        }
        ?>
    </table>
</body>
</html>
