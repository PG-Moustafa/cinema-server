<?php
require_once(__DIR__ . '/../connection/connection.php');
require_once(__DIR__ . '/../models/Movie.php');

$movies = [
    [
        'title' => 'Interstellar',
        'genre' => 'Fantasy',
        'description' => 'Interstellar is a thrilling and memorable cinematic experience.',
        'rating' => '8.1', // over 10
        'release_date' => '1999-07-13',
        'duration_minutes' => 161,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg'
    ],
    [
        'title' => 'The Dark Knight',
        'genre' => 'Sci-Fi',
        'description' => 'The Dark Knight is a thrilling and memorable cinematic experience.',
        'rating' => '6.9', // over 10
        'release_date' => '2004-09-28',
        'duration_minutes' => 157,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/qJ2tW6WMUDux911r6m7haRef0WH.jpg'
    ],
    [
        'title' => 'The Matrix',
        'genre' => 'Adventure',
        'description' => 'The Matrix is a thrilling and memorable cinematic experience.',
        'rating' => '7.6', // over 10
        'release_date' => '1996-10-19',
        'duration_minutes' => 160,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/p96dm7sCMn4VYAStA6siNz30G1r.jpg'
    ],
    [
        'title' => 'Avatar',
        'genre' => 'Thriller',
        'description' => 'Avatar is a thrilling and memorable cinematic experience.',
        'rating' => '7.1', // over 10
        'release_date' => '2012-02-21',
        'duration_minutes' => 90,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/kyeqWdyUXW608qlYkRqosgbbJyK.jpg'
    ],
    [
        'title' => 'Titanic',
        'genre' => 'Fantasy',
        'description' => 'Titanic is a thrilling and memorable cinematic experience.',
        'rating' => '6.1', // over 10
        'release_date' => '2013-04-23',
        'duration_minutes' => 166,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/9xjZS2rlVxm8SFx8kPC3aIGCOYQ.jpg'
    ],
    [
        'title' => 'Gladiator',
        'genre' => 'Drama',
        'description' => 'Gladiator is a thrilling and memorable cinematic experience.',
        'rating' => '7.4', // over 10
        'release_date' => '2005-03-27',
        'duration_minutes' => 108,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/ty8TGRuvJLPUmAR1H1nRIsgwvim.jpg'
    ],
    [
        'title' => 'Shutter Island',
        'genre' => 'Adventure',
        'description' => 'Shutter Island is a thrilling and memorable cinematic experience.',
        'rating' => '7.7', // over 10
        'release_date' => '2016-05-26',
        'duration_minutes' => 143,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/nrmXQ0zcZUL8jFLrakWc90IR8z9.jpg'
    ],
    [
        'title' => 'The Shawshank Redemption',
        'genre' => 'Drama',
        'description' => 'The Shawshank Redemption is a thrilling and memorable cinematic experience.',
        'rating' => '7.7', // over 10
        'release_date' => '2018-01-23',
        'duration_minutes' => 118,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/9cqNxx0GxF0bflZmeSMuL5tnGzr.jpg'
    ],
    [
        'title' => 'Fight Club',
        'genre' => 'Thriller',
        'description' => 'Fight Club is a thrilling and memorable cinematic experience.',
        'rating' => '8.1', // over 10
        'release_date' => '2005-12-13',
        'duration_minutes' => 161,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/pB8BM7pdSp6B6Ih7QZ4DrQ3PmJK.jpg'
    ],
    [
        'title' => 'Forrest Gump',
        'genre' => 'Thriller',
        'description' => 'Forrest Gump is a thrilling and memorable cinematic experience.',
        'rating' => '7.7', // over 10
        'release_date' => '2008-09-02',
        'duration_minutes' => 87,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/arw2vcBveWOVZr6pxd9XTd1TdQa.jpg'
    ],
    [
        'title' => 'The Godfather',
        'genre' => 'Animation',
        'description' => 'The Godfather is a thrilling and memorable cinematic experience.',
        'rating' => '8.7', // over 10
        'release_date' => '1999-04-10',
        'duration_minutes' => 178,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/3bhkrj58Vtu7enYsRolD1fZdja1.jpg'
    ],
    [
        'title' => 'Pulp Fiction',
        'genre' => 'Animation',
        'description' => 'Pulp Fiction is a thrilling and memorable cinematic experience.',
        'rating' => '8.1', // over 10
        'release_date' => '2012-03-19',
        'duration_minutes' => 137,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/vQWk5YBFWF4bZaofAbv0tShwBvQ.jpg'
    ],
    [
        'title' => 'The Prestige',
        'genre' => 'Animation',
        'description' => 'The Prestige is a thrilling and memorable cinematic experience.',
        'rating' => '9.5', // over 10
        'release_date' => '2019-09-16',
        'duration_minutes' => 107,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/Ag2B2KHKQPukjH7WutmgnnSNurZ.jpg'
    ],
    [
        'title' => 'The Lion King',
        'genre' => 'Drama',
        'description' => 'The Lion King is a thrilling and memorable cinematic experience.',
        'rating' => '9.3', // over 10
        'release_date' => '2023-08-21',
        'duration_minutes' => 158,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/dzBtMocZuJbjLOXvrl4zGYigDzh.jpg'
    ],
    [
        'title' => 'The Avengers',
        'genre' => 'Fantasy',
        'description' => 'The Avengers is a thrilling and memorable cinematic experience.',
        'rating' => '8.8', // over 10
        'release_date' => '2013-09-02',
        'duration_minutes' => 134,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/p2SrnKTQjLRXBCcTZtYkTZCwLpp.jpg'
    ],
    [
        'title' => 'Iron Man',
        'genre' => 'Thriller',
        'description' => 'Iron Man is a thrilling and memorable cinematic experience.',
        'rating' => '6.7', // over 10
        'release_date' => '1997-04-18',
        'duration_minutes' => 153,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/78lPtwv72eTNqFW9COBYI0dWDJa.jpg'
    ],
    [
        'title' => 'Black Panther',
        'genre' => 'Animation',
        'description' => 'Black Panther is a thrilling and memorable cinematic experience.',
        'rating' => '8.8', // over 10
        'release_date' => '2021-12-10',
        'duration_minutes' => 169,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/uxzzxijgPIY7slzFvMotPv8wjKA.jpg'
    ],
    [
        'title' => 'Doctor Strange',
        'genre' => 'Sci-Fi',
        'description' => 'Doctor Strange is a thrilling and memorable cinematic experience.',
        'rating' => '8.4', // over 10
        'release_date' => '2009-09-01',
        'duration_minutes' => 169,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/xf8PbyQcR5ucXErmZNzdKR0s8ya.jpg'
    ],
    [
        'title' => 'Captain Marvel',
        'genre' => 'Action',
        'description' => 'Captain Marvel is a thrilling and memorable cinematic experience.',
        'rating' => '8.9', // over 10
        'release_date' => '2017-02-21',
        'duration_minutes' => 139,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/AtsgWhDnHTq68L0lLsUrCnM7TjG.jpg'
    ],
    [
        'title' => 'The Batman',
        'genre' => 'Fantasy',
        'description' => 'The Batman is a thrilling and memorable cinematic experience.',
        'rating' => '7.3', // over 10
        'release_date' => '1995-04-09',
        'duration_minutes' => 130,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/3w7koeOR2x71XYMJDGpygxYtScI.jpg'
    ],
    [
        'title' => 'Joker',
        'genre' => 'Thriller',
        'description' => 'Joker is a thrilling and memorable cinematic experience.',
        'rating' => '7.0', // over 10
        'release_date' => '1999-07-04',
        'duration_minutes' => 170,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/udDclJoHjfjb8Ekgsd4FDteOkCU.jpg'
    ],
    [
        'title' => 'Tenet',
        'genre' => 'Thriller',
        'description' => 'Tenet is a thrilling and memorable cinematic experience.',
        'rating' => '6.9', // over 10
        'release_date' => '2009-09-05',
        'duration_minutes' => 109,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/aCIFMriQh8rvhxpN1IWGgvH0Tlg.jpg'
    ],
    [
        'title' => 'Dunkirk',
        'genre' => 'Thriller',
        'description' => 'Dunkirk is a thrilling and memorable cinematic experience.',
        'rating' => '7.8', // over 10
        'release_date' => '2007-02-21',
        'duration_minutes' => 143,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/b4Oe15CGLL61Ped0RAS9JpqdmCt.jpg'
    ],
    [
        'title' => 'Oppenheimer',
        'genre' => 'Sci-Fi',
        'description' => 'Oppenheimer is a thrilling and memorable cinematic experience.',
        'rating' => '8.1', // over 10
        'release_date' => '2010-07-07',
        'duration_minutes' => 91,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/8Gxv8gSFCU0XGDykEGv7zR1n2ua.jpg'
    ],
    [
        'title' => 'Coco',
        'genre' => 'Sci-Fi',
        'description' => 'Coco is a thrilling and memorable cinematic experience.',
        'rating' => '8.0', // over 10
        'release_date' => '2005-05-07',
        'duration_minutes' => 125,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/6Ryitt95xrO8KXuqRGm1fUuNwqF.jpg'
    ],
    [
        'title' => 'Up',
        'genre' => 'Thriller',
        'description' => 'Up is a thrilling and memorable cinematic experience.',
        'rating' => '6.2', // over 10
        'release_date' => '2014-08-18',
        'duration_minutes' => 92,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/mFvoEwSfLqbcWwFsDjQebn9bzFe.jpg'
    ],
    [
        'title' => 'Inside Out',
        'genre' => 'Fantasy',
        'description' => 'Inside Out is a thrilling and memorable cinematic experience.',
        'rating' => '8.0', // over 10
        'release_date' => '2016-06-05',
        'duration_minutes' => 86,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/ehlIOfLdYT7SPl6dU6JmZBHXEcb.jpg'
    ],
    [
        'title' => 'Toy Story',
        'genre' => 'Drama',
        'description' => 'Toy Story is a thrilling and memorable cinematic experience.',
        'rating' => '7.3', // over 10
        'release_date' => '2009-01-15',
        'duration_minutes' => 174,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/uXDfjJbdP4ijW5hWSBrPrlKpxab.jpg'
    ],
    [
        'title' => 'Finding Nemo',
        'genre' => 'Fantasy',
        'description' => 'Finding Nemo is a thrilling and memorable cinematic experience.',
        'rating' => '8.7', // over 10
        'release_date' => '2002-03-07',
        'duration_minutes' => 93,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/eHuGQ10FUzK1mdOY69wF5pGgEf5.jpg'
    ],
    [
        'title' => 'The Incredibles',
        'genre' => 'Sci-Fi',
        'description' => 'The Incredibles is a thrilling and memorable cinematic experience.',
        'rating' => '8.3', // over 10
        'release_date' => '2001-12-01',
        'duration_minutes' => 130,
        'poster_url' => 'https://www.themoviedb.org/t/p/w1280/2LqaLgk4Z226KkgPJuiOQ58wvrm.jpg'
    ]
];

$query = "INSERT INTO movies (title, genre, description, rating, release_date, duration_minutes, poster_url)
          VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->prepare($query);

foreach ($movies as $movie) {
    $stmt->bind_param(
        'sssssis',
        $movie['title'],
        $movie['genre'],
        $movie['description'],
        $movie['rating'],
        $movie['release_date'],
        $movie['duration_minutes'],
        $movie['poster_url']
    );
    $stmt->execute();
}

echo "Movies seeded successfully.";
?>