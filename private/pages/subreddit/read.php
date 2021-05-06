<?php
$subreddit = db_fetch('subreddits', 'name LIKE :name', [':name' => $_GET['r']]);
$posts = db_fetchAll('SELECT * FROM posts WHERE subreddit_id LIKE :sid', [':sid' => $subreddit['id']])
?>
<div class="row">
    <div class="col-12 col-lg-8">
        <?php foreach ($posts as $post): ?>
            <div class="card mb-3">
                <h4 class="card-header"><?= $post['title'] ?></h4>

                <div class="card-body">
                    <img src="<?= $post['attachment'] ?> " alt=''>

                    <p>
                        <?= substr($post['content'], 0, 120) ?>...
                    </p>
                </div>

                <div class="card-footer">
                    <span>Created at: <?= $post['created_at'] ?> </span> |
                    <span>Created by: <?= $post['owner'] ?> </span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="col-12 col-lg-4">
        <div class="card">
            <h4 class="card-header">About the community</h4>

            <div class="card-body">
                Members: <?=
                db_fetchAll('SELECT COUNT(*) AS "c" FROM subreddit_users WHERE subreddit_id LIKE :subreddit_id',
                            [':subreddit_id' => $subreddit['id']])[0]['c'] + 1
                ?>
            </div>

            <div class="card-body btn-group">
                <a class="btn btn-success" href='?p=new-post'>New Post</a>
                <?php
                $user = $_SESSION['user'] ?? ['auth' => -1, 'username' => ''];
                /** @noinspection TypeUnsafeComparisonInspection */
                if ($user['auth'] == 9 || $subreddit['owner'] === $user['username']): ?>
                    <a class="btn btn-warning" href="?p=subreddit/edit&r=<?= $subreddit['id'] ?>">Edit</a>
                    <a class="btn btn-danger" href='?p=subreddit/delete&r=<?= $subreddit['id'] ?>'>Delete Subreddit</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
