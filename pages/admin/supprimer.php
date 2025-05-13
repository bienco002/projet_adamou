<?php 
//connexion a la bd
    include_once ("../../settings/conn.php");
    //recuperation de l'id dans le lien
    $id_emp= $_GET['id_emp'];
    //requete de suppression
    $req = mysqli_query($conn , "DELETE FROM employer WHERE id_emp = $id_emp");
    //redirection vers la page
    header("Location:./index.php")
?>