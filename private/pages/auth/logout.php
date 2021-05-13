<?php
session_unset();
session_destroy();
session_start($_SESSION);
require_once "private/lib/utils/request.php";
if(empty($errors)){
    require_once "private/lib/utils/request.php";
    redirect("home");
}
?>

<div class="alert alert-warning h3 col-auto text-center" role="alert">
    Ön kijelentkezett
</div>