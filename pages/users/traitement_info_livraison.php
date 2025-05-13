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
    // Récupérer les informations de livraison
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $date_livraison = $_POST["date_livraison"];
    $heure_livraison = $_POST["heure_livraison"];
    $lieu_livraison = $_POST["lieu_livraison"];
    // Préparer et exécuter la requête d'insertion
    $stmt = $conn->prepare("INSERT INTO info_livraison (email, phone, date_livraison, heure_livraison,lieu_livraison) VALUES (?, ?, ?, ?,?)");
    $stmt->bind_param("sssss", $email, $phone, $date_livraison, $heure_livraison,$lieu_livraison);

    if ($stmt->execute()) {
        echo "Merci d'avoir utilisé food online";
    } else {
        echo "Erreur lors de l'enregistrement des informations de livraison : " . $stmt->error;
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>
