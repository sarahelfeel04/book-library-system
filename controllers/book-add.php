<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Add Book';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    validate ();
    $destPath = fileUpload();

    if (empty($errors) && $destPath!=false) {
        $db->query('INSERT INTO books(title, author, publishing_date, cover_image, summary) VALUES(:title, :author, :publishing_date, :cover_image, :summary)', [
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'publishing_date' => $_POST['publishing_date'],
            'cover_image' => $destPath,
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

    if ($_FILES['cover_image']['error'] === 4) {
        $errors['cover_image'] = 'Cover Image is required';
    }
}

function fileUpload(){
    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['cover_image']['tmp_name'];
        $fileName = $_FILES['cover_image']['name'];
        $fileSize = $_FILES['cover_image']['size'];
        $fileType = $_FILES['cover_image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedfileExtensions = array('jpg', 'gif', 'png');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            // Directory in which the uploaded file will be moved
            $title = $_POST['title'];
            $newFileName = $title . '.' . $fileExtension;
            $uploadFileDir = 'C:\laragon\www\book-library-system\uploads\\';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                echo 'File is successfully uploaded.';
                return $dest_path;

            } else {
                $errors['cover_image'] = 'Error moving file to upload directory';
                return false;
            }
        } else {
            $errors['cover_image'] = 'No file uploaded or upload error occurred';
            return false;
        }
    }
}

require 'views/book-add.view.php';
