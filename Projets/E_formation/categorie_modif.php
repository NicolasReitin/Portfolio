<?php
ob_start();
$title = "Modifier la catégorie";
include "Includes/bdd.php";
include "Includes/header.php";
include "Includes/sidebar.php";


if(isset($_GET['id'])) {
    $id_categorie = $_GET['id']; //récupérer id du GET
    $select_id = "SELECT * FROM formation_add_categorie WHERE id = '$id_categorie'"; //Select de l'id de la table de la BDD
    $resultat = mysqli_query($connexion, $select_id); //execution de la requête

    while($row = mysqli_fetch_assoc($resultat)){ 
        $id = $row['id'];
        $categorie = $row['categorie'];
        $date = $row['date'];
    }
}

if(isset($_POST['modifier'])) {
    $categorie = $_POST['categorie'];
    $req_modif = "UPDATE formation_add_categorie SET categorie = '$categorie' WHERE id= '$id_categorie'"; // requête de modification, on prépare la valeur qu'on veut modifier
    $resultat = mysqli_query($connexion, $req_modif); //execution de la requête de modif
    header("Location: categorie_voir.php"); //redirection vers la page categorie_voir.php
}
?>

<div class="parent mt-5">
    <h2>Modifier catégorie</h2>
    <div class="modif_categorie">
        <div class="container-fluid mt-5">
            <form method="POST" enctype="multipart/form-data">
                    <input type="text" class="form-control barre" name="categorie" value="<?= $categorie ?>" placeholder="Nouvelle catégorie">
                    <input type="submit" class="btn btn-warning mt-3" name="modifier" value="Modifier">
            </form>
        </div>
    </div>
</div> <!-- fin parent -->


<?php 
include "Includes/footer.php";
?>