<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domov</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include "komponenty/header.php" ?>

<div class="banner">
    <img src="img/banner.jpg" alt="">
</div>

<?php
    include_once "db/functions.php";
    pridajPozdrav();
?>
<div class="row">
    <div class="col-4 justify-content-center align-items-center d-flex">
        <div>
            <h1 class="text-center">Sme spoločnosť, ktorá neustále posúva hranice v oblasti mobilných technológií a vytvára revolučné produkty ako iPhone, ktoré menia spôsob, akým ľudia komunikujú, pracujú a žijú.</h1>
        </div>      
    </div>
    <div class="col-8">
        <div id="mobil" class="d-flex justify-content-end align-items-center">
            <img class="iphone" src="img/obrazok4.png" alt="">
        </div>
    </div>
</div>

<?php include "komponenty/footer.php"?>

<script src="js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
