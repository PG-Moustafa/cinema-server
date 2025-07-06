<?php

require_once("./connection/connection.php");

$migrationFiles = [
    "./migrations/001_create_users_table.php",
    "./migrations/002_create_movies_table.php",
    "./migrations/003_create_showtimes_table.php",
    "./migrations/004_create_bookings_table.php",
    "./migrations/005_create_seats_table.php",
    "./migrations/006_create_tickets_table.php",
    "./migrations/007_create_payments_table.php",
];

foreach ($migrationFiles as $file) {
    echo "Running migration: $file<br>";
    require_once($file);
}