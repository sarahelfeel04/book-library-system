<?php

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH.'Core/'.'functions.php';
require base_path('Core/Database.php');
require base_path('Core/Response.php');
//require base_path('Core/router.php');
require base_path('Core/Router.php');

$router = new \Core\Router();
$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = isset($_POST['_method']) ? $_POST['_method']: $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);