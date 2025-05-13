


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="../images/logo.jpg">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../table/style.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/footer.css">
    <title>ifood~ajoute d'un plat</title>
</head>
<body>


<section class="footer">
        <?php include('../connexion/header.php') ?>
    </section>
   
<?php

$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "verger";

// Définir des variables pour stocker 
$titre = $type = $description = $prix = $disponibilite = $image = $id_cat = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $titre = $_POST["titre"];
    $type = $_POST["type"];
    $description = $_POST["description"];
    $prix = $_POST["prix"];
    $disponibilite = $_POST["disponibilite"];
    $image = file_get_contents($_FILES["image"]["tmp_name"]); 
    // l'attribut enctype="multipart/form-data pour gere les images"
    $id_cat = $_POST["id_cat"];

    try {
        // Connexion à la base de données
        $connexion = new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $utilisateur, $mot_de_passe);

        // Définir le mode d'erreur de PDO sur exception
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
        // Requête d'insertion
            $requeteInsert = $connexion->prepare("INSERT INTO menu (titre, types, description, prix, disponibilite, image, id_cat) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $requeteInsert->bindParam(1, $titre);
            $requeteInsert->bindParam(2, $type);
            $requeteInsert->bindParam(3, $description);
            $requeteInsert->bindParam(4, $prix);
            $requeteInsert->bindParam(5, $disponibilite);
            $requeteInsert->bindParam(6, $image, PDO::PARAM_LOB);
            $requeteInsert->bindParam(7, $id_cat);


        // Exécution de la requête d'insertion
        $requeteInsert->execute();

        echo "L'élément a été inséré avec succès.";

    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    // Fermer la connexion
    $connexion = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajour un plat</title>
</head>
<body>



<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
<h2>ajouter un plat</h2>
    titre: <input type="text" name="titre" required><br>
    Type: <input type="text" name="type" required><br>
    Description: <textarea name="description" required></textarea><br>
    Prix: <input type="number" name="prix" required><br>
    Disponibilité: <input type="number" name="disponibilite" required><br>
    Image: <input type="file" name="image" accept="../images/*" required><br>
    Catégorie: <input type="number" name="id_cat" required><br>
    <input type="submit" value="Insérer">
</form>


</body>
</html>


    
<section class="footer">
        <?php include('../connexion/footer.php') ?>
    </section>
