<?php

use Core\Database;
use Core\Validator;
use Core\Response;

require(base_path('Core\Validator.php'));
$config = require(base_path('config.php'));
$db = new Database($config['database']);


$errors = [];

$book = $db->query('select * from books where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

$heading = 'Edit Book';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = validateInputs($errors);
    $errors = fileUpload($errors);
    $newFilePath=getFilePath($book);



    if (empty($errors)) {
        $db->query('UPDATE books SET title = :title, author = :author, publishing_date = :publishing_date, cover_image = :cover_image, summary = :summary WHERE id = :id', [
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'publishing_date' => $_POST['publishing_date'],
            'cover_image' => $newFilePath,
            'summary' => $_POST['summary'],
            'id' => $book['id'],
        ]);

        header('Location: /books');
        exit;
    }
    
}

function getFilePath($book){
    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] === UPLOAD_ERR_OK) {
        $title = $_POST['title'];
        $fileName = $_FILES['cover_image']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = $title . '.' . $fileExtension;
        $uploadFileDir= 'uploads\\';
        $dest_path = $uploadFileDir . $newFileName;
        return $dest_path;}
    else
        return $book['cover_image'];
}

function displayError($errors, $field) {
    if (isset($errors[$field])) {
        echo '<p class="text-red-600">' . $errors[$field] . '</p>';
    }
}

function validateInputs($errors){
    // Validate input fields for a book
    if (!Validator::string($_POST['title']))
        $errors['title'] = 'Book Name should be between 1 and 255 characters';

    if (!Validator::string($_POST['author']))
        $errors['author'] = 'Author Name should be between 1 and 255 characters';

    if (!Validator::string($_POST['publishing_date']))
        $errors['publishing_date'] = 'Publishing date is required';

    if (!Validator::string($_POST['summary'], 1, 1000))
        $errors['summary'] = 'Summary should be between 1 and 1000 characters';

    //no need check image default is same image in db
    return $errors;
}

    
function fileUpload($errors){
    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['cover_image']['tmp_name'];
        $fileName = $_FILES['cover_image']['name'];
        $fileSize = $_FILES['cover_image']['size'];
        $fileType = $_FILES['cover_image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            // Directory in which the uploaded file will be moved
            $title = $_POST['title'];
            $newFileName = $title . '.' . $fileExtension;
            $uploadFileDir= 'uploads\\';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                echo 'File is successfully uploaded.';
                //return $dest_path;

            } else {
                $errors['cover_image'] = 'Error moving file to upload directory';
            }
        } else {
            $errors['cover_image'] = 'No file uploaded or upload error occurred';
        }

    }
    return $errors;
}

view("books/edit.view.php", [
    'heading'=> 'Edit Book',
    'book'=>$book,
    'errors'=>$errors,
]);
