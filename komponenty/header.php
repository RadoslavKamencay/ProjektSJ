<?php
session_start();
?>
<header class ="pb-5">
    <nav class="navbar navbar-expand-lg bg-body-tertiary <?php if ($page = 'registracia.php') echo 'fixed-top' ?>">
        <div class="container-fluid">
            <a href="index.php"><img src="img/apple2.png" height="50"></a>
            <button id="dark-mode-toggle">Dark Mode</button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="justify-content-center d-flex w-100">
                    <button id="myButton">Alert</button>
            </div>
            <ul class="navbar-nav">
            
                <?php
                if (isset($_SESSION['user'])) {
                    echo('
                        <form action="useraction.php" method="post"">
                            <input type="hidden" name="action" value="logout">
                            <input type="submit" class="registracia" value="Odhlásiť ['.$_SESSION['user'].']">
                        </form>
                    ');
                    if (isset($_SESSION['user_admin']) && $_SESSION['user_admin'] == true) {
                        echo('<a class="nav-link" href="users.php">Užívatelia</a>');
                    }
                } else {
                    echo('<a class="registracia" href="registracia.php">Registrácia</a>');
                } 
                ?>
                
                <a class="nav-link" href="index.php">Domov</a>
                <a class="nav-link" href="galeria.php">Galéria</a>
                <a class="nav-link" href="faq.php">FAQ</a>
                <a class="nav-link" href="kontakt.php">Kontakt</a>
            </ul>
        </div>
    </nav>
</header>





<script>
    document.addEventListener('DOMContentLoaded', function () {
        const darkModeToggle = document.getElementById('dark-mode-toggle');
        const appleImage = document.querySelector('header img');

        darkModeToggle.addEventListener('click', function () {
            if (appleImage.src.endsWith('apple2.png')) {
                appleImage.src = 'img/apple2 darkmode.png';
            } else {
                appleImage.src = 'img/apple2.png';
            }
        });
    });
</script>