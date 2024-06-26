<?php

include_once "db/database.php";

class User extends DB {

    public function login($email, $pass) {

        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        if ($row = $stmt->fetch()) {
            if (password_verify($pass, $row['heslo'])) {

                session_start();
                $_SESSION['user'] = $row['meno'];
                $_SESSION['user_admin'] = ($row['admin'] == 1);

                if ($row['admin'] == 1) {
                    header("location: users.php?Prihlasenie prebehlo úspešne");
                    exit();
                } else {
                    header("location: index.php?Prihlasenie prebehlo úspešne");
                    exit();
                }
            } else {
                header("location: registracia.php?error=Zadal si zlé heslo");
                exit();
            }    
        } else {
            header("location: registracia.php?error=Email nebol nájdený");
            exit();
        }    
    }
    
    public function logout() {

        session_start();
        session_unset();
        session_destroy();

        header("location: index.php");
        exit();
    }

    public function create($email, $pass, $name, $admin = false, $register = false) {

        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            if ($register) {
                header("location: registracia.php?error=Email už existuje");
                exit();
            }
            header("location: users.php?error=Email už existuje");
            exit();
        }

        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

        $stmt = $this->connect()->prepare('INSERT INTO users (meno, heslo, email, admin) VALUES (?, ?, ?, ?)');
        if (!$stmt->execute([$name, $hashedPass, $email, ($admin ? 1 : 0)])) {
            if ($register) {
                header("location: registracia.php?error=create_failed");
                exit();
            }
            header("location: users.php?error=create_failed");
            exit();
        } else {
            if ($register) {
                header("location: registracia.php?Registracia prebehla úspešne");
                exit();
            }
            header("location: users.php?Registracia prebehla úspešne");
            exit();
        }
    }

    public function update($id, $email, $pass, $name, $admin) {

        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ? AND id != ?');
        $stmt->execute([$email, $id]);
        if ($stmt->fetch()) {
            header("location: users.php?error=Email už existuje");
            exit();
        }
        
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

        $stmt = $this->connect()->prepare('UPDATE users SET meno = ?, heslo = ?, email = ?, admin = ? WHERE id = ?');
        if (!$stmt->execute([$name, $hashedPass, $email, ($admin ? 1 : 0), $id])) {
            header("location: users.php?error=update_failed");
            exit();
        } else {
            header("location: users.php?error=false");
            exit();
        }
    }

    public function delete($id) {
        $stmt = $this->connect()->prepare('DELETE FROM users WHERE id = ?');
        if (!$stmt->execute([$id])) {
            header("location: users.php?error=delete_failed");
            exit();
        } else {
            header("location: users.php?error=false");
            exit();
        }
    }
    
    // Výpis pre admina

    public function get($id) {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function list() {
        $stmt = $this->connect()->prepare('SELECT * FROM users');
        $stmt->execute();
        return $stmt->fetchAll();
    }

}

?>