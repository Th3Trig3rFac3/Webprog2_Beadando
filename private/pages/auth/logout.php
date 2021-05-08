<?php
session_unset();
session_destroy();
$PAGE = $_GET['p'] ?? 'home';
?>

<div class="alert alert-warning" role="alert">
    Ön kijelentkezett
</div>
