<?php
ob_start();
$title = "Ajout d'une catégorie";
include "Includes/bdd.php";
include "Includes/header.php";
include "Includes/sidebar.php";


if(isset($_POST['ajouter'])){
    $categorie = $_POST['categorie'];

    // vérification si la catégorie existe déjà
    $verif = "SELECT * FROM formation_add_categorie WHERE categorie = '$categorie'"; // requête de selection
    $resultat2 = mysqli_query($connexion, $verif);//execution de la requête 
    if(mysqli_num_rows($resultat2)<=0){  //si le résultat de notre requête n'est pas encore existant on continue la condition sinon
           
        //ajouter dans la BDD
        $req = "INSERT INTO formation_add_categorie(categorie, date) VALUES('$categorie', now() )"; // requête d'insertion
        $resultat = mysqli_query($connexion, $req); //execution de la requête
            if($resultat) { // condition pour vérifier que les données sont bien transmises à la BDD
                //echo "La catégorie a bien été ajoutée";
                header("Location: categorie_voir.php");
            }else{
                echo "une erreur est survenue, veuillez réessayer";
            }
    }else{
        ?>
        <div class="parent mt-5">
            <div class="errorMessage">
                <p>Cette catégorie existe déjà</p>
            </div>
        <?php
    }
}    
?>
        <div class="parent mt-5">
            <h2><?= $title ?></h2>
            <div class="categorie mt-5">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="categorie" placeholder="Nouvelle catégorie">
                    </div>   
                    <div class="mb-3 py-3">
                        <input type="submit" class="btn btn-warning" name="ajouter" value="Ajout d'une catégorie">
                    </div>
                </form>
                <a href="categorie_voir.php">Voir les catégories déjà existantes</a>
            </div>
        </div> <!-- fin parent -->

<?php
include "Includes/footer.php";
?>