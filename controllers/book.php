<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Book';

$book = $db->query('select * from books where id = :id', [
    'id' => $_GET['id']
])->findOrFail();


require "views/book.view.php";