<?php

$sql = "CREATE TABLE IF NOT EXISTS seats (
    id INT PRIMARY KEY AUTO_INCREMENT,
    auditorium_id INT,
    row_label CHAR(1),
    seat_number INT,
    seat_type ENUM('regular', 'vip', 'accessible')
)";

$execute = $mysqli->prepare($sql);
$execute->execute();

?>