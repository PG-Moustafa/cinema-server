<?php

$sql = "CREATE TABLE IF NOT EXISTS payments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    booking_id INT,
    payer_user_id INT,
    amount_paid DECIMAL(10,2),
    method VARCHAR(50),
    paid_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (payer_user_id) REFERENCES users(id),
    FOREIGN KEY (booking_id) REFERENCES bookings(id)
    )";

$execute = $mysqli->prepare($sql);
$execute->execute();


?>