<?php
// Připojení k databázi
try {
    $db = new PDO('mysql:host=localhost;dbname=vaše_databáze', 'vaše_uživatelské_jméno', 'vaše_heslo');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Nelze se připojit k databázi: " . $e->getMessage());
}

// Create - Vytvoření nového uživatele
function createUser($meno, $heslo, $email) {
    global $db;
    $hashedPassword = password_hash($heslo, PASSWORD_DEFAULT); // Hašování hesla
    $stmt = $db->prepare("INSERT INTO users (meno, heslo, email) VALUES (:meno, :heslo, :email)");
    $stmt->bindParam(':meno', $meno);
    $stmt->bindParam(':heslo', $hashedPassword);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
}

// Read - Načtení informací o uživateli
function getUser($id) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Update - Aktualizace informací o uživateli
function updateUser($id, $meno, $heslo, $email) {
    global $db;
    $hashedPassword = password_hash($heslo, PASSWORD_DEFAULT); // Hašování hesla
    $stmt = $db->prepare("UPDATE users SET meno = :meno, heslo = :heslo, email = :email WHERE id = :id");
    $stmt->bindParam(':meno', $meno);
    $stmt->bindParam(':heslo', $hashedPassword);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

// Delete - Smazání uživatele
function deleteUser($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

// Použití funkcí
//createUser('John', 'heslo123', 'john@example.com');

//$user = getUser(1);
//echo "ID: " . $user['id'] . ", Jméno: " . $user['meno'] . ", Email: " . $user['email'];

//updateUser(1, 'John Smith', 'newpassword', 'john@example.com');

//deleteUser(1);
?>
