<?php
$errors = [];

if(isset($_POST['submit'])){
    require_once 'private/lib/utils/file.php';
    require_once 'private/lib/validations/subreddit-icon.php';

    $icon = '';

    if(isset($_FILES['icon'])){

        $tmpPath = $_FILES['icon']['tmp_name'];
        $fileType = getExtension(uploads($_FILES['icon']['name']));
        $targetPath = uploads(uniqid('icon_', true)) . ".$fileType";

        $errors = validateIconUpload($tmpPath, $targetPath);

        if(!$errors && !move_uploaded_file($tmpPath, $targetPath)){
            $errors['_'][] = 'There was an error uploading your file';
        }else{
            $icon = $targetPath;
        }
    }

    $errors = array_merge($errors, validateSubredditCreation());

    if(empty($errors)){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $owner = $_SESSION['user']['username'];

        db_execute('INSERT INTO subreddits (name, description, icon, owner) VALUES (:name, :description, :icon, :owner)', [
            ':name' => $name,
            ':description' => $description,
            ':icon' => $icon,
            ':owner' => $owner
        ]);
    }
}

?>

<div>
    <form method="post" enctype="multipart/form-data">
        <div>
            <label for='name'>Name of the Subreddit:</label>
            <input type='text' name='name' id='name' required/>
            <?php if (isset($errors['name'])): ?>
                <div>
                    <ul>
                    <?php foreach ($errors['name'] as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>

        <div>
            <label for='description'>Description:</label>
            <textarea name='description' id='description' required> </textarea>
        </div>

        <div>
            <label for='icon'>Icon:</label>
            <input type='file' name='icon' id='icon'/>
        </div>

        <?php if (isset($errors['_'])): ?>
            <div>
                <ul>
                    <?php foreach ($errors['_'] as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <input type="submit" name="submit" value="CREATE">
    </form>
</div>
