<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
<body>

<?php include "komponenty/header.php"?>

<div class="banner">
    <img src="img/banner.jpg" alt="">
</div>

<div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Aké sú hlavné rozdiely medzi rôznymi modelmi iPhone?
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            Rozdiely medzi modelmi iPhone sa týkajú veľkosti displeja, výkonu procesora, kvality fotoaparátu a niekedy aj špecifických funkcii, ako je napríklad podpora Apple Pencil.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Ako dlho trvá batéria v priemere v novom iPhone?
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            Batéria v nových modeloch iPhone má odlišnú výdrž v závislosti od konkrétneho modelu. V priemere však môže vydržať od 8 do 12 hodín pri aktívnom používaní.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Aké sú výhody a nevýhody používania iPhone?
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            Výhody zahŕňajú vysokú kvalitu spracovania, spoľahlivosť softvéru a integráciu s ekosystémom Apple. Nevýhody môžu zahŕňať vyššiu cenu v porovnaní s inými značkami a obmedzenia voľby aplikácií mimo App Store.
        </div>
      </div>
    </div>
  </div>

<?php include "komponenty/footer.php"?>

    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>