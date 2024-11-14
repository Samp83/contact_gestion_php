<?php

require_once 'db.php';


if (!isset($_GET['id'])) {
    die("ID de contact non spécifié.");
}


$id = $_GET['id'];
$pdo = connectDB();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $telephone = $_POST['telephone'] ?? '';

    if (!empty($nom) && !empty($email) && !empty($telephone)) {
        try {
  
            $stmt = $pdo->prepare("UPDATE contacts SET nom = ?, email = ?, telephone = ? WHERE id = ?");
            $stmt->execute([$nom, $email, $telephone, $id]);


            header("Location: index.php");
            exit(); 
        } catch (PDOException $e) {
            echo "<p>Erreur : " . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p>Veuillez remplir tous les champs.</p>";
    }
}


$stmt = $pdo->prepare("SELECT * FROM contacts WHERE id = ?");
$stmt->execute([$id]);
$contact = $stmt->fetch();

if (!$contact) {
    die("Contact non trouvé.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un contact</title>
</head>
<body>
    <h2>Modifier le contact</h2>
    <form method="POST" action="">
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($contact['nom']); ?>" required>
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($contact['email']); ?>" required>
        </div>
        <div>
            <label for="telephone">Téléphone :</label>
            <input type="tel" id="telephone" name="telephone" value="<?php echo htmlspecialchars($contact['telephone']); ?>" required>
        </div>
        <div>
            <input type="submit" value="Modifier">
        </div>
    </form>
</body>
</html>
