<?php
    include_once("conn.php");
    if(isset($_POST['valider1'])){
        if(isset($_POST['email']) && isset($_POST['motpass'])){
            session_start();
            $_SESSION['email']=$_POST['email'];
            $_SESSION['motpass']=$_POST['motpass'];
            $_SESSION['valider1']=true;

            //recuperer les valeur du formulaire//
            // $email=$_POST["email"];
            // $motpass=$_POST["motpass"];
            $email= htmlspecialchars($_POST["email"]);
            $motpass= htmlspecialchars($_POST["motpass"]);  
            $erreur="";
            //recuperqtion des information du client//
            $requete=" SELECT * FROM client WHERE email='$email' AND  motpass='$motpass'";
            $resultat=mysqli_query($conn, $requete);
            $nbr_ligne=mysqli_num_rows($resultat);//
            if($nbr_ligne>0){
                
                header("Location: menu.php");
            }
            else{
                echo "L'adresse ou le mot de passe est incorrect";
            }
        }
     }
     if(isset($_POST['valider2'])){
        if(isset($_POST['email']) && isset($_POST['motpass'])){
            session_start();
            $_SESSION['email']=$_POST['email'];
            $_SESSION['motpass']=$_POST['motpass'];
            $_SESSION['valider2']=true;

            //recuperer les valeur du formulaire//
            // $email=$_POST["email"];
            // $motpass=$_POST["motpass"];
            $email= htmlspecialchars($_POST["email"]);
            $motpass= htmlspecialchars($_POST["motpass"]);  
            $erreur="";
            //recuperqtion des information de l'administrateur//
            $requete=" SELECT * FROM administrateur WHERE email='$email' AND  motpass='$motpass'";
            $resultat=mysqli_query($conn, $requete);
            $nbr_ligne=mysqli_num_rows($resultat);//
            if($nbr_ligne>0){
                
                header("Location: ../admin/gestion_admin.php");
            }
            
        }
     }



    ?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../../assets/styles/style1.css">
    <style>
        body {
            background-image: url('../../assets/images/plat4.jpg'); /* Image de fond */
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background: rgb(255, 255, 255);
            padding: 60px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.89);
            text-align: center;
            max-width: 650px;
            width: 100%;
        }

        .form-container h2 {
            color: #003366;
            margin-bottom: 40px;
         
        }

        label {
            display: block;
            color: #333;
            margin-bottom: 20px;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #f9f9f9;
        }

        button {
            background-color: #003366;
            color: white;
            padding: 10px 20px;
            margin: 10px 5px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: #0055a5;
        }

        footer {
            margin-top: 20px;
        }

        .para {
            color:rgb(19, 9, 9);
        }

        .para a {
            color: #003366;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Veuillez vous connecter à votre compte</h2>
        <form action="" method="post">
            <label for="email">Email</label>
            <input id="email" type="text" name="email" placeholder="Insérez votre email">

            <label for="motpass">Mot de passe</label>
            <input id="motpass" type="password" name="motpass" placeholder="Entrez votre mot de passe">

            <h3>Connecter en tant que :</h3>
            <button type="submit" name="valider1">Client</button>
        </form>

        <footer>
            <p class="para">Vous n'êtes pas encore inscrit ?
                <a target="_blank" href="./inscription.php" title="Inscrivez-vous ici">Inscrivez-vous ici</a>
            </p>
        </footer>
    </div>
</body>
</html>
