<?php
require_once 'private/lib/utils/file-upload-type.php';

function validateFileUpload(string $tmpPath, string $targetPath): array {
    $uploadErrors = [];
    $accaptedFileTypes = ['.png','.jpg','.gif'];

    if (!(isset($_FILES['fileToUpload']))
        || !file_exists($tmpPath)
        || $_FILES['fileToUpload']['size'] !== filesize($tmpPath)
    ) {
        $uploadErrors['_'][] = 'Hiba történt fáljfeltöltés közben. Próbálja újra';
    }

    if(endsWithAny($_FILES['fileToUpload']['name'], $accaptedFileTypes)){
        $uploadErrors['fileToUpload'][] = null;
    }else {
        $uploadErrors['fileToUpload'][] = "Csak .png, .jpg és .gif kiterjeszésű képeket tölthet fel.";
    }

    if ($_FILES['fileToUpload']['size'] > 10_000_000) {
        $uploadErrors['fileToUpload'][] = 'A fálj amit fel szeretne tölteni meghaladja a limitet: 10MB';
    }

    if (file_exists($targetPath)) {
        $uploadErrors['fileToUpload'][] = 'Már van ilyen nevű fálj feltöltve';
    }

    return $uploadErrors;
}