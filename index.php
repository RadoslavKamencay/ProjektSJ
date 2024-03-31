<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
<body>


<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
        <a href="index.php"><img src="img/apple.png" height="50"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="collapse navbar-collapse justify-content-center">
                <button id="myButton">Kliknite tu</button>
            </div>
            <ul class="navbar-nav">
                <a class="nav-link" href="index.php">Domov</a>
                <a class="nav-link" href="galeria.php">Galéria</a>
                <a class="nav-link" href="faq.php">FAQ</a>
                <a class="nav-link" href="kontakt.php">Kontakt</a>
            </ul>
        </div>
    </nav>
</header>



<div class="banner">
    <img src="img/banner.jpg" alt="">
    <p>Domov</p>
</div>



<div class="row">
    <div class="col-4 justify-content-center align-items-center d-flex">
        <div>
            <h1 class="text-center">Sme spoločnosť, ktorá neustále posúva hranice v oblasti mobilných technológií a vytvára revolučné produkty ako iPhone, ktoré menia spôsob, akým ľudia komunikujú, pracujú a žijú.</h1>
        </div>      
    </div>
    <div class="col-8">
        <div id="mobil" class="d-flex justify-content-end align-items-center">
            <img src="img/obrazok1.png" alt="">
        </div>
    </div>
</div>

  


<footer>
        <div class="container text-center-end">
            <div class="row">
                <div class="col-md-4 mt-4">
                    <h4>Kto sme</h4>
                    <p>Sme značka, ktorá sa sústreďuje nielen na výkon a funkčnosť, ale tiež na eleganciu a štýl, čo sa prejavuje v našich ikonických iPhone zariadeniach.</p>
                </div>
                <div class="col-md-4 mt-4">
                    <h4>Kontakt</h4>
                    <p><a href="mailto:kontakt@apple.com">kontakt@apple.com</a></p>
                    <p><a href="tel:0904162468"> 0904 162 468</a></p>
                </div>
                <div class="col-md-4 mt-4">
                    <h4>Odkazy</h4>
                    <p><a href="index.php">Domov</a></p>
                    <p><a href="galeria.php">Galéria</a></p>
                    <p><a href="faq.php">FAQ</a></p>
                    <p><a href="kontakt.php">Kontakt</a></p>
                </div>
            </div>
            <div class="copyright text-center">
                <p>© 2023 O2 Slovakia, s.r.o. Všetky práva vyhradené</p>
            </div>
        </div>
</footer>

    


    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>