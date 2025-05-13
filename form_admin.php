
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire administrateur</title>
    <link rel="stylesheet" href="/assets/styles/form_admin.css">
</head>

<style>
    body{
        background-image: url("image/image4.jpg");

    }
    .title{
        text-align: center;
    }
</style>

<body>

<?php
include_once "conn.php";

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
    // $confmotpass= htmlspecialchars($_POST["motpass"]);


    // include_once("conn.php");

    //insertion dans la base de donnees
    if(empty($_POST["valider"])){
        echo"veillez remplir le formulaire!";
      }else{
      $insertQuery = "INSERT INTO administrateur (matricule, nom, prenom, tel, email, motpass)
                      VALUES ('$matricule', '$nom', '$prenom', '$tel', '$email', '$motpass')";
  
      if ($conn->query($insertQuery) === TRUE) {
          // Redirect to the home page
          echo "administrateur ajouté avec succés!";
     } else {
          echo "Echec d'ajout: " . $conn->error;
      }
    }
  }
  
  $conn->close();
  
 

?>



<h2 class="tete"> NOUVEAU ADMINISTRATEUR<h2><br> 
   <form action="" method="post">
      <div class="contenu" align="center">    
         <label for="matricule"> Matricule </label></br>
            <input id="matricule" class="donnee" name="matricule" type="text" placeholder="Entrez le matricule" required="required"></br></br>
            <label for="nom"> Nom </label></br>
            <input id="nom" class="donnee" name="nom" type="text" placeholder="Entrez votre nom" required="required"></br></br>
            <label for="prenom">Prénom</label></br>
            <input id="prenom" class="donnee" name="prenom" type="text" placeholder="Entrez votre prénom" required="required"></br></br>
            <label for="email">email</label></br>
            <input id="email" class="donnee" name="email" type="email" placeholder="Entre votre adresse email" required="required"></br></br>
            <label for="tel">Telephone</label></br>
            <input id="tel" class="donnee" name="tel" type="number" placeholder="Entrez votre numéro" required="required"></br></br>
            <label for="motpass"> Mot de passe </label></br>
            <input id="motpass" class="donnee" name="motpass" type="password" placeholder="Entrez votre mot de passe" required="required"></br></br>
            
            <button name= 'valider'> ENREGISTRER </button>
        </div>   
        
    </form>
    <footer>
    <a href="gestion_admin.php"><button class="ped">Retrouver ma page</button></a>          
      </footer>
</body>
</html>