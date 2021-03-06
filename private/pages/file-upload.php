<?php
$uploadErrors = [];

if(isset($_POST['submit'])){

    require_once 'private/lib/utils/file.php';
    require_once 'private/lib/validations/file-upload.php';

    $tmpPath = $_FILES['fileToUpload']['tmp_name'];
    $fileType = getExtension(uploads($_FILES['fileToUpload']['name']));
    $targetPath = uploads(uniqid('file_', true)) . ".$fileType";

    $uploadErrors = validateFileUpload($tmpPath, $targetPath);

    if(!($uploadErrors && move_uploaded_file($tmpPath, $targetPath))){
        $uploadErrors['_'][] = 'Hiba történt feltöltéskor';
    }
    else{
        db_execute('INSERT INTO `posts` (name, file_name, owner_id, description) VALUES (:name, :File_Name, :owner_id, :description)', [
            ':name' => $_POST['name'],
            ':File_Name' => $targetPath,
            ':owner_id' => $_SESSION['user']['id'],
            ':description' => $_POST['description'],
        ]);
    }
}
?>

<div>
    <form method="post" enctype="multipart/form-data" class="text-lg-center h8 mb-8 col-auto">
        <div>
            <h1 class="font-weight-normal">Válaszd ki a képet, amit fel szeretnél tölteni a recepthez: </h1>
        </div>
        <div>
            <label for="fileToUpload">Adjon hozzá képet:</label>
            <input type="file" name="fileToUpload" id="fileToUpload" required/>
        </div>
        <div>
            <label for="username">Adjon nevet a receptnek</label>
            <input type="text" class="form-control border border-primary" id="name" placeholder="Recept neve" name="name" aria-describedby="name" required>
        </div>
        <div>
            <label for="username">Adja meg a receptet</label>
            <input type="text" class="form-control border border-primary" id="description" placeholder="Recept " name="description" aria-describedby="description" required>
        </div>
        <?php if(!(empty($uploadErrors))): ?>
            <div>
                <h5>A feltöltés sikertelen!</h5>
                <?php foreach ($uploadErrors as $field => $messages): ?>
                    <h6><?= $field ?>: </h6>
                    <ul>
                        <?php foreach ($messages as $message): ?>
                            <li><?= $message ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div>
            <input type="submit" name="submit" id="submit" value="Feltöltés" class="btn btn-lg btn-primary text-center">
        </div>
    </form>
</div>