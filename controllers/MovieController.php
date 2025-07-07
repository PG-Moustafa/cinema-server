<?php
require_once __DIR__ . '/../scripts/BaseRequires.php';
require_once __DIR__ . "/../models/Movie.php";
require __DIR__ . "/../services/MovieService.php";

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
            echo ResponseService::success_response(
                [],
                "Movie updated successfully."
            );

        } catch (Exception $e) {
            echo ResponseService::error_response(
                "Failed to update movie: " . $e->getMessage()
            );
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

            $movie = new Movie([
                "title" => $_POST['title'],
                "genre" => $_POST['genre'],
                "description" => $_POST['description'],
                "rating" => $_POST['rating'],
                "release_date" => $_POST['release_date'],
                "duration_minutes" => $_POST['duration_minutes'],
                "poster_url" => $_POST['poster_url']
            ]);

            $success = Movie::add($mysqli, $movie->toArray());
            echo ResponseService::success_response(
                [],
                "Movie added successfully."
            );

        } catch (Exception $e) {

            echo ResponseService::error_response(
                "Failed to add movie: " . $e->getMessage()
            );
        }
    }

}