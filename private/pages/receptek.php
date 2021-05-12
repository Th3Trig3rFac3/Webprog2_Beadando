<?php
    $receptek = db_fetchAll('SELECT * FROM posts');
?>
<?php foreach ($receptek as $receptek): ?>
    <div class="card col-auto">
        <div class="row card-header m-1">
            <div class="col-auto">
                <img class='img-fluid' src="<?= ROOT_URL . $receptek['File_Name'] ?> ">
            </div>
            <div class="col-auto">
                <h4><a href="?p=subreddit/read&r=<?= $receptek['name'] ?>"><?= $receptek['name'] ?></a> </h4>
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
<?php endforeach; ?>