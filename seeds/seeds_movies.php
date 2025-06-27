<?php
require('../connection/connection.php');

$movies = [
    [
        'title' => 'Interstellar',
        'genre' => 'Fantasy',
        'description' => 'Interstellar is a thrilling and memorable cinematic experience.',
        'rating' => '8.1', // over 10
        'release_date' => '1999-07-13',
        'duration_minutes' => 161,
        'poster_url' => 'https://example.com/interstellar.jpg'
    ],
    [
        'title' => 'The Dark Knight',
        'genre' => 'Sci-Fi',
        'description' => 'The Dark Knight is a thrilling and memorable cinematic experience.',
        'rating' => '6.9', // over 10
        'release_date' => '2004-09-28',
        'duration_minutes' => 157,
        'poster_url' => 'https://example.com/the_dark_knight.jpg'
    ],
    [
        'title' => 'The Matrix',
        'genre' => 'Adventure',
        'description' => 'The Matrix is a thrilling and memorable cinematic experience.',
        'rating' => '7.6', // over 10
        'release_date' => '1996-10-19',
        'duration_minutes' => 160,
        'poster_url' => 'https://example.com/the_matrix.jpg'
    ],
    [
        'title' => 'Avatar',
        'genre' => 'Thriller',
        'description' => 'Avatar is a thrilling and memorable cinematic experience.',
        'rating' => '7.1', // over 10
        'release_date' => '2012-02-21',
        'duration_minutes' => 90,
        'poster_url' => 'https://example.com/avatar.jpg'
    ],
    [
        'title' => 'Titanic',
        'genre' => 'Fantasy',
        'description' => 'Titanic is a thrilling and memorable cinematic experience.',
        'rating' => '6.1', // over 10
        'release_date' => '2013-04-23',
        'duration_minutes' => 166,
        'poster_url' => 'https://example.com/titanic.jpg'
    ],
    [
        'title' => 'Gladiator',
        'genre' => 'Drama',
        'description' => 'Gladiator is a thrilling and memorable cinematic experience.',
        'rating' => '7.4', // over 10
        'release_date' => '2005-03-27',
        'duration_minutes' => 108,
        'poster_url' => 'https://example.com/gladiator.jpg'
    ],
    [
        'title' => 'Shutter Island',
        'genre' => 'Adventure',
        'description' => 'Shutter Island is a thrilling and memorable cinematic experience.',
        'rating' => '7.7', // over 10
        'release_date' => '2016-05-26',
        'duration_minutes' => 143,
        'poster_url' => 'https://example.com/shutter_island.jpg'
    ],
    [
        'title' => 'The Shawshank Redemption',
        'genre' => 'Drama',
        'description' => 'The Shawshank Redemption is a thrilling and memorable cinematic experience.',
        'rating' => '7.7', // over 10
        'release_date' => '2018-01-23',
        'duration_minutes' => 118,
        'poster_url' => 'https://example.com/the_shawshank_redemption.jpg'
    ],
    [
        'title' => 'Fight Club',
        'genre' => 'Thriller',
        'description' => 'Fight Club is a thrilling and memorable cinematic experience.',
        'rating' => '8.1', // over 10
        'release_date' => '2005-12-13',
        'duration_minutes' => 161,
        'poster_url' => 'https://example.com/fight_club.jpg'
    ],
    [
        'title' => 'Forrest Gump',
        'genre' => 'Thriller',
        'description' => 'Forrest Gump is a thrilling and memorable cinematic experience.',
        'rating' => '7.7', // over 10
        'release_date' => '2008-09-02',
        'duration_minutes' => 87,
        'poster_url' => 'https://example.com/forrest_gump.jpg'
    ],
    [
        'title' => 'The Godfather',
        'genre' => 'Animation',
        'description' => 'The Godfather is a thrilling and memorable cinematic experience.',
        'rating' => '8.7', // over 10
        'release_date' => '1999-04-10',
        'duration_minutes' => 178,
        'poster_url' => 'https://example.com/the_godfather.jpg'
    ],
    [
        'title' => 'Pulp Fiction',
        'genre' => 'Animation',
        'description' => 'Pulp Fiction is a thrilling and memorable cinematic experience.',
        'rating' => '8.1', // over 10
        'release_date' => '2012-03-19',
        'duration_minutes' => 137,
        'poster_url' => 'https://example.com/pulp_fiction.jpg'
    ],
    [
        'title' => 'The Prestige',
        'genre' => 'Animation',
        'description' => 'The Prestige is a thrilling and memorable cinematic experience.',
        'rating' => '9.5', // over 10
        'release_date' => '2019-09-16',
        'duration_minutes' => 107,
        'poster_url' => 'https://example.com/the_prestige.jpg'
    ],
    [
        'title' => 'The Lion King',
        'genre' => 'Drama',
        'description' => 'The Lion King is a thrilling and memorable cinematic experience.',
        'rating' => '9.3', // over 10
        'release_date' => '2023-08-21',
        'duration_minutes' => 158,
        'poster_url' => 'https://example.com/the_lion_king.jpg'
    ],
    [
        'title' => 'The Avengers',
        'genre' => 'Fantasy',
        'description' => 'The Avengers is a thrilling and memorable cinematic experience.',
        'rating' => '8.8', // over 10
        'release_date' => '2013-09-02',
        'duration_minutes' => 134,
        'poster_url' => 'https://example.com/the_avengers.jpg'
    ],
    [
        'title' => 'Iron Man',
        'genre' => 'Thriller',
        'description' => 'Iron Man is a thrilling and memorable cinematic experience.',
        'rating' => '6.7', // over 10
        'release_date' => '1997-04-18',
        'duration_minutes' => 153,
        'poster_url' => 'https://example.com/iron_man.jpg'
    ],
    [
        'title' => 'Black Panther',
        'genre' => 'Animation',
        'description' => 'Black Panther is a thrilling and memorable cinematic experience.',
        'rating' => '8.8', // over 10
        'release_date' => '2021-12-10',
        'duration_minutes' => 169,
        'poster_url' => 'https://example.com/black_panther.jpg'
    ],
    [
        'title' => 'Doctor Strange',
        'genre' => 'Sci-Fi',
        'description' => 'Doctor Strange is a thrilling and memorable cinematic experience.',
        'rating' => '8.4', // over 10
        'release_date' => '2009-09-01',
        'duration_minutes' => 169,
        'poster_url' => 'https://example.com/doctor_strange.jpg'
    ],
    [
        'title' => 'Captain Marvel',
        'genre' => 'Action',
        'description' => 'Captain Marvel is a thrilling and memorable cinematic experience.',
        'rating' => '8.9', // over 10
        'release_date' => '2017-02-21',
        'duration_minutes' => 139,
        'poster_url' => 'https://example.com/captain_marvel.jpg'
    ],
    [
        'title' => 'The Batman',
        'genre' => 'Fantasy',
        'description' => 'The Batman is a thrilling and memorable cinematic experience.',
        'rating' => '7.3', // over 10
        'release_date' => '1995-04-09',
        'duration_minutes' => 130,
        'poster_url' => 'https://example.com/the_batman.jpg'
    ],
    [
        'title' => 'Joker',
        'genre' => 'Thriller',
        'description' => 'Joker is a thrilling and memorable cinematic experience.',
        'rating' => '7.0', // over 10
        'release_date' => '1999-07-04',
        'duration_minutes' => 170,
        'poster_url' => 'https://example.com/joker.jpg'
    ],
    [
        'title' => 'Tenet',
        'genre' => 'Thriller',
        'description' => 'Tenet is a thrilling and memorable cinematic experience.',
        'rating' => '6.9', // over 10
        'release_date' => '2009-09-05',
        'duration_minutes' => 109,
        'poster_url' => 'https://example.com/tenet.jpg'
    ],
    [
        'title' => 'Dunkirk',
        'genre' => 'Thriller',
        'description' => 'Dunkirk is a thrilling and memorable cinematic experience.',
        'rating' => '7.8', // over 10
        'release_date' => '2007-02-21',
        'duration_minutes' => 143,
        'poster_url' => 'https://example.com/dunkirk.jpg'
    ],
    [
        'title' => 'Oppenheimer',
        'genre' => 'Sci-Fi',
        'description' => 'Oppenheimer is a thrilling and memorable cinematic experience.',
        'rating' => '8.1', // over 10
        'release_date' => '2010-07-07',
        'duration_minutes' => 91,
        'poster_url' => 'https://example.com/oppenheimer.jpg'
    ],
    [
        'title' => 'Coco',
        'genre' => 'Sci-Fi',
        'description' => 'Coco is a thrilling and memorable cinematic experience.',
        'rating' => '8.0', // over 10
        'release_date' => '2005-05-07',
        'duration_minutes' => 125,
        'poster_url' => 'https://example.com/coco.jpg'
    ],
    [
        'title' => 'Up',
        'genre' => 'Thriller',
        'description' => 'Up is a thrilling and memorable cinematic experience.',
        'rating' => '6.2', // over 10
        'release_date' => '2014-08-18',
        'duration_minutes' => 92,
        'poster_url' => 'https://example.com/up.jpg'
    ],
    [
        'title' => 'Inside Out',
        'genre' => 'Fantasy',
        'description' => 'Inside Out is a thrilling and memorable cinematic experience.',
        'rating' => '8.0', // over 10
        'release_date' => '2016-06-05',
        'duration_minutes' => 86,
        'poster_url' => 'https://example.com/inside_out.jpg'
    ],
    [
        'title' => 'WALL-E',
        'genre' => 'Sci-Fi',
        'description' => 'WALL-E is a thrilling and memorable cinematic experience.',
        'rating' => '6.1', // over 10
        'release_date' => '2003-08-08',
        'duration_minutes' => 170,
        'poster_url' => 'https://example.com/wall-e.jpg'
    ],
    [
        'title' => 'Toy Story',
        'genre' => 'Drama',
        'description' => 'Toy Story is a thrilling and memorable cinematic experience.',
        'rating' => '7.3', // over 10
        'release_date' => '2009-01-15',
        'duration_minutes' => 174,
        'poster_url' => 'https://example.com/toy_story.jpg'
    ],
    [
        'title' => 'Finding Nemo',
        'genre' => 'Fantasy',
        'description' => 'Finding Nemo is a thrilling and memorable cinematic experience.',
        'rating' => '8.7', // over 10
        'release_date' => '2002-03-07',
        'duration_minutes' => 93,
        'poster_url' => 'https://example.com/finding_nemo.jpg'
    ],
    [
        'title' => 'The Incredibles',
        'genre' => 'Sci-Fi',
        'description' => 'The Incredibles is a thrilling and memorable cinematic experience.',
        'rating' => '8.3', // over 10
        'release_date' => '2001-12-01',
        'duration_minutes' => 130,
        'poster_url' => 'https://example.com/the_incredibles.jpg'
    ],
    [
        'title' => 'Moana',
        'genre' => 'Action',
        'description' => 'Moana is a thrilling and memorable cinematic experience.',
        'rating' => '6.7', // over 10
        'release_date' => '2000-06-21',
        'duration_minutes' => 132,
        'poster_url' => 'https://example.com/moana.jpg'
    ],
    [
        'title' => 'Frozen',
        'genre' => 'Thriller',
        'description' => 'Frozen is a thrilling and memorable cinematic experience.',
        'rating' => '7.0', // over 10
        'release_date' => '2013-10-14',
        'duration_minutes' => 142,
        'poster_url' => 'https://example.com/frozen.jpg'
    ],
    [
        'title' => 'Soul',
        'genre' => 'Thriller',
        'description' => 'Soul is a thrilling and memorable cinematic experience.',
        'rating' => '7.6', // over 10
        'release_date' => '2004-12-01',
        'duration_minutes' => 156,
        'poster_url' => 'https://example.com/soul.jpg'
    ],
    [
        'title' => 'Luca',
        'genre' => 'Fantasy',
        'description' => 'Luca is a thrilling and memorable cinematic experience.',
        'rating' => '6.7', // over 10
        'release_date' => '1997-09-24',
        'duration_minutes' => 131,
        'poster_url' => 'https://example.com/luca.jpg'
    ],
    [
        'title' => 'Turning Red',
        'genre' => 'Animation',
        'description' => 'Turning Red is a thrilling and memorable cinematic experience.',
        'rating' => '6.8', // over 10
        'release_date' => '2006-09-06',
        'duration_minutes' => 134,
        'poster_url' => 'https://example.com/turning_red.jpg'
    ],
    [
        'title' => 'Cars',
        'genre' => 'Thriller',
        'description' => 'Cars is a thrilling and memorable cinematic experience.',
        'rating' => '9.3', // over 10
        'release_date' => '2015-11-25',
        'duration_minutes' => 109,
        'poster_url' => 'https://example.com/cars.jpg'
    ],
    [
        'title' => 'Zootopia',
        'genre' => 'Adventure',
        'description' => 'Zootopia is a thrilling and memorable cinematic experience.',
        'rating' => '8.6', // over 10
        'release_date' => '2002-07-28',
        'duration_minutes' => 163,
        'poster_url' => 'https://example.com/zootopia.jpg'
    ],
    [
        'title' => 'Ratatouille',
        'genre' => 'Adventure',
        'description' => 'Ratatouille is a thrilling and memorable cinematic experience.',
        'rating' => '8.8', // over 10
        'release_date' => '2006-10-12',
        'duration_minutes' => 180,
        'poster_url' => 'https://example.com/ratatouille.jpg'
    ],
    [
        'title' => 'Encanto',
        'genre' => 'Action',
        'description' => 'Encanto is a thrilling and memorable cinematic experience.',
        'rating' => '6.4', // over 10
        'release_date' => '2019-11-13',
        'duration_minutes' => 135,
        'poster_url' => 'https://example.com/encanto.jpg'
    ],
    [
        'title' => 'Mulan',
        'genre' => 'Sci-Fi',
        'description' => 'Mulan is a thrilling and memorable cinematic experience.',
        'rating' => '6.4', // over 10
        'release_date' => '2016-01-06',
        'duration_minutes' => 92,
        'poster_url' => 'https://example.com/mulan.jpg'
    ],
    [
        'title' => 'Aladdin',
        'genre' => 'Adventure',
        'description' => 'Aladdin is a thrilling and memorable cinematic experience.',
        'rating' => '6.9', // over 10
        'release_date' => '1997-05-05',
        'duration_minutes' => 154,
        'poster_url' => 'https://example.com/aladdin.jpg'
    ],
    [
        'title' => 'Beauty and the Beast',
        'genre' => 'Action',
        'description' => 'Beauty and the Beast is a thrilling and memorable cinematic experience.',
        'rating' => '9.4', // over 10
        'release_date' => '2005-10-02',
        'duration_minutes' => 162,
        'poster_url' => 'https://example.com/beauty_and_the_beast.jpg'
    ],
    [
        'title' => 'Hercules',
        'genre' => 'Animation',
        'description' => 'Hercules is a thrilling and memorable cinematic experience.',
        'rating' => '8.7', // over 10
        'release_date' => '1997-09-06',
        'duration_minutes' => 134,
        'poster_url' => 'https://example.com/hercules.jpg'
    ],
    [
        'title' => 'Tangled',
        'genre' => 'Thriller',
        'description' => 'Tangled is a thrilling and memorable cinematic experience.',
        'rating' => '8.7', // over 10
        'release_date' => '2007-04-21',
        'duration_minutes' => 121,
        'poster_url' => 'https://example.com/tangled.jpg'
    ],
    [
        'title' => 'Brave',
        'genre' => 'Adventure',
        'description' => 'Brave is a thrilling and memorable cinematic experience.',
        'rating' => '7.3', // over 10
        'release_date' => '1995-06-11',
        'duration_minutes' => 93,
        'poster_url' => 'https://example.com/brave.jpg'
    ],
    [
        'title' => 'Onward',
        'genre' => 'Thriller',
        'description' => 'Onward is a thrilling and memorable cinematic experience.',
        'rating' => '6.8', // over 10
        'release_date' => '2007-09-09',
        'duration_minutes' => 115,
        'poster_url' => 'https://example.com/onward.jpg'
    ],
    [
        'title' => 'Lightyear',
        'genre' => 'Action',
        'description' => 'Lightyear is a thrilling and memorable cinematic experience.',
        'rating' => '9.4', // over 10
        'release_date' => '1998-02-26',
        'duration_minutes' => 108,
        'poster_url' => 'https://example.com/lightyear.jpg'
    ],
    [
        'title' => 'The Revenant',
        'genre' => 'Fantasy',
        'description' => 'The Revenant is a thrilling and memorable cinematic experience.',
        'rating' => '6.5', // over 10
        'release_date' => '1997-08-22',
        'duration_minutes' => 88,
        'poster_url' => 'https://example.com/the_revenant.jpg'
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