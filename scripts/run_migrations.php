<?php

require_once("../connection/connection.php");

$migrationFiles = [
    __DIR__ . "/../migrations/001_create_users_table.php",
    __DIR__ . "/../migrations/002_create_movies_table.php",
    __DIR__ . "/../migrations/003_create_showtimes_table.php",
    __DIR__ . "/../migrations/004_create_bookings_table.php",
    __DIR__ . "/../migrations/005_create_seats_table.php",
    __DIR__ . "/../migrations/006_create_tickets_table.php",
    __DIR__ . "/../migrations/007_create_payments_table.php",
];

echo "<strong>Running migrations...</strong><br>";

foreach ($migrationFiles as $file) {
    if (file_exists($file)) {
        $result = include_once($file);
        echo basename($file) . " -> Table added successfully<br>";
    } else {
        echo basename($file) . " -> File not found<br>";
    }
}