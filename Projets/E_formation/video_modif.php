<?php
ob_start();
$title = "Modifier une vidéo";
include "Includes/header.php";
include "Includes/sidebar.php";
include "Includes/bdd.php";

if(isset($_GET['id'])) {
    $id_video = $_GET['id']; //récupérer id du GET
    $select_id = "SELECT * FROM formation_add_video WHERE id = '$id_video'"; //Select de l'id de la table de la BDD
    $resultat = mysqli_query($connexion, $select_id); //execution de la requête

    while($row = mysqli_fetch_assoc($resultat)){  //boucle pour récupérer les données de la BDD
        $id = $row['id']; //récupérer id
        $categorie = $row['categorie']; //récupérer la catégorie
        $titre = $row['titre']; //récupérer le titre
        $description = $row['description']; //récupérer la description
        $poster = $row['poster']; //récupérer le poster
        $file = $row['file']; //récupérer le fichier
        $date = $row['date']; //récupérer la date
    }
}    
                                       
if(isset($_POST['modifier'])) { // récupérer valeur du formulaire
    $categorie = $_POST['categorie']; //récupérer la catégorie
    $titre = mysqli_real_escape_string($connexion, $_POST['titre']); //récupérer le titre
    $description = mysqli_real_escape_string($connexion, $_POST['description']); //récupérer la description
    $poster = $_FILES['poster']['name']; //récupérer le poster
    $file = $_FILES['file']['name']; //récupérer la vidéo

    $time = time(); //récupérer le temps
    $poster_name = $time."_".$poster; //créer un nom unique pour le poster
    $file_name = $time."_".$file; //créer un nom unique pour la vidéo

        if($file == '' AND $poster == '') { // condition pour vérifier que les champs sont vides
            $req_modif = "UPDATE formation_add_video SET categorie = '$categorie', titre = '$titre', description = '$description', date = now() WHERE id = '$id_video'"; //requete pour modifier et mettre à jour la ligne de la table
        }elseif($file == '' AND $poster != '') {
            $req_modif = "UPDATE formation_add_video SET categorie = '$categorie', titre = '$titre', description = '$description', poster = '$poster_name', date = now() WHERE id = '$id_video'"; 
            move_uploaded_file($_FILES['poster']['tmp_name'], "images/tmp/".$poster_name); // déplacer le fichier poster dans le dossier défini
        }elseif($file != '' AND $poster == '') {
            $req_modif = "UPDATE formation_add_video SET categorie = '$categorie', titre = '$titre', description = '$description', file = '$file_name', date = now() WHERE id = '$id_video'";
            move_uploaded_file($_FILES['file']['tmp_name'], "videos/tmp/".$file_name); // déplacer le fichier vidéo dans le dossier défini
        }else{
            $req_modif = "UPDATE formation_add_video SET categorie = '$categorie', titre = '$titre', description = '$description', poster = '$poster_name', file = '$file_name', date = now() WHERE id = '$id_video'";
            move_uploaded_file($_FILES['poster']['tmp_name'], "images/tmp/".$poster_name); // déplacer le fichier poster dans le dossier défini
            move_uploaded_file($_FILES['file']['tmp_name'], "videos/tmp/".$file_name); // déplacer le fichier vidéo dans le dossier défini
        }

    $resultat = mysqli_query($connexion, $req_modif); //execution de la requête de modif
    if(!$resultat){
        die("erreur de modification".mysqli_error($connexion)); //si erreur de modification
        exit(); //fermer la page
    }else{
        header("Location: video_voir.php"); //redirection vers la page video_voir.php
    }
}
?>

    <div class="container-fluid mt-5">
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <select name="categorie" class="form-select" aria-label="Default select example"> 
                <option selected><?php 
                    $req_select2 = "SELECT * FROM formation_add_categorie WHERE id = '$categorie'";
                    $selection2 = mysqli_query($connexion, $req_select2);
                    while ($row = mysqli_fetch_assoc($selection2)) {
                        $categorie = $row['categorie'];
                        echo $categorie;
                    }
                ?></option>
                <?php
                $req_select = "SELECT * FROM formation_add_categorie"; // requête pour sélectionner toutes les catégories
                $selection = mysqli_query($connexion, $req_select); // on stocke le résultat de la requête dans une variable
                while($row = mysqli_fetch_assoc($selection)){ // on parcours le résultat de la requête
                    $id = $row['id']; //
                    $categorie = $row['categorie']; // on stocke les données de la ligne dans des variables
                    echo "<option value='$id'>$categorie</option>"; // on affiche les données dans le select
                }
                ?>
                </select>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="titre" value="<?= $titre ?>" placeholder="Titre de la vidéo">
            </div>
            <div class="mb-3">
                <textarea class="form-control" name="description" rows="3" placeholder="Description de la vidéo"><?= $description ?></textarea>
            </div>
            <div class="d-flex">
                <div class="d-block">
                    <div class="mb-3">
                        <img src="images/tmp/<?= $poster ?>" width="500" height="300" alt="">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label"><b>Séléctionner un poster</b></label>
                        <input type="file" name="poster" value="<?= $poster ?>" class="form-control" id="formFile">
                    </div>
                </div>
                <div class="d-block ms-5">
                    <div class="mb-3">
                        <video src="videos/tmp/<?= $file ?>" controls width="500" height="300"></video>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label"><b>Séléctionner une vidéo</b></label>
                        <input type="file" name="file" value="<?= $file ?>" class="form-control" id="formFile">
                    </div>
                </div>
            </div>            
            <div class="mb-3 py-3">
                <input type="submit" class="btn btn-warning" name="modifier" value="Modifier">
            </div>
        </form>
    </div>


<?php 
include "Includes/footer.php";
?>