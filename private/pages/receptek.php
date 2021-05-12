<?php
    $receptek = db_fetchAll('SELECT * FROM posts')
?>
<?php foreach ($receptek as $receptek): ?>
<div class="card">
    <div class="row card-header m-1">

    </div>
</div>
<?php endforeach; ?>