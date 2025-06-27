<?php

$query = "CREATE TABLE IF NOT EXISTS showtimes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    movie_id INT,
    auditorium_id INT,
    show_date DATE,
    show_time TIME,
    FOREIGN KEY (movie_id) REFERENCES movies(id)
    )";

$query = $mysqli->prepare($query);
$query->execute();

?>