<!DOCTYPE html>
<html lang="fr"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://kit.fontawesome.com/1d2e599ac3.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="images/logo_transparent.png" type="image/x-icon">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="css/panier.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/media.css">

    <title> Local Market - <?= $title ?></title>
    
</head>
<body>
<!-----------------------------------------------------------Header----------------------------------------------------------->
    <header>
        <div class="blocLogo">
            <a href="index.php">
                <img class="logo" src="images/Logo Local Market.png" alt="Logo">
            </a>
        </div>
        <div class="cityAccount"><!--bloc pour le choix de la ville-->
            <select name="cityChoice" class="cityChoice btn btn-outline-warning" id="cityChoice">
                <option value="Choisissez votre ville" >Votre ville</option>
                <option value="caen">Caen</option>
                <option value="rennes" disabled>Rennes - en cours de création</option>
                <option value="rouen" disabled>Rouen - en cours de création</option>
            </select>
        </div> 
        <div class="search">
            <div class="searchBar">
                <form class="d-flex">
                  <input class="form-control  me-2" type="search" placeholder="Qu'est-ce qui vous ferait plaisir?" aria-label="Search">
                  <a href="" id="searchBar"><img src="icones/loupe.svg" class="loupe" alt="logo de loupe"></a>                </form>
              </div>
        </div>
        <div class="blocAccount d-block mt-4" ><!--bloc pour se connecter ou s'enregistrer-->
            <a href="connexion.php">Connexion</a>
            <a href="inscription.php">S'enregistrer</a>
        </div> 

            <!--Bloc panier-->
        <div class="dropdown">
            <div class="cart">
                <a href="panier.php"><img class="icoPanier" src="icones/panier_white.png" alt="icone panier"></a>
                <p><span id="in-cart-items-num">0</span></p>
                <p><a href="panier.php">Panier</a></p>
            </div>
        </div> 
    </header>
<!-------------------------------------------------------Navbar------------------------------------------------------->

<nav>
            <ul class="navbar">
                <li><a href="#" onclick="generateMenuCache()">&#9776 Toutes</a></li>
                <li>|</li>
                <li><a href="#" onclick="generateAlim(); generateMenuLeft(); generateMenuLeftAlim();">Alimentation</a></li>
                <li>|</li>
                <li><a href="#" onclick="generateMenuLeft(); generateBeaute()">Beauté</a></li>
                <li>|</li>
                <li><a href="#" onclick="generateMenuLeft(); generateCulture()">Culture</a></li>
                <li>|</li>
                <li><a href="#" onclick="generateMenuLeft(); generatePlante()">Fleurs & plantes</a></li>
                <li>|</li>
                <li><a href="#" onclick="generateMenuLeft(); generateSport()">Loisirs & sports</a></li>
                <li>|</li>
                <li><a href="#" onclick="generateMenuLeft(); generateMaison()">Maison & bricolage</a></li>
                <li>|</li>
                <li><a href="#" onclick="generateMenuLeft(); generateSante()">Santé</a></li>
                <li>|</li>
                <li><a href="#" onclick="generateMenuLeft(); generateService()">Services</a></li>
                <li>|</li>
                <li><a href="#" onclick="generateMenuLeft(); generatevins()">Vins & spiritueux</a></li>
            </ul>

<!------------------------------------Menu caché left---------------------------------------->

            <div class="menuCache menuToutes" id="menuCache">
                <h2>Bonjour,</h2>
                <div ><a id="close" onclick="closeMenuCache()" href="#">X</a></div>
                <ul>
                    <li id="sousMenu"><p>Tendances</p> 
                        <ul class="sousMenu2">
                            <li><a href="#">Meilleurs ventes</a></li>
                            <li><a href="#">Dernières nouveautés</a></li>
                        </ul>
                    </li>
                    <hr>
                    <li id="sousMenu"><p>Catégories</p> 
                        <ul class="sousMenu2">
                            <li><a href="#" onclick="generateAlim(); generateMenuLeft(); generateMenuLeftAlim()">Alimentation</a></li>
                            <li><a href="#" onclick="generateMenuLeft(); generateBeaute()">Beauté</a></li>
                            <li><a href="#" onclick="generateMenuLeft(); generateCulture()">Culture</a></li>
                            <li><a href="#" onclick="generateMenuLeft(); generatePlante()">Fleurs & plantes</a></li>
                            <li><a href="#" onclick="generateMenuLeft(); generateSport()">Loisirs & sports</a></li>
                            <li><a href="#" onclick="generateMenuLeft(); generateMaison()">Maison & bricolage</a></li>
                            <li><a href="#" onclick="generateMenuLeft(); generateSante()">Santé</a></li>
                            <li><a href="#" onclick="generateMenuLeft(); generateService()">Services</a></li>
                            <li><a href="#" onclick="generateMenuLeft(); generatevins()">Vins & spiritueux</a></li>
                        </ul>
                    </li>
                    <hr>
                    <li id="sousMenu"><p>Aide et paramètres</p>
                        <ul class="sousMenu2">
                            <li><a href="connexion.php">Votre compte</a></li>
                            <li><a href="#">Service Client</a></li>
                            <li><a href="#">Déconnectez-vous</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            
            <div class="navbarBurger">
                <div class="container nav-container">
                    <input class="checkbox" type="checkbox" name="" id="XBurger" />
                    <div class="hamburger-lines">
                      <span class="line line1"></span>
                      <span class="line line2"></span>
                      <span class="line line3"></span>
                    </div>  
                  <div class="menu-items">
                    <li><a href="index.php">Beauté</a></li>
                    <li><a href="#" onclick="generateAlim(); generateMenuLeft(); generateMenuLeftAlim();">Alimentation</a></li>
                    <li><a href="#" onclick="generateMenuLeft(); generateBeaute()">Beauté</a></li>
                    <li><a href="#" onclick="generateMenuLeft(); generateCulture()">Culture</a></li>
                    <li><a href="#" onclick="generateMenuLeft(); generatePlante()">Fleurs & plantes</a></li>
                    <li><a href="#" onclick="generateMenuLeft(); generateSport()">Loisirs & sports</a></li>
                    <li><a href="#" onclick="generateMenuLeft(); generateMaison()">Maison & bricolage</a></li>
                    <li><a href="#" onclick="generateMenuLeft(); generateSante()">Santé</a></li>
                    <li><a href="#" onclick="generateMenuLeft(); generateService()">Services</a></li>
                    <li><a href="#" onclick="generateMenuLeft(); generatevins()">Vins & spiritueux</a></li>

                  </div>
                </div>
              </div>
    </nav>
