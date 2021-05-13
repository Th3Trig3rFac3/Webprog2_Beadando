<?php
$subreddit = db_fetch('posts', 'id = :id', [':id' => $_GET['r']]);
?>
<!-- sok sok szar -->