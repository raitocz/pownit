<?php
/** @var string $title */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pown.it wesbite archive">
    <meta name="theme-color" content="#000000"/>
</head>

<body>

<a href="./">
    <img id="logo" src="assets/img/logo.png" alt="POWN.IT">
</a>

<div id="content">
    <?= $this->section("content") ?>
</div>

</body>

</html>