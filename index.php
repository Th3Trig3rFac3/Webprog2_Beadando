<?php
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Element</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-light"><?php require_once './private/components/nav.php' ?> </nav>
    <main><?php require_once 'private/lib/router.php'?></main>
    <footer class="mt-auto"><?php require_once 'private/components/footer.php'?></footer>
</body>
</html>