<?php

require_once("../models/Showtime.php");
require_once("../connection/connection.php");

// Get available movie IDs
$movie_ids = [];
$res = $mysqli->query("SELECT id FROM movies");
while ($row = $res->fetch_assoc()) {
    $movie_ids[] = $row['id'];
}

// Get available auditorium IDs
$auditorium_ids = ['1', '2', '3', '4', '5'];
// $res = $mysqli->query("SELECT id FROM auditoriums");
// while ($row = $res->fetch_assoc()) {
//     $auditorium_ids[] = $row['id'];
// }

if (empty($movie_ids) || empty($auditorium_ids)) {
    die("Make sure 'movies' and 'auditoriums' have data.");
}

// Generate 30 showtimes
for ($i = 0; $i < 30; $i++) {
    $date = date('Y-m-d', strtotime("+" . rand(0, 7) . " days")); // next 0–7 days
    $hour = rand(10, 22); // 10 AM to 10 PM
    $minute = rand(0, 1) ? '00' : '30';
    $time = sprintf('%02d:%s:00', $hour, $minute);

    $showtime = new Showtime([
        'movie_id' => $movie_ids[array_rand($movie_ids)],
        'auditorium_id' => $auditorium_ids[array_rand($auditorium_ids)],
        'show_date' => $date,
        'show_time' => $time,
    ]);

    $data = $showtime->toArray();

    $stmt = $mysqli->prepare("INSERT INTO showtimes (movie_id, auditorium_id, show_date, show_time) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iisi", $data['movie_id'], $data['auditorium_id'], $data['show_date'], $data['show_time']);
    $stmt->execute();
}

echo "Seeded 30 showtimes successfully.";
