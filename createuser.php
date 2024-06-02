<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vytvorenie užívatela</title>
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

    include_once "classes/user.php";
    $user = new User();
?>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="row">
                    <div class="col">
                        <form action="useraction.php" method="post" class="border p-4 rounded-3 mb-4">
                        <input type="hidden" name="action" value="create">
                        <h2 class="mb-4">Vytvorenie užívatela</h2>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Meno" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="E-mail" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="pass" placeholder="Heslo" required>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="adminCheckbox" name="admin">
                            <label class="form-check-label" for="adminCheckbox">Admin</label>
                        </div>

                        <div class="d-grid">
                            <input type="submit" class="btn btn-primary btn-lg" value="Vytvoriť">
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
    
    <?php include "komponenty/footer.php"; ?>
    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
