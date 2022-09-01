<?php 
ob_start();
$title = "Ajout d'une vidéo";
include "Includes/bdd.php";
include "Includes/header.php";
include "Includes/sidebar.php";
?>

<div class="parent mt-5">
    <h2><?= $title ?></h2>
    <div class="categorie mt-5">
        <?php 
        $error = "";
        if(isset($_POST['envoyer'])) { // récupérer valeur du formulaire
            $categorie = $_POST['categorie']; //récupérer la catégorie
            $titre = mysqli_real_escape_string($connexion, $_POST['titre']) ; // récupérer le titre  
            $description = mysqli_real_escape_string($connexion, $_POST['description']); //récupérer le mdp

            $poster = $_FILES['poster']['name']; //récupérer le poster
            $posterTemp = $_FILES['poster']['tmp_name']; //récupérer le poster temp
            $pathPoster = "images/tmp/".$poster; // chemin du poster

            $file = $_FILES['file']['name']; //nom du fichier
            $fileTemp = $_FILES['file']['tmp_name']; // nom du fichier temporaire       
            $path = "videos/tmp/".$file; //chemin du fichier vidéo

            if(!empty($categorie) && !empty($titre) && !empty($description)){ // si tout les champs sont remplis
                //récupérer le temps
                $time = time(); 
                //pour le poster
                $poster_name = $time."_".$poster; //créer un nom unique pour le poster
                $verif_ext_poster = explode('.', $poster); // découper le nom du poster
                $poster_ext = end($verif_ext_poster); // récupérer l'extension du poster
                $extensions_autorisees_poster = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG'); // tableau des extensions autorisées
                        
                //pour video file
                $file_name = $time."_".$file; //créer un nom unique pour la vidéo
                $verif_ext_file = explode('.', $file); // découper le nom du fichier
                $file_ext = end($verif_ext_file); // récupérer l'extension du fichier
                $extensions_autorisees_file = array('mp4','MP4', 'avi', 'AVI', 'mkv','MKV', 'flv', 'FLV'); // tableau des extensions autorisées

                if(empty($poster) && empty($file)){ // si le poster est vide et que le fichier est vide 
                    $sql = mysqli_query($connexion, "INSERT INTO formation_add_video(categorie, titre, description, date) VALUES('$categorie', '$titre', '$description', now() )" );// insérer dans la base de données
                }elseif(!empty($poster) && empty($file)){ // si le poster n'est pas vide et que le fichier est vide  
                    if(in_array($poster_ext, $extensions_autorisees_poster) === true){ // si l'extension du poster est autorisée
                        move_uploaded_file($posterTemp,  "images/tmp/".$poster_name); // déplacer le poster dans le dossier tmp
                        $sql = mysqli_query($connexion, "INSERT INTO formation_add_video(categorie, titre, description, poster, date) VALUES('$categorie', '$titre', '$description', '$poster_name' ,now() )" );// insérer dans la base de données
                    }else{
                        $error .="Mauvaises extensions de fichiers poster"; // afficher erreur
                    }
                }elseif(empty($poster) && !empty($file)){ // si le poster est vide et que le fichier n'est pas vide
                    if(in_array($file_ext, $extensions_autorisees_file) === true){ // si l'extension du fichier est autorisée
                        move_uploaded_file($fileTemp,  "videos/tmp/".$file_name); // déplacer le fichier dans le dossier tmp
                        $sql = mysqli_query($connexion, "INSERT INTO formation_add_video(categorie, titre, description, file, date) VALUES('$categorie', '$titre', '$description', '$file_name', now() )" ); // insérer dans la base de données
                    }else{
                        $error .= "Mauvaises extensions de fichiers vidéo !"; // afficher erreur
                    }
                }elseif(!empty($poster) && !empty($file)){ // si le poster et le fichier sont remplis
                    if(in_array($file_ext, $extensions_autorisees_file) === true AND in_array($poster_ext, $extensions_autorisees_poster) === true ){ // si l'extension du fichier et du poster sont autorisées
                        move_uploaded_file($posterTemp,  "images/tmp/".$poster_name); // déplacer le poster dans le dossier tmp
                        move_uploaded_file($fileTemp,  "videos/tmp/".$file_name); // déplacer le fichier dans le dossier tmp
                        $sql = mysqli_query($connexion, "INSERT INTO formation_add_video(categorie, titre, description, file, poster, date) VALUES('$categorie', '$titre', '$description', '$file_name' , '$poster_name', now() )" ); // insérer dans la base de données
                    }else{
                        $error .= "Mauvaise extension pour le poster ou le fichier vidéo !"; // afficher erreur
                    }
                }
                var_dump($sql);
                if($sql){
                        header("Location: video_voir.php"); // rediriger vers la page video_voir.php     
                }else{
                    $error .="Une erreur s'est produite lors de l'ajout du support, veuillez réessayer !"; // afficher erreur
                }

            }else{
            $error .= "Tous les champs requis ne sont pas remplis !"; // afficher erreur
            }
        }


        ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <select name="categorie" class="form-select" aria-label="Default select example"> 
                            <option selected>Choisir une catégorie</option>
                            <?php
                            $req_select = "SELECT * FROM formation_add_categorie"; // requête pour sélectionner toutes les catégories
                            $selection = mysqli_query($connexion, $req_select); // on stocke le résultat de la requête dans une variable
                            while($row = mysqli_fetch_assoc($selection)){ // on parcours le résultat de la requête
                                $id = $row['id']; //
                                $categorie = $row['categorie']; // on stocke les données de la ligne dans des variables
                                echo "<option value='$id' >$categorie</option>"; // on affiche les données dans le select
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="titre" id="" placeholder="Titre de la vidéo">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="description" id="" rows="3" placeholder="Description de la vidéo"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label"><b>Séléctionner un poster</b></label>
                        <input type="file" name="poster" class="form-control" id="formFile">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label"><b>Séléctionner une vidéo</b></label>
                        <input type="file" name="file" class="form-control" id="formFile">
                    </div>


                            <?php 
                                if(!empty($error)){
                                    echo '<div class="alert alert-danger" role="alert">'.$error  .' </div>';
                                }

                            ?>

                    <div class="mb-3 py-3">
                        <input type="submit" class="btn btn-warning" name="envoyer" value="Ajouter la vidéo" id="">
                    </div>
                </form>

        

    </div> <!-- fin catégorie -->
</div> <!-- fin parent -->

<?php 
include "Includes/footer.php";
?>
