<?php

require_once("../models/Seat.php");
require_once("../connection/connection.php");

$auditorium_id = ['1', '2', '3', '4', '5'];
$rows = ['A', 'B', 'C', 'D', 'E'];
$seat_types = ['regular', 'vip', 'accessible'];

foreach ($auditorium_id as $audit) {
    foreach ($rows as $row) {
        for ($i = 1; $i <= 10; $i++) {
            $seat = new Seat([
                'auditorium_id' => $auditorium_id,
                'row_label' => $row,
                'seat_number' => $i,
                'seat_type' => $seat_types[array_rand($seat_types)]
            ]);

            $data = $seat->toArray();

            $stmt = $mysqli->prepare("INSERT INTO seats (auditorium_id, row_label, seat_number, seat_type) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("isis", $data['auditorium_id'], $data['row_label'], $data['seat_number'], $data['seat_type']);
            $stmt->execute();
        }
    }
}

echo "Seeded " . count($auditorium_id) * count($rows) * 10 . " seats successfully.";
