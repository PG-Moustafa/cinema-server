<?php
require_once(__DIR__ . '/../connection/connection.php');
require_once(__DIR__ . '/../models/User.php');

$names = [
    "Ali",
    "Sara",
    "Omar",
    "Lina",
    "Zaid",
    "Maya",
    "Hassan",
    "Dina",
    "Tariq",
    "Nour",
    "Rami",
    "Leila",
    "Khaled",
    "Rana",
    "Youssef",
    "Hiba",
    "Samir",
    "Fatima",
    "Bilal",
    "Aya"
];

for ($i = 0; $i < 20; $i++) {
    $user = new User([
        "name" => $names[$i],
        "email" => strtolower($names[$i]) . rand(1, 100) . "@example.com",
        "phone" => "71" . rand(100000, 999999),
        "password_hash" => password_hash("password123", PASSWORD_DEFAULT),
        "birthdate" => rand(1985, 2005) . '-' . rand(1, 12) . '-' . rand(1, 28)
    ]);

    $data = $user->toArray();

    // Insert into database
    $stmt = $mysqli->prepare("INSERT INTO users (name, email, phone, password_hash, birthdate) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $data['name'], $data['email'], $data['phone'], $data['password_hash'], $data['birthdate']);
    $stmt->execute();
}

echo "Seeded 20 users successfully!";
