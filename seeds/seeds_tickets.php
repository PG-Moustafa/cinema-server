<?php

require_once(__DIR__ . '/../connection/connection.php');
require_once(__DIR__ . '/../models/Ticket.php');
require_once(__DIR__ . '/functions.php');

$user_ids = fetchIds($mysqli, "users");
$booking_ids = fetchIds($mysqli, "bookings");
$seat_ids = fetchIds($mysqli, "seats");

if (empty($user_ids) || empty($booking_ids) || empty($seat_ids)) {
    die("Make sure 'users', 'bookings', and 'seats' have data.");
}

for ($i = 0; $i < count($seat_ids) / 2; $i++) {

    $ticket = new Ticket([
        'user_id' => $user_ids[array_rand($user_ids)],
        'booking_id' => $booking_ids[array_rand($booking_ids)],
        'seat_id' => $i + 1,
        'price' => rand(8, 20) + (rand(0, 99) / 100),
        'ticket_code' => strtoupper(uniqid("TCKT"))
    ]);

    $data = $ticket->toArray();

    $stmt = $mysqli->prepare("INSERT INTO tickets (user_id, booking_id, seat_id, price, ticket_code) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iiids", $data['user_id'], $data['booking_id'], $data['seat_id'], $data['price'], $data['ticket_code']);
    $stmt->execute();
}

echo "Seeded 15 tickets successfully.";
