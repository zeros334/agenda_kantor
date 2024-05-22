CREATE DATABASE agenda;

USE agenda;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE `events`(
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `title` char(100) NOT NULL,
    `deskripsi` TEXT NOT NULL,
    `start_datetime` datetime NOT NULL,
    `end_datetime` datetime NOT NULL,
    created_by INT,
    FOREIGN KEY (created_by) REFERENCES users(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

