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
}