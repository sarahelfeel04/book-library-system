<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Add Book';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    validate ();

    if (empty($errors)) {
        $db->query('INSERT INTO books(title, author, publishing_date, cover_image, summary) VALUES(:title, :author, :publishing_date, :cover_image, :summary)', [
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'publishing_date' => $_POST['publishing_date'],
            'cover_image' => $_POST['cover_image'],
            'summary' => $_POST['summary']
        ]);

        header('Location: /books');
        exit;
    }

}

function displayError($errors, $field) {
    if (isset($errors[$field])) {
        echo '<p class="text-red-600">' . $errors[$field] . '</p>';
    }
}

function validate(){
    // Validate input fields for a book
    if (strlen($_POST['title']) === 0) {
        $errors['title'] = 'Book Name is required';
    }

    if (strlen($_POST['title']) > 255) {
        $errors['title'] = 'Book Name cannot exceed 255 characters';
    }

    if (strlen($_POST['author']) === 0) {
        $errors['author'] = 'Author is required';
    }

    if (strlen($_POST['author']) > 255) {
        $errors['author'] = 'Author name cannot exceed 255 characters';
    }

    if (strlen($_POST['publishing_date']) === 0) {
        $errors['publishing_date'] = 'Publishing Date is required';
    }

    if (strlen($_POST['cover_image']) === 0) {
        $errors['cover_image'] = 'Cover Image URL is required';
    }
}

require 'views/book-add.view.php';
