<?php
require 'Routing.php';
$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);
Routing::get('', 'DefaultController');
Routing::get('login', 'DefaultController');
Routing::get('registration', 'DefaultController');
Routing::get('profile_details', 'DefaultController');

Routing::get('film', 'DefaultController');

Routing::post('login', 'SecurityController');

Routing::run($path);