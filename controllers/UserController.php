<?php

require_once __DIR__ . '/../scripts/BaseRequires.php';
require_once __DIR__ . "/../models/User.php";
require __DIR__ . "/../services/UserService.php";

class UserController
{

    public function getAllUsers()
    {
        global $mysqli;

        try {
            $users = User::all($mysqli);
            $users_array = UserService::usersToArray($users);
            echo ResponseService::success_response($users_array);

        } catch (Exception $e) {

            echo ResponseService::error_response(
                "Failed to retreive users: " . $e->getMessage()
            );
        }
    }

    public function getUserById()
    {
        global $mysqli;

        try {

            $id = $_GET["id"];
            $user = User::find($mysqli, $id)->toArray();
            echo ResponseService::success_response($user);

        } catch (Exception $e) {

            echo ResponseService::error_response(
                "Failed to retreive user: " . $e->getMessage()
            );
        }
    }

    public function deleteAllUsers()
    {
        global $mysqli;

        try {

            User::deleteAll($mysqli);
            echo ResponseService::success_response([]);

        } catch (Exception $e) {

            echo ResponseService::error_response(
                "Failed to delete users: " . $e->getMessage()
            );
        }
    }

    public function deleteUserById()
    {
        global $mysqli;

        try {

            $id = $_GET["id"];
            User::delete($mysqli, $id);
            echo ResponseService::success_response([]);
            return;

        } catch (Exception $e) {

            echo ResponseService::error_response(
                "Failed to delete user: " . $e->getMessage()
            );
        }
    }

    public function updateUser()
    {
        global $mysqli;

        try {

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
            echo ResponseService::success_response(
                [],
                "User updated successfully."
            );

        } catch (Exception $e) {
            echo ResponseService::error_response(
                "Failed to update user: " . $e->getMessage()
            );
        }

    }

    public function addUser()
    {

        global $mysqli;

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo ResponseService::error_response("Method Not Allowed. Use POST.");
            return;
        }

        try {

            $user = new User([
                "name" => $_POST['name'],
                "email" => $_POST['email'],
                "phone" => $_POST['phone'],
                "password_hash" => $_POST['password_hash'],
                "birthdate" => $_POST['birthdate'],
            ]);

            $success = User::add($mysqli, $user->toArray());
            echo ResponseService::success_response(
                [],
                "User added successfully."
            );

        } catch (Exception $e) {

            echo ResponseService::error_response(
                "Failed to add user: " . $e->getMessage()
            );
        }
    }
}



