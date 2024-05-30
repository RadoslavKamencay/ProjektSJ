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
    <?php
    include "komponenty/header.php";

    if (!isset($_SESSION['user']) || !isset($_SESSION['user_admin']) || $_SESSION['user_admin'] == false) {
        header("location: ./index.php?error=not-logged-or-admin");
        exit();
    } 

    include "db/database.php";

    class Users extends Dbh {
        public function getUsers() {

            $stmt = $this->connect()->prepare('SELECT * FROM users');
            $stmt->execute();

            return $stmt->fetchAll();
        }
    }

    $users = new Users();
?>
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
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Meno</th>
                        <th scope="col">E-Mail</th>
                        <th scope="col">Admin</th>
                        <th scope="col">Akcia</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($users->getUsers() as $row) {
                            echo('
                            <tr>
                            <th scope="row">'.$row['id'].'</th>
                            <td>'.$row['meno'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.($row['admin'] == 1 ? 'Áno' : 'Nie').'</td>
                            <td>Tlacitka na akcie..</td>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>