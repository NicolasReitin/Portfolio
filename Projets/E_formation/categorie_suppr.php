<?php
ob_start();
include "Includes/bdd.php";

if(isset($_GET['id'])) {
    $id_categorie = $_GET['id']; //récupérer id du GET
    $delete_id = "DELETE FROM formation_add_categorie WHERE id = '$id_categorie'"; //Select de l'id de la table de la BDD à supprimer
    $resultat = mysqli_query($connexion, $delete_id); //execution de la requête
    header("Location: categorie_voir.php");
}
?>



