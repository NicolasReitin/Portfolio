<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <title>Nicolas REITIN - <?= $title ?></title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="images/logo_blanc.png" type="image/x-icon">
    </head>
    <body>
        <!--------------------------------------Header-------------------------------------->
        <header>
            <!-- ------------------------------------LOGO------------------------------------ -->
            <div class="logo" id="Home">
                    <a href="#"><img src="images/logo_blanc.png" alt="logo Nico" class="logo"></a>
            </div>
            <nav>                
                <!-- ------------------------------------MENU------------------------------------ -->
                <label for="toggle">☰</label>
                <input type="checkbox" id="toggle">
                <div class="main_menu ">
                    <ul>
                        <li><a href="#Home">Accueil</a></li>
                        <li><a href="#Présentation">Présentation</a></li>
                        <li><a href="#Mes compétences">Compétences</a></li>
                        <li><a href="#Mes projets">Projets</a></li>
                        <li><a href="#Contact">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </header>

    <!-- <div class=" navbar-collapse" >
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li>
                  <a class="active aIcone" aria-current="page" href="#"><img class="icone" src="img/enveloppe.png" alt="courrier"></a>
                </li>
                <li>
                  <a class="active aIcone" aria-current="page" href="#"><img class="icone" src="img/cloche.png" alt="alert"></a>                
                </li>
                <li>
                  <a class="active avatar" aria-current="page" href="#"><img class="avatar" src="img/avatar.png" alt="avatar"></a>                
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Mon compte</a></li>
                    <li><a class="dropdown-item" href="#">Mon tableau de bord</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="deconnexion.php">Déconnexion</a></li>
                  </ul>
                </li>
              </ul>
              
            </div> -->