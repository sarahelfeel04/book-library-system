<?php
use Core\Database;
use Core\Validator;
use Core\Response;

require(base_path('Core\Validator.php'));
$config = require(base_path('config.php'));
$db = new Database($config['database']);

$heading = 'Add Book';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $errors = validate($errors);
    $errors = fileUpload($errors);
    $newFilePath=getFilePath();

    //var_dump($errors);


    if (empty($errors)) {
        $db->query('INSERT INTO books(title, author, publishing_date, cover_image, summary) VALUES(:title, :author, :publishing_date, :cover_image, :summary)', [
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'publishing_date' => $_POST['publishing_date'],
            'cover_image' => $newFilePath,
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

function validate($errors){

    if (!Validator::string($_POST['title']))
        $errors['title'] = 'Book Name should be between 1 and 255 characters';

    if (!Validator::string($_POST['author']))
        $errors['author'] = 'Author Name should be between 1 and 255 characters';

    if (!Validator::string($_POST['publishing_date']))
        $errors['publishing_date'] = 'Publishing date is required';

    if (Validator::file($_FILES['cover_image']))
        $errors['cover_image'] = 'Cover Image is required';

    if (!Validator::string($_POST['summary'], 1, 1000))
        $errors['summary'] = 'Summary should be between 1 and 1000 characters';

    return $errors;


}

function getFilePath(){
    $title = $_POST['title'];
    $fileName = $_FILES['cover_image']['name'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $newFileName = $title . '.' . $fileExtension;
    $uploadFileDir= 'uploads\\';
    $dest_path = $uploadFileDir . $newFileName;
    return $dest_path;
}
function fileUpload($errors){
    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] === UPLOAD_ERR_OK && empty($errors)) {
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
                //return false;
            }
        } else {
            $errors['cover_image'] = 'No file uploaded or upload error occurred';
            //return false;
        }

    }
    return $errors;
}

view("books/create.view.php", [
    'heading'=> 'Add Book',
    'errors'=>$errors,
]);
