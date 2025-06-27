<?php
require("../models/Booking.php");
require("../connection/connection.php");

$response = [];
$response["status"] = 200;

// get bookings
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // get booking by id
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $booking = booking::find($mysqli, $id);
        $response["booking"] = $booking->toArray();

        echo json_encode($response["booking"]);
        return;
    }

    // get all bookings
    $bookings = booking::all($mysqli); //reminder: this is an array of OBJECTS!!!!

    $response["bookings"] = []; //json_encode DOES NOT read private attributes!!!
    foreach ($bookings as $m) {
        $response["bookings"][] = $m->toArray(); //hence, we decided to iterate again on the articles array and now to store the result of the toArray() which is an array. 
    }
    echo json_encode($response["bookings"]); //now we can call json_encode on array of arrays. 
    return;
}

// delete booking
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $booking = new booking(["id" => $id]);

    $success = $booking->delete($mysqli);

    if ($success) {
        echo json_encode(["message" => "booking deleted successfully."]);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "Failed to delete booking."]);
    }
    return;
}

// update booking
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

    $id = intval($_POST['id']);

    $booking = new booking([
        "id" => $id,
        "user_id" => $_POST['user_id'],
        "showtime_id" => $POST['showtime_id'],
        "total_amount" => $_POST['total_amount'],
        "status" => $_POST['status'],
        "created_at" => $_POST['created_at'],
    ]);

    $success = $booking->update($mysqli, $booking->toArray());

    if ($success) {
        $response['message'] = 'booking updated successfully.';
    } else {
        $response['status'] = 500;
        $response['message'] = 'Failed to update booking.';
    }

    echo json_encode($response);
    return;
}

// create booking
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' && isset(
    $_POST['user_id'],
    $_POST['showtime_id'],
    $_POST['total_amount'],
    $_POST['status'],
    $_POST['created_at'],
)
) {

    $booking = new booking([
        "user_id" => $_POST['user_id'],
        "showtime_id" => $POST['showtime_id'],
        "total_amount" => $_POST['total_amount'],
        "status" => $_POST['status'],
        "created_at" => $_POST['created_at'],
    ]);

    $success = booking::create($mysqli, $booking->toArray());

    if ($success) {
        $response['message'] = 'booking created successfully.';
    } else {
        $response['status'] = 500;
        $response['message'] = 'Failed to create booking.';
    }

    echo json_encode($response);
    return;
}