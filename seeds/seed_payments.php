<?php

require_once("../connection/connection.php");
require_once("../models/Payment.php");

function fetchIds($mysqli, $table)
{
    $ids = [];
    $res = $mysqli->query("SELECT id FROM $table");
    while ($row = $res->fetch_assoc()) {
        $ids[] = $row['id'];
    }
    return $ids;
}

$booking_ids = fetchIds($mysqli, "bookings");
$user_ids = fetchIds($mysqli, "users");

if (empty($booking_ids) || empty($user_ids)) {
    die("Make sure 'bookings' and 'users' tables have data.");
}

$methods = ['cash', 'credit_card', 'paypal'];

for ($i = 0; $i < 20; $i++) {
    $booking_id = $booking_ids[array_rand($booking_ids)];
    $payer_user_id = $user_ids[array_rand($user_ids)];

    $payment = new Payment([
        'booking_id' => $booking_id,
        'payer_user_id' => $payer_user_id,
        'amount_paid' => rand(10, 30) + (rand(0, 99) / 100), // e.g., 25.75
        'method' => $methods[array_rand($methods)],
        'paid_at' => date('Y-m-d H:i:s', strtotime('-' . rand(0, 10) . ' days'))
    ]);

    $data = $payment->toArray();

    $stmt = $mysqli->prepare("INSERT INTO payments (booking_id, payer_user_id, amount_paid, method, paid_at) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iids", $data['booking_id'], $data['payer_user_id'], $data['amount_paid'], $data['method'], $data['paid_at']);
    $stmt->execute();
}

echo "Seeded 20 payments successfully.";
