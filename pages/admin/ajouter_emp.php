<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="stylesheet" href="/assets/styles/index.css">
    
</head>
<style>
    body{
        background-image: url("/assets/image/image4.jpg");

    }
</style>
    <body>
    <?php
     include_once "../../settings/conn.php";
     //verifier que le boutton a ete clique
    if(isset($_POST['button'])){
    
     $nom =  htmlspecialchars($_POST['nom']);
     $prenom =  htmlspecialchars($_POST['prenom']);
     $telephone= htmlspecialchars($_POST['telephone']);
     $genre= htmlspecialchars($_POST["genre"]);
     $post= htmlspecialchars($_POST["poste"]);
     $jour= htmlspecialchars($_POST["jour"]);
     $debut= htmlspecialchars($_POST["debut"]);
     $fin= htmlspecialchars($_POST["fin"]);
    
        //extraction des informations envoyé par la methode POST
     extract($_POST);
        //verifier que tous les champs sont remplis
        if(isset($nom) && isset($prenom) && isset($telephone) && isset($genre) && isset($post) && isset($jour) && isset($debut) && isset($fin)){
            //connexion a la base de donnees
            include_once "conn.php";
            //requete d'ajout
            $insertQuery = "INSERT INTO employer (nom, prenom, telephone, genre, poste, jour, debut, fin)
                      VALUES ('$nom', '$prenom', '$telephone', '$genre', '$post','$jour', '$debut', '$fin')";
  
            if ($conn->query($insertQuery) === TRUE) { // si la requete a ete effectuee; redirection
                header("location:./index.php");
            }else{
                $message ="Employer non ajouté";
            }
            
        }else{
            $message = "veillez remplir tous les champs";
        }
    }
    ?>
        <div class="form">
            <a href="./index.php" class="back_btn"><img src="" alt="">retour</a>
            <h2>ajouter un employé</h2>
            <p class="eurreur_message">
               <?php 
               if(isset($message)){
                echo $message;
               }
               ?>
            </p>
            <form action="" method="POST">
                <label>nom</label>
                <input type="text" name="nom">
                <label>prenom</label>
                <input type="text" name="prenom">
                <label>telephone</label>
                <input type="number" name="telephone">
                <label>genre</label>
                <input type="text" name="genre">
                <label>poste</label>
                <input type="text" name="poste">
                <label>jour du travail</label>
                <input type="date" name="jour">
                <label>heure debut</label>
                <input type="text" name="debut">
                <label>heure fin</label>
                <input type="text" name="fin">
                <input type="submit" value="Ajouter" name="button">
            </form>
        </div>
    </div>
    
</body>
</html>