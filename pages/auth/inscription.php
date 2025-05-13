<?php
include_once "../../settings/conn.php";

function security($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = strip_tags($donnees);
    return $donnees;
}

if (isset($_POST["valider"])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $tel = htmlspecialchars($_POST['tel']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $email = htmlspecialchars($_POST['email']);
    $motpass = htmlspecialchars($_POST['motpass']);

    $insertQuery = "INSERT INTO client (nom, prenom, tel, email, motpass, adresse)
                    VALUES ('$nom', '$prenom', '$tel', '$email', '$motpass', '$adresse')";

    if ($conn->query($insertQuery) === TRUE) {
        header("Location: ../users/menu.php");
        exit();
    } else {
        echo "Erreur lors de la création du compte : " . $conn->error;
    }
}

$conn->close();
?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Client + Progress Bar</title>
    <style>
        body {
            background:
            linear-gradient(rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.29)),
                url('../../assets/images/plat7.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        @keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.1);
    }
    100% {
        transform: scale(1);
    }
}

        h2  {
    text-align: center;
    color: yellow;
    margin-bottom: 20px;
    font-size: 2em;
    font-weight: bold;
    text-transform: uppercase;
    animation: pulse 1.5s infinite;
}

        form {
            background-color: #ffffff;
            max-width: 400px;
            margin: 20px auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }

        .contenu label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        .progress-container {
    background-color: #eee;
    border-radius: 10px;
    overflow: hidden;
    height: 15px;
    width: 100%;
    margin-bottom: 20px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.progress-bar {
    height: 100%;
    width: 0%;
    background: linear-gradient(to right, #ff7e5f, #feb47b);
    transition: width 0.4s ease;
}

        .contenu input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: none;
            border-radius: 10px;
            background-color: #f1f2f6;
            font-size: 15px;
            transition: all 0.3s;
        }

        .contenu input:focus {
            background-color: #dff9fb;
            outline: none;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        button[name="valider"] {
            width: 100%;
            padding: 12px;
            background-color: #ff7e5f;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[name="valider"]:hover {
            background-color: #feb47b;
        }

        footer {
            margin-top: 20px;
            text-align: center;
        }

        .button_3 {
            background-color: #333;
            color: white;
            padding: 10px 25px;
            border: none;
            border-radius: 25px;
            font-size: 14px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        .button_3:hover {
            background-color: #555;
        }

        .pied {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }

        .pied img {
            width: 25px;
            vertical-align: middle;
        }

        /* Responsive */
        @media (max-width: 500px) {
            form {
                padding: 20px;
            }

            h2 {
                font-size: 12em;
            }
        }
    </style>
</head>
<body>
    <h2>INSCRIVEZ-VOUS ET REGALEZ-VOUS !</h2>

    <form action="" method="post" onsubmit="return validateForm()">
        <div class="progress-container">
            <div class="progress-bar" id="progress-bar"></div>
        </div>

        <div class="contenu">
            <label for="nom">Nom</label>
            <input id="nom" name="nom" type="text" placeholder="Entrez votre nom" required oninput="updateProgress()">

            <label for="prenom">Prénom</label>
            <input id="prenom" name="prenom" type="text" placeholder="Entrez votre prénom" required oninput="updateProgress()">

            <label for="email">E-mail</label>
            <input id="email" name="email" type="email" placeholder="Entrez votre email" required oninput="updateProgress()">

            <label for="tel">Téléphone</label>
            <input id="tel" name="tel" type="tel" pattern="[0-9]{10}" placeholder="Votre numéro (10 chiffres)" required oninput="updateProgress()">

            <label for="motpass">Mot de passe</label>
            <input id="motpass" name="motpass" type="password" placeholder="Créez un mot de passe" required oninput="updateProgress()">

            <label for="adresse">Adresse</label>
            <input id="adresse" name="adresse" type="text" placeholder="Votre adresse" required oninput="updateProgress()">

            <button name="valider">S'inscrire</button>
        </div>

        <p class="pied">
            Déjà inscrit ?
            <a href="./se_connecter.php"><img src="../../assets/image/user.jpg" alt="Se connecter"></a>
        </p>
    </form>

    <footer>
        <a href="accuil.html"><button class="button_3">Retour Accueil</button></a>
    </footer>

    <script>
        function validateForm() {
            const motpass = document.getElementById("motpass").value;
            if (motpass.length < 6) {
                alert("Le mot de passe doit contenir au moins 6 caractères !");
                return false;
            }
            if (!/[A-Z]/.test(motpass) || !/[0-9]/.test(motpass)) {
                alert("Le mot de passe doit contenir au moins une majuscule et un chiffre !");
                return false;
            }
            return true;
        }

        function updateProgress() {
            const fields = ["nom", "prenom", "email", "tel", "motpass", "adresse"];
            let filled = 0;

            fields.forEach(function(id) {
                const input = document.getElementById(id);
                if (input.value.trim() !== "") {
                    filled++;
                }
            });

            const progressBar = document.getElementById("progress-bar");
            const percentage = (filled / fields.length) * 100;
            progressBar.style.width = percentage + "%";
        }
    </script>
</body>
</html>