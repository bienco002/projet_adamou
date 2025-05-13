
<?php
include_once "../../settings/conn.php";

function security($donnees){
    $donnees=trim($donnees);					//supprime tout les espaces entrees par l'utilisateur
    $donnees=stripslashes($donnees);			//supprime tout les caracteres en trop
    $donnees=strip_tags($donnees);			//supprime les codes html entrees par l'utilisateur
    return $donnees;
  }

   
if (isset($_POST["valider"])) {
    $matricule =  htmlspecialchars($_POST['matricule']);
    $nom =  htmlspecialchars($_POST['nom']);
    $prenom =  htmlspecialchars($_POST['prenom']);
    $tel= htmlspecialchars($_POST['tel']);
    $email= htmlspecialchars($_POST["email"]);
    $motpass= htmlspecialchars($_POST["motpass"]);
    

    $insertQuery="UPDATE employer SET matricule='$matricule', nom='$nom', prenom='$prenom', tel='$tel', email='$email', motpass='$motpass' WHERE id_emp=$id_emp";
     
      if ($conn->query($insertQuery) === TRUE) {
          // Redirect to the home page
          echo "Information employer modifie!";
     } else {
          echo "Echec de modification: " . $conn->error;
      }
    }
  
  $conn->close();
 ?> 

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="stylesheet" href="../../assets/styles/index.css">
</head>
<body>
    <div class="form">
        <a href="./index.php" class="btn_add"><img src="../../assets/image/add.png">Retour</a>
        <h2>Modifier un employé</h2>
        <p class="erreur_message">Veillez remplir tous les champs</p>
        <form action="" method="POST">
            <label>nom</label>
            <input type="text" name="nom">
            <label>prenom</label>
            <input type="text" name="prenom">
            <label>telephone</label>
            <input type="text" name="telephone">
            <label>genre</label>
            <input type="text" name="genre">
            <label>poste</label>
            <input type="text" name="post">
            <label>jour du travail</label>
            <input type="text" name="jour">
            <label>heure debut</label>
            <input type="text" name="debut">
            <label>heure fin</label>
            <input type="text" name="fin">
            <input type="submit" value="modifier" name="buttn">
        </form>
    </div>
</body>
</html>