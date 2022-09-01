<!----------------------------------------------------------cards-------------------------------------------------------- -->
         
<div class="container-fluid mt-5">
                <div class="cards">
                <?php
                $var =  24; // nombre de formations à afficher sur la première page
                if(isset($_GET['page'])){
                    $valeur_page = $_GET['page'];// on récupère la valeur de la page
                }else{
                    $valeur_page = ''; // on récupère la valeur de la page
                }
                if($valeur_page == '' OR $valeur_page == 1){ // si la valeur de la page est vide ou égale à 1, on affiche les 5 premières formations
                    $page = 0; // on définit la page comme étant la page 1
                }else{
                    $page = ($valeur_page*$var) - $var; // on définit la page comme étant la page demandée multiplié par 5 et moins 5
                }
                $req_select3 = "SELECT * FROM formation_add_video"; // on récupère toutes les formations
                $resultat3 = mysqli_query($connexion, $req_select3); // on récupère les formations
                $result3 = mysqli_num_rows($resultat3); // on récupère le nombre de formations

                $count = ceil($result3/$var); // on calcule le nombre de pages en fonction du nombre de formations et du nombre de formations à afficher par page

                    if(isset($_POST['recherche'])){ // si on clique sur le bouton rechercher
                        $search = mysqli_real_escape_string($connexion, $_POST['search']); // On récupère la valeur de la recherche
                        $req_select = "SELECT * FROM formation_add_video WHERE (titre LIKE '%{$search}%' OR description LIKE '%{$search}%' OR poster LIKE '%{$search}%')"; //Select de l'id de la table de la BDD avec les paramètres de la recherche dans les champs titre, description et poster (LIKE = LIKE dans la BDD).
                    }else{
                        $req_select = "SELECT * FROM formation_add_video LIMIT $page, $var"; //Select de l'id de la table de la BDD avec les paramètres de la page et le nombre de formations à afficher par page
                    }                       
                        $selection = mysqli_query($connexion, $req_select); // on récupère les formations

                    while($card = mysqli_fetch_assoc($selection)) { // on récupère les informations de chaque formation
                        $id = $card['id']; // on récupère l'id de la formation
                        $categorie = $card['categorie']; // on récupère la catégorie de la formation
                        $titre = $card['titre']; // on récupère le titre de la formation
                        $description = $card['description']; // on récupère la description de la formation
                        $poster = $card['poster']; // on récupère le poster de la formation
                        $file = $card['file']; // on récupère le fichier de la formation
                        $date = $card['date']; // on récupère la date de la formation

                        $req_select2 = "SELECT * FROM formation_add_categorie WHERE id = '$categorie'"; //Select de l'id de la table de la BDD avec les paramètres de la recherche dans les champs titre, description et poster (LIKE = LIKE dans la BDD).
                        $selection2 = mysqli_query($connexion, $req_select2); // On stocke le résultat de la requête dans une variable

                        while($card2 = mysqli_fetch_assoc($selection2)){  // on récupère les informations de chaque catégorie
                            $categorie = $card2['categorie'];   // on récupère la catégorie de la formation
                        } 
                ?>
        <!----------------------------------------------------------Commentaires-------------------------------------------------------- -->
                <?php
                        //$counter = "SELECT * FROM formation_add_comment LEFT JOIN formation_add_video ON formation_add_video.id = formation_add_comment.id_support WHERE formation_add_comment.id_support = '$id'"; // requête pour compter le nombre de commentaires
                        //$counter = "SELECT * FROM formation_add_comment WHERE id_support = '$id'";
                        //$counter_result = mysqli_query($connexion, $counter); // on execute la requête
                        //$resultat_count = mysqli_num_rows($counter_result); // on compte le nombre de commentaires

                        $req_sel_com = "SELECT * FROM formation_add_comment WHERE id_support = '$id'"; // requête pour selectionner les commentaires
                        $select_com = mysqli_query($connexion, $req_sel_com); // on execute la requête
                        $resultat_count = mysqli_num_rows($select_com); // on compte le nombre de commentaires
                ?>   
                        <!----------------------------------------------------------cards suite-------------------------------------------------------- -->
                <?php
                        echo '<div class="card" style="width: 20rem;">
                                <img src= "images/tmp/'.$poster.'" class="card-img-top" alt="...">
                                <h5 class="card-title mt-3"><b>'.$titre.'</b></h5>
                                <p class="card-text m-3">'.$description.'</p>
                                <!-- <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> -->
                                <div class="test d-flex" style="gap: 10px">
                                    <div class="d-flex" style="gap: 5px">
                                        <a href="formation.php?id='.$id.'#comment"><img src="img/comment.png" alt="commentaire" style="height: 40px"></a>
                                        <p>('.$resultat_count.')</p>
                                    </div>                                   
                                    <a href="formation.php?id='.$id.'" style="color: #343a40; width: 200px;" class="btn btn-warning mb-2">Voir</a>
                                </div>
                                <hr>
                            </div>
                        ';
                    }
                ?>
                </div>
          
        <!----------------------------------------------------------Pagination-------------------------------------------------------- -->

          <article class="d-flex mt-5" style="justify-content: center">
          <?php 
                for($i = 1; $i <= $count; $i++){
                    if($i == $valeur_page){
                        echo "<div aria-label='Page navigation example'>
                            <ul class='pagination'>
                                <li class='page-itme'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>
                            </ul>
                        </div>";
                    }else{
                        echo "<div aria-label='Page navigation example'>
                            <ul class='pagination'>
                                <li class='page-itme'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>
                            </ul>
                        </div>";
                    }
                }
            ?>
          </article>