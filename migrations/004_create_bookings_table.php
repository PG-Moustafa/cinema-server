<?php

$query = "CREATE TABLE IF NOT EXISTS bookings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    showtime_id INT,
    total_amount DECIMAL(10,2),
    status ENUM('pending', 'confirmed', 'cancelled'),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (showtime_id) REFERENCES showtimes(id)
    )";

$execute = $mysqli->prepare($query);
$execute->execute();


?>