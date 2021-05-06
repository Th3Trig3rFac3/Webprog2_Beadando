<?php
function uploads(string $src): string{
    return "public/uploads/$src";
}

function getExtension(string $targetPath): string{
    return strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
}