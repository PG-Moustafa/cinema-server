<?php

return [

    // authentication
    '/login' => [
        'controller' => 'AuthController',
        'method' => 'login'
    ],
    '/register' => [
        'controller' => 'AuthController',
        'method' => 'register'
    ],


    // movies
    '/movies' => [
        'controller' => 'MovieController',
        'method' => 'getAllMovies'
    ],
    '/movie' => [
        'controller' => 'MovieController',
        'method' => 'getMovieById'
    ],
    // '/category_movies' => [
    //     'controller' => 'MovieController',
    //     'method' => 'getmoviesByCategoryId'
    // ],
    // '/movie_category' => [
    //     'controller' => 'MovieController',
    //     'method' => 'getCategoryBymovieId'
    // ],
    '/delete_movies' => [
        'controller' => 'MovieController',
        'method' => 'deleteAllMovies'
    ],
    '/delete_movie' => [
        'controller' => 'MovieController',
        'method' => 'deleteMovieById'
    ],
    '/add_movie' => [
        'controller' => 'MovieController',
        'method' => 'addMovie'
    ],
    // update movie


    // users
    '/users' => [
        'controller' => 'UserController',
        'method' => 'getAllUsers'
    ],
    '/user' => [
        'controller' => 'UserController',
        'method' => 'getUserById'
    ],
    '/delete_users' => [
        'controller' => 'UserController',
        'method' => 'deleteAllUsers'
    ],
    '/delete_user' => [
        'controller' => 'UserController',
        'method' => 'deleteUserById'
    ],
    '/add_user' => [
        'controller' => 'UserController',
        'method' => 'addUser'
    ],
    // update user




];

?>