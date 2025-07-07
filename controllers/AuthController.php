<?php
require_once __DIR__ . "/../scripts/BaseRequires.php";
require_once __DIR__ . "/../models/User.php";

class AuthController
{

    function login()
    {
        global $mysqli;

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo ResponseService::error_response("Method Not Allowed. Use POST.");
            return;
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!$email || !$password) {
            http_response_code(400);
            echo json_encode(["error" => "Email and password are required."]);
            return;
        }

        try {
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
        } catch (Exception $e) {
            http_response_code(500);
            echo ResponseService::error_response("Server error: " . $e->getMessage());
        }


    }

    function register()
    {
        global $mysqli;

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo ResponseService::error_response("Method Not Allowed. Use POST.");
            return;
        }

        $user = new User([
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "phone" => $_POST['phone'],
            "password_hash" => $_POST['password_hash'],
            "birthdate" => $_POST['birthdate'],
        ]);

        if (!$user->getName() || !$user->getEmail() || !$user->getBirthday() || !$user->getPhone() || !$user->getPassword_Hash()) {
            http_response_code(400);
            echo ResponseService::error_response("Please enter required fields");
            return;
        }

        $email = $user->getEmail();
        $check = $mysqli->prepare("SELECT id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $result = $check->get_result();

        if ($result->fetch_assoc()) {
            http_response_code(409);
            echo json_encode(["error" => "Email already registered."]);
            return;
        }

        $user->setPassword_Hash(password_hash($user->getPassword_Hash(), PASSWORD_DEFAULT));

        try {
            User::add($mysqli, $user->toArray());
            echo ResponseService::success_response("", "User registered successfully.");
        } catch (Exception $e) {
            http_response_code(500);
            echo ResponseService::error_response("Failed to register the user");
        }


    }


}