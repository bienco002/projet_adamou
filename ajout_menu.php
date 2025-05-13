
<?php
include_once "conn.php";
//verifier que le boutton a ete clique
if(isset($_POST['button'])){

$titre =  htmlspecialchars($_POST['titre']);
$descrription =  htmlspecialchars($_POST['description']);
$prix= htmlspecialchars($_POST['prix']);
$image= htmlspecialchars($_POST["image"]);

   //extraction des informations envoyé par la methode POST
extract($_POST);
   //verifier que tous les champs sont remplis
   if(isset($titre) && isset($descrription) && isset($prix) && isset($image)){
       //connexion a la base de donnees
       include_once "conn.php";
       //requete d'ajout
       $insertQuery = "INSERT INTO menu (titre, description, prix, image)
                 VALUES ('$titre', '$description', '$prix', '$image')";

       if ($conn->query($insertQuery) === TRUE) { // si la requete a ete effectuee; redirection
           header("location:menu.php");
       }else{
           $message ="menu non ajouté";
       }
       
   }else{
       $message = "veillez remplir tous les champs";
   }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouter</title>
</head>
<body>
<h2> Ajouter un menu</h2>
<form action="" method="post" enctype="multipart/form-data">
    <label for="titre">Titre:</label>
    <input type="text" id="titre" name="titre" required><br>
    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea><br>
    <label for="prix">Prix:</label>
    <input type="number" id="prix" name="prix" step="0.01" required><br>
    <label for="image">Image:</label>
    <input type="file" id="image" name="image"><br>
    <input type="submit" value="ajouter" name="button">
</form>
</body>
</html>


