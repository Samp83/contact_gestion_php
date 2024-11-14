<?php
function connectDB() {
    $db_host = 'localhost';
    $dbname = 'contacts_db';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}


function addContact($nom, $email, $telephone) {
    $pdo = connectDB();
    $stmt = $pdo->prepare("INSERT INTO contacts (nom, email, telephone) VALUES (?, ?, ?)");
    return $stmt->execute([$nom, $email, $telephone]);
}


function getContact($id) {
    $pdo = connectDB();
    $stmt = $pdo->prepare("SELECT * FROM contacts WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}


function updateContact($id, $nom, $email, $telephone) {
    $pdo = connectDB();
    $stmt = $pdo->prepare("UPDATE contacts SET nom = ?, email = ?, telephone = ? WHERE id = ?");
    return $stmt->execute([$nom, $email, $telephone, $id]);
}

function deleteContact($id) {
    $pdo = connectDB();
    $stmt = $pdo->prepare("DELETE FROM contacts WHERE id = ?");
    return $stmt->execute([$id]);
}


function getAllContacts() {
    $pdo = connectDB();
    $stmt = $pdo->query("SELECT * FROM contacts");
    return $stmt->fetchAll();
}
?>
