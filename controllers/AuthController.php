<?php
require_once(__DIR__ . '/../scripts/BaseRequires.php');


function login()
{
    global $mysqli;

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

        if (password_verify($password, $user['password_hash'])) {
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
}


function register()
{
    global $mysqli;

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
}
