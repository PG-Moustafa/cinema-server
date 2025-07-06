<?php
require_once(__DIR__ . '/../scripts/BaseRequires.php');
require("../models/Booking.php");
require(__DIR__ . "/../services/BookingService.php");

class BookingController
{
    function getAllBookings()
    {
        global $mysqli;

        try {
            $bookings = Booking::all($mysqli); //reminder: this is an array of OBJECTS!!!!
            $bookings_array = BookingService::bookingsToArray($bookings);
            echo ResponseService::success_response($bookings_array);

        } catch (Exception $e) {

            echo ResponseService::error_response(
                "Failed to retreive bookings: " . $e->getMessage()
            );
        }
    }

    function getBookingById()
    {
        global $mysqli;

        try {

            $id = $_GET["id"];
            $booking = Booking::find($mysqli, $id)->toArray();
            echo ResponseService::success_response($booking);

        } catch (Exception $e) {

            echo ResponseService::error_response(
                "Failed to retreive booking: " . $e->getMessage()
            );
        }
    }

    function deleteAllBookings()
    {
        global $mysqli;

        try {

            Booking::deleteAll($mysqli);
            echo ResponseService::success_response([]);

        } catch (Exception $e) {

            echo ResponseService::error_response(
                "Failed to delete bookings: " . $e->getMessage()
            );
        }
    }

    function deleteBookingById()
    {
        global $mysqli;

        try {

            $id = $_GET["id"];
            Booking::delete($mysqli, $id);
            echo ResponseService::success_response([]);
            return;

        } catch (Exception $e) {

            echo ResponseService::error_response(
                "Failed to delete booking: " . $e->getMessage()
            );
        }
    }

    function updateBooking()
    {
        global $mysqli;

        try {

            $id = intval($_POST['id']);

            $booking = new booking([
                "id" => $id,
                "user_id" => $_POST['user_id'],
                "showtime_id" => $_POST['showtime_id'],
                "total_amount" => $_POST['total_amount'],
                "status" => $_POST['status'],
                "created_at" => $_POST['created_at'],
            ]);

            $success = $booking->update($mysqli, $booking->toArray());
            echo ResponseService::success_response(
                [],
                "Article updated successfully."
            );

        } catch (Exception $e) {
            echo ResponseService::error_response(
                "Failed to add articles: " . $e->getMessage()
            );
        }

    }

    function addBooking()
    {
        global $mysqli;

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo ResponseService::error_response("Method Not Allowed. Use POST.");
            return;
        }

        try {

            $booking = new booking([
                "user_id" => $_POST['user_id'],
                "showtime_id" => $_POST['showtime_id'],
                "total_amount" => $_POST['total_amount'],
                "status" => $_POST['status'],
                "created_at" => $_POST['created_at'],
            ]);

            $success = Booking::add($mysqli, $booking->toArray());
            echo ResponseService::success_response(
                [],
                "Booking added successfully."
            );

        } catch (Exception $e) {

            echo ResponseService::error_response(
                "Failed to add booking: " . $e->getMessage()
            );
        }

    }

}







