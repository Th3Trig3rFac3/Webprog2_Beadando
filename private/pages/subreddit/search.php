<?php
    $posts = db_fetchAll('select * from posts, users where name like :name and users.id = posts.owner_id', [':name' => $_GET['search']]);
?>

<?php foreach ($posts as $recipe): ?>
    <div class="card col-auto">
        <div class="row card-header m-1">
            <div class="col-auto">
                <img alt="" src="<?= ROOT_URL . $recipe['file_name'] ?>">
            </div>
            <div class="col-auto">
                <h4><a><?= $recipe['name'] ?></a> </h4>
            </div>
        </div>
        <p class="card-body">
            <?= $recipe['description'] ?>
        </p>
        <div class="card-footer m-1 row">
            <span class="col">Feltöltés dátuma:<?= $recipe['post_time'] ?> </span>
            <span class="col">Feltöltő:<?= $recipe['username'] ?> </span>       <!-- később javítani, kell ez?-->
        </div>
    </div>
<?php endforeach; ?>