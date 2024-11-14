<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $telephone = $_POST['telephone'] ?? '';

    if (!empty($nom) && !empty($email) && !empty($telephone)) {
        if (addContact($nom, $email, $telephone)) {
            header("Location: index.php");
            exit();
        } else {
            echo "<p>Erreur lors de l'ajout du contact.</p>";
        }
    } else {
        echo "<p>Veuillez remplir tous les champs.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un contact</title>
</head>
<body>
    <h2>Ajouter un contact</h2>
    <form method="POST" action="">
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="telephone">Téléphone :</label>
            <input type="tel" id="telephone" name="telephone" required>
        </div>
        <div>
            <input type="submit" value="Ajouter">
        </div>
    </form>
</body>
</html>