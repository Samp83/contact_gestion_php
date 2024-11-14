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
?>
