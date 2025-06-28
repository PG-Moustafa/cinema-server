<?php

require_once(__DIR__ . '/../connection/connection.php');
require_once(__DIR__ . '/../models/Booking.php');

// select users id
$user_ids = [];
$result = $mysqli->query("SELECT id FROM users");
while ($row = $result->fetch_assoc()) {
    $user_ids[] = $row['id'];
}

// select showtimes id
$showtime_ids = [];
$result = $mysqli->query("SELECT id FROM showtimes");
while ($row = $result->fetch_assoc()) {
    $showtime_ids[] = $row['id'];
}

if (empty($user_ids) || empty($showtime_ids)) {
    die("Make sure you have users and showtimes in your database first.");
}

$statuses = ['pending', 'confirmed', 'cancelled'];

for ($i = 0; $i < 20; $i++) {
    $booking = new Booking([
        'user_id' => $user_ids[array_rand($user_ids)],
        'showtime_id' => $showtime_ids[array_rand($showtime_ids)],
        'total_amount' => rand(10, 25) + (rand(0, 99) / 100), // e.g. 15.75
        'status' => $statuses[array_rand($statuses)],
        'created_at' => date('Y-m-d H:i:s')
    ]);

    $data = $booking->toArray();

    $stmt = $mysqli->prepare("INSERT INTO bookings (user_id, showtime_id, total_amount, status, created_at) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iidss", $data['user_id'], $data['showtime_id'], $data['total_amount'], $data['status'], $data['created_at']);
    $stmt->execute();
}

echo "Seeded 20 bookings successfully.";
