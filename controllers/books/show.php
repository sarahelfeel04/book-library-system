<?php

use Core\Database;
use Core\Response;

$config = require(base_path('config.php'));
$db = new Database($config['database']);

$heading = 'Book';

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null || $id === '')
    abort();

else {
    $book = $db->query('select * from books where id = :id', [
        'id' => $_GET['id']
    ])->findOrFail();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['confirm_delete'])) {
            $db->query('DELETE FROM books WHERE id = :id', [
                'id' => $book['id'],
            ]);
            $cover_image_path=$book['cover_image'];
            if (file_exists($cover_image_path)) {
                if (unlink($cover_image_path)) {
                    echo "File deleted successfully.";
                    header("Location: /books"); // Redirect to books page after deletion
                    exit();
                } else {
                    echo "Error deleting file.";
                }
            } else {
                echo "File does not exist.";
            }
            
            
        } 
    }

    view("books/show.view.php", [
        'heading'=> 'Book',
        'book'=>$book,
    ]);
}