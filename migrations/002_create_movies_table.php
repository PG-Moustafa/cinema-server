<?php

$query = "CREATE TABLE IF NOT EXISTS movies (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    genre VARCHAR(255),
    description TEXT,
    rating VARCHAR(10),
    release_date DATE,
    duration_minutes INT,
    poster_url TEXT)";

$execute = $mysqli->prepare($query);
$execute->execute();

?>