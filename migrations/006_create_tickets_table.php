<?php

$sql = "CREATE TABLE IF NOT EXISTS tickets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    booking_id INT,
    seat_id INT,
    price DECIMAL(10,2),
    ticket_code VARCHAR(50) UNIQUE,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (booking_id) REFERENCES bookings(id),
    FOREIGN KEY (seat_id) REFERENCES seats(id)
    )";

$execute = $mysqli->prepare($sql);
$execute->execute();


?>