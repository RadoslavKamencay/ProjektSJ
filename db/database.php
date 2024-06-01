<?php
// Prepojenie s databázou
class DB {
    public function connect() {

        $host = "localhost";
        $db   = "apple";
        $user = "root";
        $pwd = "";
    
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        $opt = [
            PDO::ATTR_TIMEOUT            => 10, // timeout in seconds
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
    
        try {
            $pdo = new PDO($dsn, $user, $pwd, $opt);
        } catch (PDOException $ex) {
            die("Chyba nadviazania spojenia s databázou: ".$ex->getMessage());
        } catch (Exception $ex) {
            die("Chyba nadviazania spojenia s databázou: ".$ex->getMessage());
        }     
    
        return $pdo;
    }
}
?>