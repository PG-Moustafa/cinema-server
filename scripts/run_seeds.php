<?php
require_once __DIR__ . "/../connection/connection.php";

$seedsFiles = [
    __DIR__ . "/../seeds/seeds_users.php",
    __DIR__ . "/../seeds/seeds_movies.php",
    __DIR__ . "/../seeds/seed_seats.php",
    __DIR__ . "/../seeds/seed_showtimes.php",
    __DIR__ . "/../seeds/seed_bookings.php",
    __DIR__ . "/../seeds/seeds_tickets.php",
    __DIR__ . "/../seeds/seed_payments.php",
];

echo "<strong>Running seeds...</strong><br>";

foreach ($seedsFiles as $file) {
    if (file_exists($file)) {
        $result = include_once($file);
        echo basename($file) . " -> Seeds added successfully<br>";
    } else {
        echo basename($file) . " -> File not found<br>";
    }
}

