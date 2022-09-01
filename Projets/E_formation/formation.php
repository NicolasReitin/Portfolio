<?php 
include "Includes/bdd.php";
include "Includes/header.php";
include "Includes/sidebar.php";


if(isset($_GET['id'])) {
    $id_video = $_GET['id']; //récupérer id du GET
    $select_id = "SELECT * FROM formation_add_video WHERE id = '$id_video'"; //Select de l'id de la table de la BDD
    $resultat = mysqli_query($connexion, $select_id); //execution de la requête

    $row = mysqli_fetch_assoc($resultat); //boucle pour récupérer les données de la BDD

    $id = $row['id']; //récupérer id
    $categorie = $row['categorie']; //récupérer la catégorie
    $titre = $row['titre']; //récupérer le titre
    $description = $row['description']; //récupérer la description
    $poster = $row['poster']; //récupérer le poster
    $file = $row['file']; //récupérer le fichier
    $date = $row['date']; //récupérer la date
}
?>

<section>
    <article>
<!-- --------------------------------------------------------fil de fer-------------------------------------------------------- -->
                <div class="formationSearch2">
                    <div style="--bs-breadcrumb-divider: '>';" class="blocBreadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Mes formations</a></li>
                        <li class="breadcrumb-item"><a href="#">Liste de mes formations</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $titre ?></li>
                        </ol>
                        <form class="d-flex col-md">
                            <input class="form-control me-2" type="search" placeholder="Recherche dans la formation" aria-label="Search">
                            <button class="btn btn-warning" type="submit">Chercher</button>
                        </form>
                    </div>
                </div>
            </article>
<!-- --------------------------------------------------------Vidéo-------------------------------------------------------- -->

            <div class="blocVideo">
                <article>                             
                    <video width="800" height="500" controls poster="images/tmp/<?= $poster ?>">
                        <source src="videos/tmp/<?= $file ?>" type="video/mp4">
                        Votre navigateur ne supporte pas la vidéo.
                    </video>
                    <h5> <?= $titre ?></h5>    
                    <p style="width: 800px;"> <?= $description ?></p>                
                </article>
<!-- --------------------------------------------------------section vidéo-------------------------------------------------------- -->

                <article>
                    <aside>
                        <div class="sectionVideo">
                            <h6><p>Section 1 :  Nom de section</p><img class="icon" src="img/angle-down.png" alt=""></h6>
                            
                            <div class="checkbox">
                                <div>
                                    <input type="checkbox" id="scales" name="scales">
                                    <label class="col-7" for="scales">Titre du cours 1</label>
                                    <label for="scales">05 : 02</label>                    </div>
                                <div>
                                    <input type="checkbox" id="scales" name="scales">
                                    <label class="col-7" for="scales">Titre du cours 2</label>
                                    <label for="scales">04 : 35</label>                    </div>
                                <div>
                                    <input type="checkbox" id="scales" name="scales">
                                    <label class="col-7" for="scales">Titre du cours 3</label>
                                    <label for="scales">05 : 15</label>                    </div>
                            </div>
                        </div>
                        <div class="sectionVideo">
                            <h6><p>Section 1 :  Nom de section</p><img class="icon" src="img/angle-down.png" alt=""></h6>
                            
                            <div class="checkbox">
                                <div>
                                    <input type="checkbox" id="scales" name="scales">
                                    <label class="col-7" for="scales">Titre du cours 1</label>
                                    <label for="scales">05 : 02</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="scales" name="scales">
                                    <label class="col-7" for="scales">Titre du cours 2</label>
                                    <label for="scales">04 : 35</label>                    </div>
                                <div>
                                    <input type="checkbox" id="scales" name="scales">
                                    <label class="col-7" for="scales">Titre du cours 3</label>
                                    <label for="scales">05 : 15</label>                    </div>
                            </div>
                        </div> 
                    </aside>
                </article>
            </div>
<!-- --------------------------------------------------------Commentaire-------------------------------------------------------- -->

<?php

    if(isset($_POST['envoyer'])) {
        $pseudo = $_POST['pseudo'];
        $com = $_POST['commentaire'];
        $id_support = $_GET['id'];

        $req_add_com = "INSERT INTO formation_add_comment(id_support, pseudo, commentaire, date) VALUES('$id_support', '$pseudo', '$com', now() )";
        $resultat_add_com = mysqli_query($connexion, $req_add_com);
   }
?>

            <aside>
                <div class="blocCommentaire" id="comment">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input class="form-control w-50 mb-2" type="text" name="pseudo" placeholder="Pseudo">
                        <textarea class="mb-2 form-control w-50" placeholder="Votre commentaire ici..." name="commentaire" rows="3"></textarea>   
                        <input type="submit" class="btn btn-warning" name="envoyer" value="Ajouter un commentaire" id="">
                    </form>
                </div>
            </aside>
            <aside>
                <div>
                    <h5><b>Commentaires précédents</b></h5> 
                    <p>
                        <?php
                            $req_com = "SELECT * FROM formation_add_comment WHERE id_support = '$id_video' ORDER BY id_com DESC"; //récupérer les commentaires
                            $resultat_com = mysqli_query($connexion, $req_com); //executer la requête
                            while($row = mysqli_fetch_array($resultat_com)) { //afficher les commentaires
                                $pseudo = $row['pseudo']; //récupérer le pseudo
                                $commentaire = $row['commentaire']; //récupérer le commentaire
                                $date = $row['date']; //récupérer la date
                                echo "<p><i>$date</i>  <br> <b>$pseudo :</b> $commentaire <hr></p>"; //afficher le commentaire
                            }
                        ?>
                    </p>
                    
                </div>
            </aside>
    </section>
    


<?php 
include "Includes/footer.php";
?>