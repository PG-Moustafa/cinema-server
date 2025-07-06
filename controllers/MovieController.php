<?php

require_once(__DIR__ . '/../scripts/BaseRequires.php');
require("../models/Movie.php");
require(__DIR__ . "/../services/MovieService.php");

class MovieController
{

    public function getAllMovies()
    {
        global $mysqli;

        try {
            $movies = Movie::all($mysqli);
            $movies_array = MovieService::moviesToArray($movies);
            echo ResponseService::success_response($movies_array);

        } catch (Exception $e) {

            echo ResponseService::error_response(
                "Failed to retreive movies: " . $e->getMessage()
            );
        }
    }

    public function getMovieById()
    {
        global $mysqli;

        try {

            $id = $_GET["id"];
            $movie = Movie::find($mysqli, $id)->toArray();
            echo ResponseService::success_response($movie);

        } catch (Exception $e) {

            echo ResponseService::error_response(
                "Failed to retreive movie: " . $e->getMessage()
            );
        }
    }

    public function deleteAllMovies()
    {
        global $mysqli;

        try {

            Movie::deleteAll($mysqli);
            echo ResponseService::success_response([]);

        } catch (Exception $e) {

            echo ResponseService::error_response(
                "Failed to delete movies: " . $e->getMessage()
            );
        }
    }

    public function deleteMovieById()
    {
        global $mysqli;

        try {

            $id = $_GET["id"];
            Movie::delete($mysqli, $id);
            echo ResponseService::success_response([]);
            return;

        } catch (Exception $e) {

            echo ResponseService::error_response(
                "Failed to delete movie: " . $e->getMessage()
            );
        }
    }

    public function updateMovie()
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


        global $mysqli;

        // update movie
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

            $id = intval($_POST['id']);

            $movie = new Movie([
                "id" => $id,
                "title" => $_POST['title'],
                "genre" => $_POST['genre'],
                "description" => $_POST['description'],
                "rating" => $_POST['rating'],
                "release_date" => $_POST['release_date'],
                "duration_minutes" => $_POST['duration_minutes'],
                "poster_url" => $_POST['poster_url']
            ]);

            $success = $movie->update($mysqli, $movie->toArray());

            if ($success) {
                $response['message'] = 'Movie updated successfully.';
            } else {
                $response['status'] = 500;
                $response['message'] = 'Failed to update movie.';
            }

            echo json_encode($response);
            return;
        }
    }

    public function addMovie()
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




        global $mysqli;

        // create movie
        if (
            $_SERVER['REQUEST_METHOD'] === 'POST' && isset(
            $_POST['title'],
            $_POST['genre'],
            $_POST['description'],
            $_POST['rating'],
            $_POST['release_date'],
            $_POST['duration_minutes'],
            $_POST['poster_url']
        )
        ) {

            $movie = new Movie([
                "title" => $_POST['title'],
                "genre" => $_POST['genre'],
                "description" => $_POST['description'],
                "rating" => $_POST['rating'],
                "release_date" => $_POST['release_date'],
                "duration_minutes" => $_POST['duration_minutes'],
                "poster_url" => $_POST['poster_url']
            ]);

            $success = Movie::create($mysqli, $movie->toArray());

            if ($success) {
                $response['message'] = 'Movie created successfully.';
            } else {
                $response['status'] = 500;
                $response['message'] = 'Failed to create movie.';
            }

            echo json_encode($response);
            return;
        }
    }

}