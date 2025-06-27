<?php
require("../models/Showtime.php");
require("../connection/connection.php");

$response = [];
$response["status"] = 200;

// get Showtimes
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // get Showtime by id
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $Showtime = Showtime::find($mysqli, $id);
        $response["Showtime"] = $Showtime->toArray();

        echo json_encode($response["Showtime"]);
        return;
    }

    // get all Showtimes
    $Showtimes = Showtime::all($mysqli); //reminder: this is an array of OBJECTS!!!!

    $response["Showtimes"] = []; //json_encode DOES NOT read private attributes!!!
    foreach ($Showtimes as $m) {
        $response["Showtimes"][] = $m->toArray(); //hence, we decided to iterate again on the articles array and now to store the result of the toArray() which is an array. 
    }
    echo json_encode($response["Showtimes"]); //now we can call json_encode on array of arrays. 
    return;
}

// delete Showtime
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $Showtime = new Showtime(["id" => $id]);

    $success = $Showtime->delete($mysqli);

    if ($success) {
        echo json_encode(["message" => "Showtime deleted successfully."]);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "Failed to delete Showtime."]);
    }
    return;
}

// update Showtime
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

    $id = intval($_POST['id']);

    $Showtime = new Showtime([
        "id" => $id,
        "movie_id" => $_POST['movie_id'],
        "auditorium_id" => $_POST['auditorium_id'],
        "show_date" => $_POST['show_date'],
        "show_time" => $_POST['show_time']
    ]);

    $success = $Showtime->update($mysqli, $Showtime->toArray());

    if ($success) {
        $response['message'] = 'Showtime updated successfully.';
    } else {
        $response['status'] = 500;
        $response['message'] = 'Failed to update Showtime.';
    }

    echo json_encode($response);
    return;
}

// create Showtime
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' && isset(
    $_POST['title'],
    $_POST['auditorium_id'],
    $_POST['show_date'],
    $_POST['show_time']
)
) {

    $Showtime = new Showtime([
        "movie_id" => $_POST['movie_id'],
        "auditorium_id" => $_POST['auditorium_id'],
        "show_date" => $_POST['show_date'],
        "show_time" => $_POST['show_time'],
    ]);

    $success = Showtime::create($mysqli, $Showtime->toArray());

    if ($success) {
        $response['message'] = 'Showtime created successfully.';
    } else {
        $response['status'] = 500;
        $response['message'] = 'Failed to create Showtime.';
    }

    echo json_encode($response);
    return;
}