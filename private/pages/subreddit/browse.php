<?php
    $subreddits = db_fetchAll('SELECT * FROM subreddits')
?>

<?php foreach ($subreddits as $subreddit): ?>
<div class="card">
    <div class="row card-header m-1">
        <div class="col-auto">
            <img class='subreddit-icon img-fluid' src="<?= ROOT_URL . $subreddit['icon'] ?> ">
        </div>
        <div class="col-auto">
            <h4><a href="?p=subreddit/read&r=<?= $subreddit['name'] ?>"><?= $subreddit['name'] ?></a> </h4>
        </div>
        <div class="col-auto">
            <a class="btn btn-primary" href="?p=subreddit/join&r=<?= $subreddit['id'] ?>">
                <i class='bi bi-plus-circle'></i> Join
            </a>
        </div>
    </div>
    <p class="card-body">
        <?= $subreddit['description'] ?>
    </p>
    <div class="card-footer m-1 row">
        <span class="col">Created at:<?= $subreddit['created_at'] ?> </span>
        <span class="col-auto">Owner:<?= $subreddit['owner'] ?> </span>
    </div>
</div>
    <hr>
<?php endforeach; ?>
