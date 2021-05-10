<?php
session_unset();
session_destroy();
session_start($_SESSION);
?>

<div class="alert alert-warning h3 col-auto text-center" role="alert">
    Ön kijelentkezett
</div>