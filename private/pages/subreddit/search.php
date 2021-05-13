<?php
require_once "../components/nav.php";
$tömb = kereses();
var_dump($tömb);
$search = db_fetchAll('select * from posts where name like :name', parameters: [':name' => $_POST['search']]);
?>

<?php foreach ($search as $recept): ?>
    <div class="card col-auto">
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
<?php endforeach; ?>