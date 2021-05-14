<?php
$receptek = db_fetchAll(query: 'Select * From posts where owner_Id = :Id',parameters: [':Id' => $_SESSION['user']['Id']]);

?>
<?php foreach ($receptek as $recept): ?>
    <div class="card col-auto h5 mb-5">
        <div class="row card-header m-1">
            <div class="col-auto">
                <img class='img-fluid' src="/public/uploads">
            </div>
            <div class="col-auto">
                <h4><a><?= $recept['name'] ?></a> </h4>
            </div>
        </div>
        <p class="card-body">
            <?= $recept['description'] ?>
        </p>
        <div class="card-footer m-1 row">
            <span class="col">Feltöltés dátuma:<?= $recept['Post_Time'] ?> </span>
            <span class="col">Feltöltő:<?= $recept['owner_Id'] ?> </span>       <!-- később javítani -->
        </div>
    </div>
    <a class="btn btn-warning" href="?p=subreddit/edit&r=<?= $recept['Id'] ?>">Edit</a>
    <a class="btn btn-danger" href="?p=subreddit/delete&r=<?= $recept['Id'] ?>">Delete</a>
<?php endforeach; ?>