<?php
$subreddit = db_fetch('posts', 'Id = :id', [':id' => $_GET['r']]);
$errors = [];

if(isset($_POST['submit'])){
    require_once 'private/lib/utils/file.php'; //szar
    require_once 'private/lib/validations/subreddit-icon.php'; //szar

    if(empty($errors)){     //átírni sajátra
        $name = $_POST['name'];
        $description = $_POST['description'];

        db_execute('UPDATE posts SET name = :name, description = :descriptionWHERE id = :id', [
            ':name' => $name,
            ':description' => $description,
            ':id' => $subreddit['id'],
        ]);
    }
}

?>