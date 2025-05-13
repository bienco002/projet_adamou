<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <style>
        body{
            background-image: url("../../assets/image/image2.jpg");
        }
            .button:hover{
                background-color:rgb(51, 21, 21);
                transition: 0.4s;
                color: aliceblue;
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
            bottom: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            }
    </style>
</head>
<body>
    <div class="ad" align="center">
    <h2> <font color="blue">BIENVENUE DANS LA PAGE ADMINISTRATEUR </font color></h2><br><br>
           <a href="menu.php"><button class="button"><strong>Voir les menus</strong></button></a>
            <a href="ajout_menu.php"><button class="button"><strong>Ajouter un menu</strong></button></a>
            <a href="index.php"><button class="button"><strong>Ajouter ou supprimer un employer</strong></button></a>
            <a href="form_admin.php"><button class="button"><strong>Ajouter un administrateur</strong></button></a>
        
      </div> 
     
      
          <footer>
              <p>© 2024 Group 1 TP programation web.</p>
          </footer> 
     
</body>
</html>