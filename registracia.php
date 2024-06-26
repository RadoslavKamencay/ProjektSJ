<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrácia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include "komponenty/header.php"; ?>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="row">
                    <div class="col">
                        <form action="useraction.php" method="post" class="border p-4 rounded-3 mb-4">
                        <input type="hidden" name="action" value="register">
                        <h2 class="mb-4">Registrácia</h2>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Meno" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="E-mail" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="pass" placeholder="Heslo" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="confirm_pass" placeholder="Zopakuj heslo" required>
                        </div>
                        <div class="d-grid">
                            <input type="submit" class="btn btn-primary btn-lg" value="Registrovať sa">
                        </div>
                    </form>
                    </div>


                    <div class="col">
                        <form action="useraction.php" method="post" class="border p-4 rounded-3 mb-4">
                            <input type="hidden" name="action" value="login">
                            <h2 class="mb-4">Prihlásenie</h2>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" placeholder="E-Mail" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" id="password_login" class="form-control" name="pass" placeholder="Heslo" required>
                            </div>
                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary btn-lg" value="Prihlásiť sa">
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
