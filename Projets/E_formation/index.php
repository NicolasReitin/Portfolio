<?php
session_start();
$title = "Accueil";
include "Includes/header.php";
include "Includes/sidebar.php";
include "Includes/bdd.php";
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