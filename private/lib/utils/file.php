<?php
function uploads(string $src): string{
    return "public/uploads/$src";
}

function getExtension(string $targetPath): string{
    return strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
}

function exportCSV(array $data): void{
    $fields = array_keys($data[0]);
    $fileName = uniqid('out_', true);
    $f = fopen(__DIR__ . "/../../../public/$fileName.csv", 'wb');
    fputcsv($f, $fields, ';');
    foreach ($data as $line){
        fputcsv($f, $line, ';');
    }

    echo "<script>window.location.replace('" . ROOT_URL . "/public/$fileName.csv');</script>";
}