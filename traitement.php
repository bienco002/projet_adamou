
<?php
// Connexion à la base de données (à remplacer par vos propres informations de connexion)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les noms des plats et leurs prix
    if(isset($_POST["nom_plat"]) && isset($_POST["prix"])) {
        $nomsPlats = $_POST["nom_plat"];
        $prixPlats = $_POST["prix"];

        // Préparer et exécuter la requête d'insertion
        $stmt = $conn->prepare("INSERT INTO panier (nom_plats, prix) VALUES (?, ?)");
        $stmt->bind_param("ss", $nomPlat, $prix);

        foreach ($nomsPlats as $key => $nomPlat) {
            $prix = $prixPlats[$key];
            if (!$stmt->execute()) {
                echo "Erreur lors de l'insertion : " . $stmt->error;
            }
        }

        header("Location:info_livraison.php");
        
    } else {
        echo "Veuillez sélectionner au moins un plat.";
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>
