<?php
$uploadErrors = [];

if(isset($_POST['submit'])){

    require_once 'private/lib/utils/file.php';
    require_once 'private/lib/validations/file-upload.php';

    $tmpPath = $_FILES['fileToUpload']['tmp_name'];
    $fileType = getExtension(uploads($_FILES['fileToUpload']['name']));
    $targetPath = uploads(uniqid('file_', true)) . ".$fileType";

    $uploadErrors = validateFileUpload($tmpPath, $targetPath);

    if(!$uploadErrors && !move_uploaded_file($tmpPath, $targetPath)){
        $uploadErrors['_'][] = 'There was an error uploading your file';
    }else{
        db_execute('INSERT INTO `files` (id, src, uploaded_by) VALUES (:id, :src, :uploaded_by)', [
            ':id' => uniqid('', true),
            ':src' => $targetPath,
            'uploaded_by' => $_SESSION['user']['id'],
        ]);
    }
}?>

<div>
    <form method="post" enctype="multipart/form-data">
        <div>
            <h4>Upload your file: </h4>
        </div>
        <div>
            <label for="fileToUpload">Select your file:</label>
            <input type="file" name="fileToUpload" id="fileToUpload" />
        </div>
        <?php if($uploadErrors): ?>
            <div>
                <h5>Upload failed!</h5>
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
            <input type="submit" name="submit" id="submit" value="Upload">
        </div>
    </form>
</div>