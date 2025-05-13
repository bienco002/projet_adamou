<?php
 //connexion à la base de données
            $serveur="localhost";
            $login="root";
            $password="";
            $dbname="restaurant";
            $conn=mysqli_connect($serveur, $login, $password, $dbname) or die("Erreur de connexion à la BD");
?>