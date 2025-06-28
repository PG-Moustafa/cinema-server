<?php
header("Access-Control-Allow-Origin: http://localhost:5500");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
require_once(__DIR__ . '/../connection/connection.php');

$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'] ?? '';
$password = $data['password'] ?? '';

if (!$email || !$password) {
    http_response_code(400);
    echo json_encode(["error" => "Email and password are required."]);
    exit;
}

$stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {

    if ($user['password_hash'] === $password) {
        echo json_encode([
            "id" => $user['id'],
            "email" => $user['email'],
            "name" => $user['name']
        ]);
    } else {
        http_response_code(401);
        echo json_encode(["error" => "Wrong password."]);
    }
} else {
    http_response_code(404);
    echo json_encode(["error" => "User not found."]);
}
