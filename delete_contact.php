<?php

require_once 'db.php';


if (!isset($_GET['id'])) {
    die("ID de contact non spécifié.");
}

$id = $_GET['id'];
$pdo = connectDB();

try {
    $stmt = $pdo->prepare("DELETE FROM contacts WHERE id = ?");
    $stmt->execute([$id]);


    header("Location: index.php");
    exit();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
