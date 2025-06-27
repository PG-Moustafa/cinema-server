<?php

require_once(__DIR__ . '/connection/connection.php');

$seedsFiles = [
    __DIR__ . '/seeds/seeds_movies.php',
    __DIR__ . '/seeds/seeds_users.php',
    __DIR__ . '/seeds/seed_seats.php',
    __DIR__ . '/seeds/seed_showtimes.php',
    __DIR__ . '/seeds/seed_bookings.php',
    __DIR__ . '/seeds/seeds_tickets.php',
    __DIR__ . '/seeds/seed_payments.php'
];

foreach ($seedsFiles as $file) {
    echo "Running seeds: $file<br>";
    require_once($file);
}
