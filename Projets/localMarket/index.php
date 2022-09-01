<?php
$title = "Page d'accueil";
include "Includes/header.php";
?>

<!-------------------------------------------------------Section------------------------------------------------------->

<section>
<!-------------------------------------------------------Menu Left------------------------------------------------------->
    <aside class="diplayNone" id="menuLeft">
        <div class="menuLeftOptions">
            <div class="diplayNone" id="menuLeftAlim">
                <h2>Catégories</h2>
                <ul>
                    <li><button class="benjamin" type="button" onclick="generateAlim()">Tout</button></li>
                    <li><button class="benjamin" type="button" onclick="choiceCategorie('primeur')">Fruits & légumes</button></li>
                    <li><button class="benjamin" type="button" onclick="choiceCategorie('fromagerie')">Fromages</button></li>
                    <li><button class="benjamin" type="button" onclick="choiceCategorie('boulangerie')">Pains et viennoiseries</button></li>
                    <li><button class="benjamin" type="button" onclick="choiceCategorie('traiteur')">Traiteur</button></li>
                </ul>
                <hr>
                <h2>Affiner par prix</h2>

            </div>
            <div class="diplayNone" id="menuLeftbeaute">
                <h2>Catégories</h2>
                <ul>
                    <li><button class="benjamin" type="button" onclick="choiceCategorie('primeur')">Beauté</button></li>
                    <li><button class="benjamin" type="button" onclick="choiceCategorie('fromagerie')">Fromages</button></li>
                    <li><button class="benjamin" type="button" onclick="choiceCategorie('boulangerie')">Pains et viennoiseries</button></li>
                    <li><button class="benjamin" type="button" onclick="choiceCategorie('traiteur')">Traiteur</button></li>
                </ul>
                <hr>
                <h2>Affiner par prix</h2>

            </div>
            
        </div>
    </aside>


<!-------------------------------------------------------Container fluid------------------------------------------------------->
        <div class="container-fluid" id="cf">





<!--------------Page d'accueil-------------------->

        <div class="pageAccueil">
            <div class="firstAccueil">
                <div class="text">
                    <h1>Commandez local <br> en <span>click & collect</span> ou <span>livraison à domicile</span></h1>
                    <p>Ici, nous sommes résolument local ! Retrouvez les produits des commerçants, artisans et producteurs proches de chez vous.</p>
                    <ul>
                        <li><img class="icoAccueil" src="icones/panier2.png" alt=""> En direct de vos commerces locaux</li>
                        <li><img class="icoAccueil" src="icones/velo.png" alt=""> Livraison de proximité responsable</li>
                    </ul>
                </div>
                <div class="imageAccueil">
                    <img class="firstImage" src="images/fromager.jpeg" alt="fromager">
                    <img class="secondImage" src="images/maraicher.jpg" alt="maraicher">
                </div>
            </div>

            <div class="secondAccueil">
                <h3>FAITES-VOUS PLAISIR</h3>
                <h2>Des séléctions uniques pour des moments uniques</h2>
                <div class="accueilCard">
                    <a href="#"><div>
                        <img class="cardImage" src="images/mode.png" alt="mode">
                        <p>La mode fabriquée en <br> France</p>
                    </div></a>
                    <a href="#"><div>
                        <img class="cardImage" src="images/vins.png" alt="mode">
                        <p>La mode fabriquée en <br> France</p>
                    </div></a>
                    <a href="#"><div>
                        <img class="cardImage" src="images/maison.png" alt="mode">
                        <p>La mode fabriquée en <br> France</p>
                    </div></a>
                    <a href="#"><div>
                        <img class="cardImage" src="images/alim.png" alt="mode">
                        <p>La mode fabriquée en <br> France</p>
                    </div></a>
                    <a href="#"><div>
                        <img class="cardImage" src="images/beaute.png" alt="mode">
                        <p>La mode fabriquée en <br> France</p>
                    </div></a>
                </div>
                <div class="thirdAccueil">
                    <div class="accueil2Card">
                        <div class="localCard">
                            <img class="cardImage2" src="images/local.png" alt="mode">
                            <h4>Le choix du local</h4>
                            <p>Derrière chaque produit, il y a une histoire. Celle du commerçant ou de l’artisan de votre rue. Acheter local en ligne, c’est aussi préserver le savoir-faire et l’humain tout en participant à l’économie de sa ville.</p>
                            <a href="Autres pages/leChoixDuLocal.html" class="btn btn-warning">Ca m'intéresse</a>
                        </div>
                        <div class="livraisonCard">
                            <img class="cardImage2" src="images/livraison.png" alt="mode">
                            <h4>Livraison et Click & Collect</h4>
                            <p>Ici, vous pouvez commander depuis votre canapé et vous faire livrer, mais si vous préférez récupérer votre commande en 2 heures et en boutique pour le sourire du fleuriste, c'est aussi possible !</p>
                            <a href="Autres pages/livraisons.html" class="btn btn-warning">Je découvre</a>
                        </div>                    
                    </div>
            </div>
        </div>

        </div> <!--fin du cf-->

    </section>








<?php
include "Includes/footer.php";
?>