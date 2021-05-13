<?php
    $receptek = db_fetchAll('SELECT * FROM posts');
    $images = db_fetchAll('SELECT owner_Id, File_Name, posts.Post_Time as "Post_Time" FROM users, posts WHERE users.Id = posts.owner_Id'); //lehet szar, ne használd
?>

<?php foreach ($receptek as $receptek): ?>
    <div class="card col-auto">
        <div class="row card-header m-1">
            <div class="col-auto">
                <img class='img-fluid' src="<?= ROOT_URL . $receptek['File_Name'] ?> ">
            </div>
            <div class="col-auto">
                <h4><a><?= $receptek['name'] ?></a> </h4>
            </div>
        </div>
        <p class="card-body">
            <?= $receptek['description'] ?>
        </p>
        <div class="card-footer m-1 row">
            <span class="col">Feltöltés dátuma:<?= $receptek['Post_Time'] ?> </span>
            <span class="col">Feltöltő:<?= $receptek['owner_Id'] ?> </span>
        </div>
    </div>
<?php endforeach; ?>    <!--
<?php foreach ($images as $image): ?>
    <div>
        <img src="<?= $image['File_Name'] ?> " alt="">
        Uploaded by: <?= $image['owner_Id'] ?>
        Uploaded at: <?= $image['created_at'] ?>
    </div>
<?php endforeach; ?>    -->