<?php
/*
return [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
    '/books' => 'controllers/books/index.php',
    '/book' => 'controllers/books/show.php',
    '/book/add' => 'controllers/books/create.php',
    '/book/edit' => 'controllers/books/edit.php',
];*/

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/books', 'controllers/books/index.php');
$router->get('/book', 'controllers/books/show.php');
$router->get('/book/add', 'controllers/books/create.php');
$router->post('/book/add', 'controllers/books/create.php');
$router->get('/book/edit', 'controllers/books/edit.php');
$router->post('/book/edit', 'controllers/books/edit.php');
$router->post('/book', 'controllers/books/show.php');
