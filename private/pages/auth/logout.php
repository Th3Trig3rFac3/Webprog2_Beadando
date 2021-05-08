<?php
session_unset();
session_destroy();
require_once 'private/pages/home.php'
?>

<div class="alert alert-warning h3 mb-3 col-auto text-center" role="alert">
    Ön kijelentkezett
</div>
