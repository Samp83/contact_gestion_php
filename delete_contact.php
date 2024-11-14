<?php
require_once 'db.php';

if (!isset($_GET['id'])) {
    die("ID de contact non spécifié.");
}

$id = $_GET['id'];

if (deleteContact($id)) {
    header("Location: index.php");
    exit();
} else {
    echo "<p>Erreur lors de la suppression du contact.</p>";
}
?>
