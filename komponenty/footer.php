<?php
// kod ziska nazov aktualneho php suboru a ulozi ho do premennej $page
$page = basename($_SERVER['PHP_SELF']);
?>

<div class="py-4 fw-medium bg-dark text-center <?php if ($page == 'registracia.php' || $page == 'thankyou.php') echo 'fixed-bottom'; ?>">
      <ul class="nav justify-content-center ">
        <li class="nav-item">
          <a href="index.php" class="nav-link px-2 text-light ">Domov</a>
        </li>
        <li class="nav-item">
          <a href="faq.php" class="nav-link px-2 text-light ">FAQ</a>
        </li>
        <li class="nav-item">
          <a href="galeria.php" class="nav-link px-2 text-light ">Galéria</a>
        </li>
        <li class="nav-item">
          <a href="kontakt.php" class="nav-link px-2 text-light ">Kontakt</a>
        </li>
      </ul>
      <p class="text-center text-light py-2">&copy; 2024 Vytvoril: Radoslav Kamencay</p>
</div>

