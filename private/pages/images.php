<?php
$images = db_fetchAll('SELECT username, src, files.created_at as "created_at" FROM users, files WHERE users.id = files.uploaded_by');
?>
<?php foreach ($images as $image): ?>
    <div>
        <img src="<?= $image['file_mame'] ?> " alt="">
        Uploaded by: <?= $image['owner_id'] ?>
        Uploaded at: <?= $image['created_at'] ?>
    </div>
<?php endforeach; ?>
<!-- postok kiírása bootstrap kártyákkal -->