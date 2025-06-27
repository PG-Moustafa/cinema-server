<?php
require("../models/Seat.php");
require("../connection/connection.php");

$response = [];
$response["status"] = 200;

// get seats
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // get seat by id
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $seat = Seat::find($mysqli, $id);
        $response["seat"] = $seat->toArray();

        echo json_encode($response["seat"]);
        return;
    }

    // get all seats
    $seats = Seat::all($mysqli); //reminder: this is an array of OBJECTS!!!!

    $response["seats"] = []; //json_encode DOES NOT read private attributes!!!
    foreach ($seats as $s) {
        $response["seats"][] = $s->toArray(); //hence, we decided to iterate again on the articles array and now to store the result of the toArray() which is an array. 
    }
    echo json_encode($response["seats"]); //now we can call json_encode on array of arrays. 
    return;
}

// delete seats
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $seat = new Seat(["id" => $id]);

    $success = $seat->delete($mysqli);

    if ($success) {
        echo json_encode(["message" => "Seat deleted successfully."]);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "Failed to delete seat."]);
    }
    return;
}

// update seat
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

    $id = intval($_POST['id']);

    $seat = new Seat([
        "id" => $id,
        "auditorium_id" => $_POST['auditorium_id'],
        "row_label" => $_POST['row_label'],
        "seat_number" => $_POST['seat_number'],
        "seat_type" => $_POST['seat_type'],
    ]);

    $success = $seat->update($mysqli, $seat->toArray());

    if ($success) {
        $response['message'] = 'Seat updated successfully.';
    } else {
        $response['status'] = 500;
        $response['message'] = 'Failed to update seat.';
    }

    echo json_encode($response);
    return;
}

// create seat
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' && isset(
    $_POST['auditorium_id'],
    $_POST['row_label'],
    $_POST['seat_number'],
    $_POST['seat_type'],
)
) {

    $movie = new Seat([
        "auditorium_id" => $_POST['auditorium_id'],
        "row_label" => $_POST['row_label'],
        "seat_number" => $_POST['seat_number'],
        "seat_type" => $_POST['seat_type'],
    ]);

    $success = Seat::create($mysqli, $seat->toArray());

    if ($success) {
        $response['message'] = 'Seat created successfully.';
    } else {
        $response['status'] = 500;
        $response['message'] = 'Failed to create seat.';
    }

    echo json_encode($response);
    return;
}



