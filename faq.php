<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/faq.css">
  </head>
<body>

<?php $page = "faq.php"; include "komponenty/header.php";?>

<div class="banner">
    <img src="img/banner.jpg">
</div>

<section class="container text-center">
    <div class="row">
      <div class="col-50"> 
        <h3>Máte otázky?</h3>
        <h2>Aké sú hlavné vlastnosti nového modelu iPhone?</h2>
        <p class="odpoved">Nový model iPhone ponúka vylepšený fotoaparát, výkonnejší procesor a dlhšiu výdrž batérie.</p>
        <br>
        <h2>Prečo by som mal/a vybrať iPhone pred inými smartfónmi?</h2>
        <p class="odpoved">iPhone ponúka spoľahlivý operačný systém, vynikajúcu integráciu s ďalšími zariadeniami Apple a kvalitné spracovanie.</p>
      </div>
      <div class="col-50 text-right text-center">
        <h3>Napíšte nám</h3>
        <form id="contact" action="thankyou.php">
          <input type="text" placeholder="Vaše meno" id="meno" required><br>
          <input type="email" placeholder="Váš email" id="email" required><br>
          <textarea name="" placeholder="Vaša správa" id="sprava"></textarea><br>
          <input type="checkbox" name="" id="" required>
          <label for="">Súhlasím so spracovaním osobných údajov.</label><br>
          <input type="submit" value="Odoslať">
        </form>
      </div>
    </div>
  </section>

<?php include "komponenty/footer.php"?>

    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>