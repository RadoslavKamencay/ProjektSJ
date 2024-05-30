<?php

if (isset($_POST['submit'])) {
    $name = $_POST['meno'];
    $email = $_POST['email'];
    $pwd = $_POST['heslo'];

    include "../db/database.php";

    class Registracia extends Dbh {
        public function setUser($name, $pwd, $email) {
            $stmt = $this->connect()->prepare('INSERT INTO users (meno, heslo, email) VALUES (?, ?, ?);');

            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

            if (!$stmt->execute(array($name, $hashedPwd, $email))) {
                $stmt = null;
                header("location: ../registracia.php?reg_error=stmtfailed");
                exit();
            } else {
                header("location: ../registracia.php?success=true");
            }

            $stmt = null;
        }
    }

    $registracia = new Registracia();
    $registracia->setUser($name, $pwd, $email);
}
