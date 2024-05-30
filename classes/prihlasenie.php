<?php
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pwd = $_POST['heslo'];

    include "../db/database.php";

    class Prihlasenie extends Dbh {
        public function setUser($pwd, $email) {

            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ?');
            $stmt->execute([$email]);

            if ($row = $stmt->fetch()) {
                if (password_verify($pwd, $row['heslo'])) {
                    $_SESSION['user'] = $row['meno'];
                    $_SESSION['user_admin'] = ($row['admin'] == 1);

                    if ($row['admin'] == 1) {
                        header("location: ../users.php?success=true");
                        exit();
                    } else {
                        header("location: ../index.php?success=true");
                        exit();
                    }
                } else {
                    header("location: ../registracia.php?reg_error=failed");
                    exit();
                }    
            } else {
                header("location: ../registracia.php?reg_error=failed");
                exit();
            }    
        }
    }

    $prihlasenie = new Prihlasenie();
    $prihlasenie->setUser($pwd, $email);
}
