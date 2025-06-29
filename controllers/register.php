<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
require_once(__DIR__ . '/../connection/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit(0);
}

// Decode JSON request
$data = json_decode(file_get_contents("php://input"), true);

// Extract values safely
$name = $data['name'] ?? '';
$email = $data['email'] ?? '';
$phone = $data['phone'] ?? '';
$password = $data['password'] ?? '';
$birthdate = $data['birthdate'] ?? '';

// Validate all fields
if (!$name || !$email || !$phone || !$password || !$birthdate) {
    http_response_code(400);
    echo json_encode(["error" => "All fields are required."]);
    exit;
}

// Check if user already exists
$check = $mysqli->prepare("SELECT id FROM users WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$result = $check->get_result();

if ($result->fetch_assoc()) {
    http_response_code(409);
    echo json_encode(["error" => "Email already registered."]);
    exit;
}

$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Create into DB
$stmt = $mysqli->prepare("INSERT INTO users (name, email, phone, password_hash, birthdate) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $phone, $password_hash, $birthdate);

if ($stmt->execute()) {
    echo json_encode(["message" => "User registered successfully"]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Failed to register user"]);
}
