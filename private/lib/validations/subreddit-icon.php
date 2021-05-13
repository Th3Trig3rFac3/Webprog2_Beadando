<?php
function validateIconUpload(string $tmpPath, string $targetPath): array {
    $uploadErrors = [];

    if (!isset($_FILES['icon'])
        || !file_exists($tmpPath)
        || $_FILES['icon']['size'] !== filesize($tmpPath)
    ) {
        $uploadErrors['_'][] = 'There was an error uploading your file. Please try again.';
    }

    if ($_FILES['icon']['size'] > 10_000_000) {
        $uploadErrors['fileToUpload'][] = 'The file you tried to upload was more than 10MB';
    }

    if (file_exists($targetPath)) {
        $uploadErrors['icon'][] = 'There is already a file uploaded with this name';
    }

    return $uploadErrors;
}

function validateSubredditCreation(): array
{
    $errors = [];
    if(!isset($_POST['name'])){
        $errors['name'][] = 'Subreddit needs a name';
    }elseif (strlen($_POST['name']) < 3){
        $errors['name'][] = 'Subreddit name must be longer than 3 characters';
    }else{ //ezt nem kell használni, mert lehet több ugyan olyan nevű recept
        $subreddit = db_fetch('subreddits', 'name LIKE :name', [':name' => $_POST['name']]);
        if($subreddit){
            $errors['name'][] = 'Subreddit already exists';
        }
    }

    return $errors;
}
