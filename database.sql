CREATE DATABASE agenda;

USE agenda;

CREATE TABLE `events`(
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `title` char(100) NOT NULL,
    `deskripsi` TEXT NOT NULL,
    `start_datetime` datetime NOT NULL,
    `end_datetime` datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

