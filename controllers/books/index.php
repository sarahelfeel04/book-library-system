<?php

$config = require(base_path('config.php'));
$db = new Database($config['database']);

$heading = 'My Books';

$books = $db->query('select * from books')->get();

view("books/index.view.php", [
    'heading'=> 'My Books',
    'books'=>$books,
]);