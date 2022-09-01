<?php
// session_start(); 
// include "Includes/bdd.php"; 

// if(isset($_SESSION['username'])){
//   //s'il n'y a pas de session, on le redirige vers la page de connexion
// }else{
//   header('Location: https://www.e-petitpas.pro');
// }
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logo_blanc" type="logo">
    <title>NR Class room | <?= $title ?></title> <!-- Titre de la page -->


    </head>
    <body>
      <!-- --------------------------------------------------------Header-------------------------------------------------------- -->
      <header>
        <div class="navbar navbar-expand-lg navbar-dark sticky-top py-3">
          <div class="container-fluid">
            <!-- si clique sur logo, direction index si non connecté et accueil de l'utilisateur si connecté -->
            <a class="navbar-brand" 
                <?php if(isset($_SESSION['pseudo']) && $_SESSION['pseudo'] !== "")
                {
                    echo 'href="accueil.php"';
                }else{
                    echo 'href="index.php"';}
                ?> >
                <img class="logo" src="img/logo_blanc.png" alt="logo">
            </a>
            <div class="d-flex col-2"></div>
            
            <form class="d-flex col-md-5 searchBar">
              <input class="form-control me-2" type="search" placeholder="Chercher" aria-label="Search">
              <button class="btn btn-outline-warning" type="submit">Chercher</button>
            </form>
            
            <div class="d-flex col-1"></div>
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button> -->
            <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
            <div class=" navbar-collapse" >
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                    if(isset($_SESSION['pseudo']) && $_SESSION['pseudo'] !== "")
                    { 
                    ?>
                    <li>
                        <a class="active aIcone" aria-current="page" href="#"><img class="icone" src="img/enveloppe.png" alt="courrier"></a>
                    </li>
                    <li>
                        <a class="active aIcone" aria-current="page" href="#"><img class="icone" src="img/cloche.png" alt="alert"></a>                
                    </li>
                    <li>
                        <a class="active avatar" aria-current="page" href="#"><img class="avatar" src="img/avatar.png" alt="avatar"></a>                
                    </li>
                    <?php 
                    }
                    ?>
                    <!-- Si connecté : icones du menu apparait (enveloppe/alerte/dropmenu...) -->
                    <?php
                        if(isset($_SESSION['pseudo']) && $_SESSION['pseudo'] !== "")
                        {   
                            $user = $_SESSION['pseudo'];
                            echo '<li class="dropdown">';
                            echo '<a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-transform: capitalize;" ><strong>'.$user.'</strong></a>';
                            echo '<ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
                            echo '<li><a class="dropdown-item" href="#">Mon compte</a></li>';
                            echo '<li><a class="dropdown-item" href="#">Mon tableau de bord</a></li>';
                            echo '<li><hr class="dropdown-divider"></li>';
                            echo '<li><a class="dropdown-item" href="auth/deconnexion.php">Déconnexion</a></li>';            
                        } 
                        else 
                        {
                            echo '<div class="df">';
                            echo '<li><a href="auth/connexion.php">Se connecter</a></li>';
                            echo '<li><a href="auth/inscription.php">S\'inscrire</a></li>';
                            echo '</div>';
                        }
                    ?>
                        </ul>
                    </li>
                </ul>   
            </div>
          </div>
        </div>
      </header>

      <!-- --------------------------------------------------------Section-------------------------------------------------------- -->
      <div class="main">