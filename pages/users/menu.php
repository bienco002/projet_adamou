<?php
$menu = [
    ["nom" => "bongo", "prix" => 2500, "image" => "../../assets/images/bongo.jpg"],
    ["nom" => "kondre", "prix" => 1500, "image" => "../../assets/images/kondre.jpg"],
    ["nom" => "eru", "prix" => 1500, "image" => "../../assets/images/eru.jpg"],
    ["nom" => "escargot sauté", "prix" => 1500, "image" => "../../assets/images/Escargot sauté.jpg"],
    ["nom" => "Sauce Taro", "prix" => 2500, "image" => "../../assets/images/sauce taro.jpg"],
    ["nom" => "Sanga Pile", "prix" => 3000, "image" => "../../assets/images/sanga pile.jpg"],
    ["nom" => "Poulet DG", "prix" => 1500, "image" => "../../assets/images/poulet dg.jpg"],
    ["nom" => "ndonba", "prix" => 2500, "image" => "../../assets/images/ndonba.jpg"],
    ["nom" => "Ndjama Ndjaman", "prix" => 3000, "image" => "../../assets/images/Ndjama Ndjama.jpg"],
    ["nom" => "Okok", "prix" => 1500, "image" => "../../assets/images/okok.jpg"],
    ["nom" => "Akwa", "prix" => 2500, "image" => "../../assets/images/akwa.jpg"],
    ["nom" => "Gombo", "prix" => 3000, "image" => "../../assets/images/gombo.jpg"],
    ["nom" => "Dokounou", "prix" => 1500, "image" => "../../assets/images/dokounou.jpg"],
    ["nom" => "Crevette saute", "prix" => 2500, "image" => "../../assets/images/crevette saute.jpg"],
    ["nom" => "Poulet Tchoukourise", "prix" => 3000, "image" => "../../assets/images/poulet tchoukourise.jpg"],
    ["nom" => "Lalo", "prix" => 2500, "image" => "../../assets/images/Lalo.jpg"], 
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Menu du Restaurant</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #2c3e50;
            padding: 15px 30px;
            color: white;
        }
        header h1 {
            margin: 0;
            font-size: 28px;
        }
        .search-bar input {
            padding: 8px 15px;
            border-radius: 20px;
            border: none;
            font-size: 16px;
        }
        .menu-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 30px;
        }
        .menu-item {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 250px;
            text-align: center;
            transition: transform 0.3s;
        }
        .menu-item:hover {
            transform: scale(1.03);
        }
        .menu-item img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        .menu-details {
            padding: 15px;
        }
        .menu-details h2 {
            margin: 10px 0;
            font-size: 20px;
            color: #2c3e50;
        }
        .menu-details span {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
            color: #e67e22;
            font-weight: bold;
        }
        .submit-button {
            display: block;
            margin: 30px auto;
            padding: 10px 30px;
            font-size: 18px;
            background-color: #27ae60;
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .submit-button:hover {
            background-color: #1e8449;
        }
    </style>
</head>
<body>

    <header>
        <h1>COMMANDER VOS PREFERES</h1>
        <div class="search-bar">
            <input type="text" id="searchInput" onkeyup="filterMenu()" placeholder="Rechercher un plat...">
        </div>
    </header>

    <form action="./traitement.php" method="post">
        <div class="menu-container" id="menu">
            <?php foreach($menu as $item): ?>
                <div class="menu-item">
                    <img src="<?= $item['image']; ?>" alt="<?= $item['nom']; ?>">
                    <div class="menu-details">
                        <h2><?= $item['nom']; ?></h2>
                        <span><?= $item['prix']; ?> FCFA</span>
                        <input type="checkbox" name="nom_plat[]" value="<?= $item['nom']; ?>">
                        <input type="hidden" name="prix[]" value="<?= $item['prix']; ?>">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="submit" class="submit-button">Envoyer la commande &#127835;</button>
    </form>

    <script>
        function filterMenu() {
            var input = document.getElementById("searchInput");
            var filter = input.value.toLowerCase();
            var items = document.getElementsByClassName("menu-item");

            Array.from(items).forEach(function(item) {
                var title = item.querySelector("h2").textContent.toLowerCase();
                item.style.display = title.includes(filter) ? "block" : "none";
            });
        }
    </script>

</body>
</html>