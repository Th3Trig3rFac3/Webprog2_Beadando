<?php
$receptek = db_fetch('posts', 'id = :id', [':id' => $_GET['r']]);
$errors = [];

if(isset($_POST['submit'])){
    require_once 'private/lib/utils/file.php'; //szar?

    if(empty($errors)){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $id = $receptek['id'];

        db_execute('UPDATE posts SET name = :name, description = :description WHERE id = :id', [
            ':name' => $name,
            ':description' => $description,
            ':id' => $receptek['id'],
        ]);

        require_once "private/lib/utils/request.php";
        redirect("owned_recepies");
    }
}?>

<div>
    <form method="post" enctype="multipart/form-data" class="col-auto">
        <div class="col-auto h5 mb-5">
            <laber for='name'>Recept új neve</laber>
            <input type="text" name="name" id="name" value="<?= $receptek['name'] ?>" required>
            <?php if (isset($errors['name'])): ?>
                <span class="alert alert-danger"><?= implode(', ', ($errors['name'] ?? [])) ?> </span>
            <?php endif; ?>
        </div>
        <div class="col-auto h5 mb-5">
            <label for="description">Új leírás</label>
            <textarea name="description" id="description" required><?= $receptek['description'] ?></textarea>
            <?php if (isset($errors['description'])): ?>
                <span class="alert alert-danger"><?= implode(', ', ($errors['description'] ?? [])) ?> </span>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary col-auto h3 mb-3" value="UPDATE" name="submit">Frissítés</button>
    </form>
</div>