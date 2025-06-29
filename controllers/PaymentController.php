<?php
// CORS headers — MUST come before any output
header("Access-Control-Allow-Origin: http://127.0.0.1:5500");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

require("../models/Payment.php");
require("../connection/connection.php");

$response = [];
$response["status"] = 200;

// get Payments
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // get Payment by id
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $Payment = Payment::find($mysqli, $id);
        $response["Payment"] = $Payment->toArray();

        echo json_encode($response["Payment"]);
        return;
    }

    // get all Payments
    $Payments = Payment::all($mysqli); //reminder: this is an array of OBJECTS!!!!

    $response["Payments"] = []; //json_encode DOES NOT read private attributes!!!
    foreach ($Payments as $m) {
        $response["Payments"][] = $m->toArray(); //hence, we decided to iterate again on the articles array and now to store the result of the toArray() which is an array. 
    }
    echo json_encode($response["Payments"]); //now we can call json_encode on array of arrays. 
    return;
}

// delete Payment
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $Payment = new Payment(["id" => $id]);

    $success = $Payment->delete($mysqli);

    if ($success) {
        echo json_encode(["message" => "Payment deleted successfully."]);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "Failed to delete Payment."]);
    }
    return;
}

// update Payment
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

    $id = intval($_POST['id']);

    $Payment = new Payment([
        "id" => $id,
        "booking_id" => $_POST['booking_id'],
        "payer_user_id" => $_POST['payer_user_id'],
        "amount_paid" => $_POST['amount_paid'],
        "method" => $_POST['method'],
        "paid_at" => $_POST['paid_at'],
    ]);

    $success = $Payment->update($mysqli, $Payment->toArray());

    if ($success) {
        $response['message'] = 'Payment updated successfully.';
    } else {
        $response['status'] = 500;
        $response['message'] = 'Failed to update Payment.';
    }

    echo json_encode($response);
    return;
}

// create Payment
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' && isset(
    $_POST['booking_id'],
    $_POST['payer_user_id'],
    $_POST['amount_paid'],
    $_POST['method'],
    $_POST['paid_at'],
)
) {

    $Payment = new Payment([
        "booking_id" => $_POST['booking_id'],
        "payer_user_id" => $_POST['payer_user_id'],
        "amount_paid" => $_POST['amount_paid'],
        "method" => $_POST['method'],
        "paid_at" => $_POST['paid_at']
    ]);

    $success = Payment::create($mysqli, $Payment->toArray());

    if ($success) {
        $response['message'] = 'Payment created successfully.';
    } else {
        $response['status'] = 500;
        $response['message'] = 'Failed to create Payment.';
    }

    echo json_encode($response);
    return;
}