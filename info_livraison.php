<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Restaurant - Confirmation de Commande</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        body {
            background-image: url("image/image4.jpg");
            background-size: cover;
            background-position: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .navbar {
            background-color: maroon;
            padding: 15px 30px;
            text-align: center;
            font-size: 24px;
            color: white;
            font-weight: bold;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }
        .container {
            background-color: rgba(255, 255, 255, 0.97);
            width: 500px;
            margin: 60px auto;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s forwards;
        }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .title {
            text-align: center;
            margin-bottom: 30px;
        }
        .title h2 {
            color: maroon;
            margin-bottom: 10px;
            font-size: 28px;
        }
        .title p {
            color: #555;
            font-size: 16px;
        }
        form label {
            font-weight: bold;
            margin-top: 15px;
            display: block;
        }
        form input[type="email"],
        form input[type="text"],
        form input[type="date"],
        form select {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            box-sizing: border-box;
        }
        form input[type="submit"] {
            margin-top: 25px;
            width: 100%;
            padding: 14px;
            background-color: maroon;
            color: white;
            font-size: 17px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.4s ease;
        }
        form input[type="submit"]:hover {
            background-color: #800000;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #aaa;
        }
    </style>
</head>
<body>

    <div class="navbar">
        Restaurant PROFOOD
    </div>

    <div class="container">
        <div class="title">
            <h2>Commande Confirmée</h2>
            <p>Merci pour votre commande. Veuillez remplir les informations pour organiser votre livraison.</p>
        </div>

        <form method="post" action="traitement_info_livraison.php">
            <label for="email">Adresse Email :</label>
            <input type="email" name="email" id="email" placeholder="mbayamprince@gmail.com" required>

            <label for="phone">Numéro de téléphone :</label>
            <input type="text" name="phone" id="phone" placeholder="6 98 53 95 79" required>

            <label for="date_livraison">Date souhaitée de livraison :</label>
            <input type="text" name="date_livraison" id="date_livraison" placeholder="Choisissez une date" required>

            <label for="lieu_livraison">Lieu de livraison :</label>
            <select name="lieu_livraison" id="lieu_livraison" required>
                <option value="">-- Sélectionnez votre lieu --</option>
                <option value="Carrefour 140">Carrefour 140</option>
                <option value="Carrefour Maraba">Carrefour Maraba</option>
                <option value="Carrefour Borongo">Carrefour Borongo</option>
                <option value="Devant Hôtel Pakem">Devant Hôtel Pakem</option>
                <option value="Carrefour Anta Diop">Carrefour Anta Diop</option>
                <option value="Bois de Mardock">Bois de Mardock</option>
            </select>

            <label for="heure_livraison">Heure de livraison :</label>
            <select name="heure_livraison" id="heure_livraison" required>
                <option value="">-- Sélectionnez une heure --</option>
                <option value="09h00">09h00</option>
                <option value="12h00">12h00</option>
                <option value="16h00">16h00</option>
                <option value="20h00">20h00</option>
                <option value="autre"> autre...</option>
            </select>
            <input type="text" id="heure_livraison" name="heure_livraison" placeholder="Entre l'heure" style="display:none;" pattern="([01]? [0-9]|2[0-3]):([0-5]?[0-9])">
            <input type="submit" value="Confirmer la Livraison">
        </form>
    </div>

    <div class="footer">
        &copy; 2025 Restaurant PROFOOD. Tous droits réservés.
    </div>

    <!-- Script pour utiliser Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#date_livraison", {
            altInput: true,
            altFormat: "l j F Y",
            dateFormat: "Y-m-d",
            minDate: "today",
            locale: "fr"
        });
    </script>

</body>
</html>