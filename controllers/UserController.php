<?php
require("../models/User.php");
require("../connection/connection.php");

$response = [];
$response["status"] = 200;

// get users
if ($_SERVER["REQUEST_METHOD"] === 'GET') {
    // get user by id
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $user = User::find($mysqli, $id);
        $response["user"] = $user->toArray();

        echo json_encode($response["user"]);
        return;
    }

    // get all users
    $users = User::all($mysqli);

    $response["users"] = [];
    foreach ($users as $u) {
        $response["users"][] = $u->toArray();
    }
    echo json_encode($response["users"]);
    return;
}

// delete user
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $user = new User(["id" => $id]);

    $success = $user->delete($mysqli);

    if ($success) {
        echo json_encode(["message" => "User deleted successfully."]);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "Failed to delete user."]);
    }
    return;
}

// update user
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

    $id = intval($_POST['id']);

    $user = new User([
        "id" => $id,
        "name" => $_POST['name'],
        "email" => $_POST['email'],
        "phone" => $_POST['phone'],
        "password_hash" => $_POST['password_hash'],
        "birthdate" => $_POST['birthdate'],
    ]);

    $success = $user->update($mysqli, $user->toArray());

    if ($success) {
        $response['message'] = 'Movie updated successfully.';
    } else {
        $response['status'] = 500;
        $response['message'] = 'Failed to update movie.';
    }

    echo json_encode($response);
    return;
}

// create user
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' && isset(
    $_POST['name'],
    $_POST['email'],
    $_POST['phone'],
    $_POST['password_hash'],
    $_POST['birthdate'],
)
) {

    $user = new User([
        "name" => $_POST['name'],
        "email" => $_POST['email'],
        "phone" => $_POST['phone'],
        "password_hash" => $_POST['password_hash'],
        "birthdate" => $_POST['birthdate'],
    ]);

    $success = User::create($mysqli, $user->toArray());

    if ($success) {
        $response['message'] = 'User created successfully.';
    } else {
        $response['status'] = 500;
        $response['message'] = 'Failed to create user.';
    }

    echo json_encode($response);
    return;
}



