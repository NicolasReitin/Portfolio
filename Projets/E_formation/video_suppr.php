<?php
include "Includes/bdd.php";

if(isset($_GET['id'])) {
    $id_video = $_GET['id']; //récupérer id du GET
    $delete_id = "DELETE FROM formation_add_video WHERE id = '$id_video'"; //Select de l'id de la table de la BDD à supprimer
    $resultat = mysqli_query($connexion, $delete_id); //execution de la requête
    header("Location: video_voir.php"); 
}
?>