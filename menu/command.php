<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'verger';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

// Récupérer la liste des plats depuis la table menu
$query = "SELECT titre, prix FROM menu";
$stmt = $pdo->query($query);
$menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ...

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $titre = $_POST["titre"];
    $quantite = $_POST["quantite"];
    $nomClient = $_POST["nom_client"];

    // Insérer la commande dans la table commande
    $insertQuery = "INSERT INTO commande (titre, out_date, out_time, statut, nom_client) VALUES (:titre, CURDATE(), CURTIME(), 1, :nom_client)";
    $insertStmt = $pdo->prepare($insertQuery);

    // Boucle à travers les plats et exécute la requête pour chaque plat
    for ($i = 0; $i < count($titre); $i++) {
        // Liens des paramètres à chaque itération
        $insertStmt->bindParam(':titre', $titre[$i]);
        $insertStmt->bindParam(':nom_client', $nomClient);

        // Exécuter la requête
        $insertStmt->execute();
    }

    echo "Commande ajoutée avec succès!";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Commande</title>
</head>
<body>

<h2>Formulaire de Commande</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="nom_client">Nom du client:</label>
    <input type="text" name="nom_client" required><br><br>

    <label for="nom_plat">Plat:</label>
    <select name="titre[]" multiple required>
        <?php
        foreach ($menuItems as $menuItem) {
            echo "<option value='" . $menuItem['titre'] . "'>" . $menuItem['titre'] . " - " . $menuItem['prix'] . " €</option>";
        }
        ?>
    </select><br><br>

    <label for="quantite">Quantité:</label>
    <input type="number" name="quantite[]" min="1" value="1" required><br><br>

    <input type="submit" value="Valider la commande">
</form>

</body>
</html>
