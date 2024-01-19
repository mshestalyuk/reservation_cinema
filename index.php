<?php
require 'Routing.php';
$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);
Routing::get('', 'DefaultController');
Routing::get('login', 'DefaultController');
Routing::get('registration', 'DefaultController');
Routing::get('profile_details', 'DefaultController');
Routing::get('film', 'DefaultController');
Routing::get('films', 'FilmController');

Routing::get('add_film', 'DefaultController');

Routing::post('login', 'SecurityController');
Routing::post('addFilm', 'FilmController');
Routing::post('registration', 'SecurityController');

Routing::run($path);