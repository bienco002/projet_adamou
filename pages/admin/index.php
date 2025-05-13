<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="../../assets/styles/index.css">
    <style>
            .button:hover{
                background-color:rgb(51, 21, 21);
                transition: 0.4s;
                color: aliceblue;
            }
            body{
                background-image: url("../../assets/image/image4.jpg");

            }
            
            .button{
                
                margin-right: 15px;
                padding-top: 1%;
                padding-bottom: 1%;
                border-radius: 20%;
            }
            .ad{
                position:center;
            }
            footer{background-color: maroon;
            position:fixed ;
            bottom: 10px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            }
    </style>
</head>
<body>
    <div class="contener">
        <a href="ajouter_emp.php" class="btn_add" ><img src="../../assets/image/add.png">ajouter</a>
        
        <table>
            <tr id_emp="items">
                <th>nom</th>
                <th>prenom</th>
                <th>telephone</th>
                <th>genre</th>
                <th>poste</th>
                <th>jour du travail</th>
                <th>heure debut</th>
                <th>heure fin</th>
                <th>modier</th>
                <th>supprimer</th>

            </tr>
            
            <?php
             //inclure la page de connection
              include_once "../../settings/conn.php";
            //requete pour afficher la liste des employer
            $req = mysqli_query($conn, "SELECT * FROM employer");
            if(mysqli_num_rows ($req) == 0){
                //s'il n'existe pas d'employer dans la bd, on affiche
                echo"Il n'y a pas d'employer ajouter!";
            }else{
                //affichons la liste des employers
                while($row=mysqli_fetch_assoc($req)){
                    ?>  
                        <tr>
                            <td><?=$row['nom']?></td>
                            <td><?=$row['prenom']?></td>
                            <td><?=$row['telephone']?></td>
                            <td><?=$row['genre']?></td>
                            <td><?=$row['poste']?></td>
                            <td><?=$row['jour']?></td>
                            <td><?=$row['debut']?></td>
                            <td><?=$row['fin']?></td>
                            <td><a href="modifier.php?id_emp=<?=$row['id_emp']?>"><img src="../../assets/icons/pen.png"></a></td>
                            <td><a href="supprimer.php?id_emp=<?=$row['id_emp']?>"><img src="../../assets/icons/sup.png"></a></td>
                        </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>
    <footer>
    <a href="gestion_admin.php"><button class="ped">Retrouver ma page</button></a>          
      </footer>
</body>
</html>