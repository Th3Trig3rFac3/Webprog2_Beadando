<?php
//minden file-ba kell a link sor
//elképzelés: 9gag clear copy. Ide kell a regisztráció a böngészéshez. Role-ok: owner/admin, moderator, user. Kép feltöltés, hozzá esetleg komment
//MySQL: regisztráltak adatok tárolására, olvasásra, ki melyik képet posztolta (bónusz az ideje(időzónák?))
//Be lehet jelentkezni, itt lehet regisztrálni is majd vagy átirányít a regisztráló page-re
//Role-ok: Mindenki userként kezdi, az owner oszthat ki magasabbat
//admin felület gomb csak akkor érhető el, ha admin/owner a bejelentkezett (kell a moderator külön?)
//BREAD: Browse:???
//A modellhez tartozzanak kapcsolt táblák??
//file feltöltés (nyílvánvaló), file-ba kiíratás? a letöltés gomb is nyílvávaló
//Szervezze a programkód különböző részeit külön file-okba: nyílvánvaló...
//Az alkalmazás file-jait védje megfelelően a .htaccess file segítségével: már kész?
//Adjon illeszkedő stílust az alkalmazásnak: bootstrap már integrálva?
//extra?: login history csv-be exportálása,
//what?:Bevitt adatot nem ellenőrzi megfelelően,A különböző funkciók csak URL-ből elérhetők(nincs minden weboldalra gomb?),Jelszót egyszerű szövegként tárol(encrypt?,hashelés?)
//problémák: kell a postokhoz time stemp?,
session_start();
require_once './private/lib/config.php';
require_once './private/lib/database.php';
$PAGE = $_GET['p'] ?? 'home';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=yes" >
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Element</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light"><?php require_once './private/components/nav.php' ?> </nav>
    <main><?php require_once 'private/lib/router.php'?></main>
    <footer><?php require_once 'private/components/footer.php'?></footer>
</body>
</html>