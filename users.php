<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uzivatelia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    include "komponenty/header.php";

    if (!isset($_SESSION['user']) || !isset($_SESSION['user_admin']) || $_SESSION['user_admin'] == false) {
        header("location: index.php?error=not-logged-or-admin");
        exit();
    }
?>

    <?php
        include_once "db/functions.php";
        pridajPozdrav();
    ?>
    <div class="row">
        <div class="col-4 justify-content-center align-items-center d-flex">
            <div>
                <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Meno</th>
                        <th scope="col" class="text-center">E-Mail</th>
                        <th scope="col">Admin</th>
                        <th scope="col" class="text-center">Akcia</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include_once "classes/user.php";
                    $user = new User();
                    foreach ($user->getUsers() as $row) {
                        echo('
                        <tr>
                            <th scope="row">'.$row['id'].'</th>
                            <td>'.$row['meno'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.($row['admin'] == 1 ? 'Áno' : 'Nie').'</td>
                            <td>
                            <form action="useraction.php" method="post"">
                                <input type="hidden" name="action" value="edit">
                                <input type="hidden" name="id" value="'.$row['id'].'">
                                <input type="submit" class="btn btn-sm btn-primary" value="Upraviť">
                            </form>
                            <form action="useraction.php" method="post"">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="'.$row['id'].'">
                                <input type="submit" class="btn btn-sm btn-danger" value="Vymazať">
                            </form>
                            </td>
                        </tr>
                        ');
                    }    
                ?>
                </tbody>
                </table>
            </div>      
        </div>
        <div class="col-8">
            <div id="mobil" class="d-flex justify-content-end align-items-center">
                <img src="img/obrazok4.png" alt="">
            </div>
        </div>
    </div>

    <?php include "komponenty/footer.php"?>
    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>