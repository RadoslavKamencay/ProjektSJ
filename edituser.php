<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Úprava užívatela</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
    include_once "komponenty/header.php";

    if (!isset($_SESSION['user']) || !isset($_SESSION['user_admin']) || $_SESSION['user_admin'] == false) {
        header("location: index.php?error=not-logged-or-admin");
        exit();
    }

    if (!isset($_GET['id'])) {
        header("location: users.php?error=invalid-user");
        exit();
    }

    include_once "classes/user.php";
    $user = new User();
    $get = $user->get($_GET['id']);

    if (!is_array($get)) {
        header("location: users.php?error=invalid-user");
        exit();
    }
?>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="row">
                    <div class="col">
                        <form action="useraction.php" method="post" class="border p-4 rounded-3 mb-4">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" value="<?= $get['id']?>">
                        <h2 class="mb-4">Úprava užívatela - <?= $get['id']?></h2>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Meno" value="<?= $get['meno']?>" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="E-mail" value="<?= $get['email']?>" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="pass" placeholder="Heslo">
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="adminCheckbox" name="admin" <?= $get['admin'] == 1 ? 'checked' : ''?>>
                            <label class="form-check-label" for="adminCheckbox">Admin</label>
                        </div>

                        <div class="d-grid">
                            <input type="submit" class="btn btn-primary btn-lg" value="Upraviť">
                        </div>
                    </form>
                    </div>

                    <?php if (isset($_GET['error'])) {
                            echo '<div class="alert text-center" role="alert">' . $_GET['error'] . '</div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    
        <div class="py-4 fw-medium bg-dark text-center fixed-bottom">
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


    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
