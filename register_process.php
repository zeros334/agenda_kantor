<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role']; // 'user' atau 'admin'

    $sql = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
    $stmt = $koneksi->prepare($sql);
    $stmt->execute(['username' => $username, 'password' => $password, 'role' => $role]);
    header('Location: login.php');
    
}
?>