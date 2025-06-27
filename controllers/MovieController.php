<?php
require("../models/Movie.php");
require("../connection/connection.php");

$response = [];
$response["status"] = 200;

// get movies
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // get movie by id
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $movie = Movie::find($mysqli, $id);
        $response["movie"] = $movie->toArray();

        echo json_encode($response["movie"]);
        return;
    }

    // get all movies
    $movies = Movie::all($mysqli); //reminder: this is an array of OBJECTS!!!!

    $response["movies"] = []; //json_encode DOES NOT read private attributes!!!
    foreach ($movies as $m) {
        $response["movies"][] = $m->toArray(); //hence, we decided to iterate again on the articles array and now to store the result of the toArray() which is an array. 
    }
    echo json_encode($response["movies"]); //now we can call json_encode on array of arrays. 
    return;
}

// delete movie
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $movie = new Movie(["id" => $id]);

    $success = $movie->delete($mysqli);

    if ($success) {
        echo json_encode(["message" => "Movie deleted successfully."]);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "Failed to delete movie."]);
    }
    return;
}

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