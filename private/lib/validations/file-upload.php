<?php
function validateFileUpload(string $tmpPath, string $targetPath): array {
    $uploadErrors = [];

    if (!isset($_FILES['fileToUpload'])
        || !file_exists($tmpPath)
        || $_FILES['fileToUpload']['size'] !== filesize($tmpPath)
    ) {
        $uploadErrors['_'][] = 'Hiba történt fáljfeltöltés közben. Próbálja újra';
    }

    if ($_FILES['fileToUpload']['size'] > 10_000_000) {
        $uploadErrors['fileToUpload'][] = 'A fálj amit fel szeretne tölteni meghaladja a limitet: 10MB';
    }

    if(!(str_ends_with(haystack: ($_FILES['fileToUpload']['name']), needle: '.png' || '.jpg' || '.gif'))){
        $uploadErrors['fileToUpload'][] = "Csak .png, .jpg és .gif kiterjeszésű képeket tölthet fel.";
    }

    if (file_exists($targetPath)) {
        $uploadErrors['fileToUpload'][] = 'Már van ilyen nevű fálj feltöltve';
    }

    return $uploadErrors;
}