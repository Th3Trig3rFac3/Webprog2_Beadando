<?php
    $posts = db_fetchAll('SELECT * FROM posts, users where users.id = posts.owner_id');
?>
<?php foreach ($posts as $recipe): ?>
    <div class="card col-auto h5 mb-5">
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
            <span class="col">Feltöltő: <?= $recipe['username'] ?> </span>
        </div>
    </div>
    <a class="btn btn-warning" href="?p=subreddit/edit&r=<?= $recipe['id'] ?>">Edit</a>
    <a class="btn btn-danger" href="?p=subreddit/delete&r=<?= $recipe['id'] ?>">Delete</a>
<?php endforeach; ?>