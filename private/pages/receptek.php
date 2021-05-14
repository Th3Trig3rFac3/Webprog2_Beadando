<?php
    //$receptek = db_fetchAll('SELECT * FROM posts');
    $receptek = db_fetchAll('SELECT posts.id, posts.name, posts.File_Name ,posts.description, posts.Post_Time, users.id, users.username FROM posts, users WHERE users.id = posts.owner_id');
    $images = db_fetchAll('SELECT owner_Id, File_Name, posts.Post_Time as "Post_Time" FROM users, posts WHERE users.Id = posts.owner_Id'); //lehet szar, ne használd
?>

<?php foreach ($receptek as $recept): ?>
    <div class="card col-auto">
        <div class="row card-header m-1">
            <div class="col-auto">
                <img class='img-fluid' alt="" src="/public/uploads/<?= $receptek["posts.File_Name"] ?>">
            </div>
            <div class="col-auto">
                <h4><a><?= $recept['name'] ?></a> </h4>
            </div>
        </div>
        <p class="card-body">
            <?= $recept['description'] ?>
        </p>
        <div class="card-footer m-1 row">
            <span class="col">Feltöltés dátuma: <?= $recept['Post_Time'] ?> </span>
            <span class="col">Feltöltő: <?= $recept['username'] ?> </span>
        </div>
    </div>
<?php endforeach; ?>