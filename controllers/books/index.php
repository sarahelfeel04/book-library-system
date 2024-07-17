<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'My Books';

$books = $db->query('select * from books')->get();

require "views/books/index.view.php";