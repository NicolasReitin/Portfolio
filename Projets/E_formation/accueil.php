<?php
session_start();
$title = "Accueil";
include "Includes/header.php";
include "Includes/sidebar.php";
include "Includes/bdd.php";
?>


            <!-- tester si l'utilisateur est connecté -->
<?php
    if(isset($_SESSION['pseudo']) && $_SESSION['pseudo'] !== "")
    {
        $user = $_SESSION['pseudo'];
        // afficher un message
        //echo "Bonjour $user, vous êtes connecté";

        $select_param = "SELECT * FROM formation_users WHERE pseudo='$user'";
        $result_param = mysqli_query($connexion, $select_param);
        $reponse_param = mysqli_fetch_array($result_param);

        $id_user = $reponse_param[0];
        $pseudo = $reponse_param[1];
        $nom = $reponse_param[2];
        $prenom = $reponse_param[3];
        $date_de_naissance = $reponse_param[4];
        $mail = $reponse_param[5];
        $mdp = $reponse_param[6];
    
    }else
    {
    header('Location: connexion.php');
    }
?>

<section>
        <!-- --------------------------------------------------------localisation-------------------------------------------------------- -->
        <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active" aria-current="page">Liste des formations</li>
            </ol>
          </div>

          <!-- --------------------------------------------------------searchBar Formation-------------------------------------------------------- -->
            <div class="formationSearch">
              <form class="d-flex col-md-6" method="POST" action="">
                <input class="form-control me-2" type="search" placeholder="Rechercher des formations" name="search" aria-label="Search">
                <button class="btn btn-outline-warning" name="recherche" type="submit">Chercher</button>
              </form>
            </div>
          
    <!-- Include des Cards des formations -->
    <?php
    include "Includes/cards.php";
    ?>


</section>




<?php 
include "Includes/footer.php";
?>
