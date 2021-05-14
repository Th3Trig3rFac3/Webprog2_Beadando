<?php
    //$receptek = db_fetchAll('SELECT * FROM posts');
    $recipes = db_fetchAll('SELECT posts.id, posts.name, posts.file_name ,posts.description, posts.post_time, users.id, users.username FROM posts, users WHERE users.id = posts.owner_id');
?>

<?php foreach ($recipes as $recipe): ?>
    <div class="card col-auto">
        <div class="row card-header m-1">
            <div class="col-auto">
                <img class='img-fluid' alt="" src="">
            </div>
            <div class="col-auto">
                <h4><a><?= $recipe['name'] ?></a> </h4>
            </div>
        </div>
        <p class="card-body">
            <?= $recipe['description'] ?>
        </p>
        <div class="card-footer m-1 row">
            <span class="col">Feltöltés dátuma: <?= $recipe['post_time'] ?> </span>
            <span class="col">Feltöltő: <?= $recipe['username'] ?> </span>
        </div>
    </div>
<?php endforeach; ?>