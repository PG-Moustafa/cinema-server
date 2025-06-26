<?php

$query = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    phone VARCHAR(20),
    password_hash TEXT NOT NULL,
    birthdate DATE)";

$execute = $mysqli->prepare($query);
$execute->execute();

?>