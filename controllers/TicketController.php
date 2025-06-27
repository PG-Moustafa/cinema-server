<?php
require("../models/Ticket.php");
require("../connection/connection.php");

$response = [];
$response["status"] = 200;

// get Tickets
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // get Ticket by id
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $Ticket = Ticket::find($mysqli, $id);
        $response["Ticket"] = $Ticket->toArray();

        echo json_encode($response["Ticket"]);
        return;
    }

    // get all Tickets
    $Tickets = Ticket::all($mysqli); //reminder: this is an array of OBJECTS!!!!

    $response["Tickets"] = []; //json_encode DOES NOT read private attributes!!!
    foreach ($Tickets as $m) {
        $response["Tickets"][] = $m->toArray(); //hence, we decided to iterate again on the articles array and now to store the result of the toArray() which is an array. 
    }
    echo json_encode($response["Tickets"]); //now we can call json_encode on array of arrays. 
    return;
}

// delete Ticket
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $Ticket = new Ticket(["id" => $id]);

    $success = $Ticket->delete($mysqli);

    if ($success) {
        echo json_encode(["message" => "Ticket deleted successfully."]);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "Failed to delete Ticket."]);
    }
    return;
}

// update Ticket
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

    $id = intval($_POST['id']);

    $Ticket = new Ticket([
        "id" => $id,
        "user_id" => $_POST['user_id'],
        "booking_id" => $POST['booking_id'],
        "seat_id" => $_POST['seat_id'],
        "price" => $_POST['price'],
        "ticket_code" => $_POST['releticket_codease_date'],
    ]);

    $success = $Ticket->update($mysqli, $Ticket->toArray());

    if ($success) {
        $response['message'] = 'Ticket updated successfully.';
    } else {
        $response['status'] = 500;
        $response['message'] = 'Failed to update Ticket.';
    }

    echo json_encode($response);
    return;
}

// create Ticket
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' && isset(
    $_POST['user_id'],
    $_POST['booking_id'],
    $_POST['seat_id'],
    $_POST['price'],
    $_POST['ticket_code'],
)
) {

    $Ticket = new Ticket([
        "user_id" => $_POST['user_id'],
        "booking_id" => $POST['booking_id'],
        "seat_id" => $_POST['seat_id'],
        "price" => $_POST['price'],
        "ticket_code" => $_POST['releticket_codease_date'],
    ]);

    $success = Ticket::create($mysqli, $Ticket->toArray());

    if ($success) {
        $response['message'] = 'Ticket created successfully.';
    } else {
        $response['status'] = 500;
        $response['message'] = 'Failed to create Ticket.';
    }

    echo json_encode($response);
    return;
}