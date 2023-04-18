<?php
$title = "Portfolio";
include "Includes/header.php";
?>
    <!--------------------------------------Page d'accueil-------------------------------------->
    <section class="home">
        <div class="home_avatar">
            <div class="text_avatar">
                <!-- <h7>Salut, moi c'est</h7> -->
                <h6>Nicolas <br> REITIN</h6>
                <p id="textdynamic" class="para_home"></p>
                <!-- <p class="para2_home">en cours de formation</p> -->
            </div>
            <div class="image_avatar">
                <img src="images/Avatar_avec_pc.png" alt="avatar">
            </div>
        </div>

    </section>

    <!--------------------------------------Section présentation-------------------------------------->
    <section class="presentation">
        <div class="container">
            <h4 id="Présentation">Salut, moi c'est Nicolas, je suis ravi de vous rencontrer.</h4>
            <p>
            Je viens de terminer une formation de développeur Web et d'obtenir mon diplôme (Titre de certification - Développeur Web)
            et je <b>recherche actuellement une entreprise</b> dans laquelle je pourrais apporter mon <b>savoir-faire</b> et mon <b>savoir-être</b> et acquérir de <b>nouvelles compétences.</b> <br><br>
            J'aimerais pour cela effectuer une alternance de <b>Concépteur Développeur d'Applications</b> à partir de septembre 2023 sur <b>Caen</b> et ses alentours dans le cadre d'un emploi en présentiel ou bien dans <b>toute la France</b> dans le cadre d'un hybride ou d'un full-remote. <br><br>
            J'ai également travaillé pendant 12 ans dans le secteur bancaire et le courtage et suite à une reconversion professionnelle, j'ai décidé de faire du métier de développeur
            mon nouveau métier et d'y faire carrière "pour le meilleur et pour le pire". <br> <br>

            <u>Je vous présente ici mon portfolio et les projets sur lesquels j'ai travaillé :</u> 
            </p>

            
            <div class="box_cv">
                <p class="click">Click to zoom</p>
                <!-- Trigger the Modal -->
                <img id="myImg" src="images/CV2023.png" alt="CV" class="mt-5" style="width: 300px">
            </div>
            <!-- The Modal -->
            <div id="myModal" class="modal">
                <!-- The Close Button -->
                <span class="close">&times;</span>
                <!-- Modal Content (The Image) -->
                <img class="modal-content" id="img01">
            </div>


            <form action="">
            <a href="Download/CV2023.pdf" target="_blank"><button type="button" class="btn btn-outline-warning">Télécharger CV</button></a>
            </form>
        </div>
    </section>
    <!--------------------------------------Section Mes compétences-------------------------------------->
    <section class="skills">
        <div class="font-skill">
            <h2 id="Mes compétences">Mes compétences</h2>
            <div class="bothSide">
                <div class="leftSide">
                    <div class="icon_skill">
                        <span class="margin_icon_skill"><img src="icones/logo-html.png" alt="logo html" style="width: 60px;"></ion-icon></span><div id="scroll1" class="bar " data-skill="HTML"></div>
                    </div>
                    
                    <div class="icon_skill">
                        <span class="margin_icon_skill"><img src="icones/logo-php.png" alt="logo php" style="width: 60px;"></span><div id="scroll4" class="bar php " data-skill="PHP"></div>
                    </div>
                    <div class="icon_skill">
                        <span class="margin_icon_skill"><img src="icones/logo-laravel.jpg" alt="logo laravel" style="width: 60px;"></ion-icon></span><div id="scroll4_5" class="bar laravel " data-skill="Laravel"></div>
                    </div>
                    <div class="icon_skill">
                        <span class="margin_icon_skill"><ion-icon name="logo-wordpress" style="color: #21759a;"></ion-icon></span><div id="scroll9" class="bar wordpress " data-skill="Wordpress"></div>
                    </div>                    
                </div>
                <div class="midSide">
                    <div class="icon_skill">
                        <span class="margin_icon_skill"><ion-icon name="logo-css3" style="color: #006bc0;"></ion-icon></span><div id="scroll2" class="bar css " data-skill="CSS"></div>
                    </div>
                    <div class="icon_skill">
                        <span class="margin_icon_skill"><img src="icones/logo-sass.png" alt="logo sass" style="width: 60px;"></ion-icon></span><div id="scroll6" class="bar sass " data-skill="SASS"></div>
                    </div>
                    <div class="icon_skill">
                        <span class="margin_icon_skill"><img src="icones/logo-git.png" alt="logo git" style="width: 60px;"></ion-icon></span><div id="scroll7" class="bar git " data-skill="Git"></div>
                    </div>
                    
                </div>
                <div class="rightSide">
                    <div class="icon_skill">
                        <span class="margin_icon_skill"><ion-icon name="logo-javascript" style="color: #f7e018;"></ion-icon></span><div id="scroll3" class="bar javascript " data-skill="Javascript"></div>
                    </div>
                    <div class="icon_skill">
                        <span class="margin_icon_skill"><img src="icones/mysql.svg" alt="logo mysql" style="width: 60px;"></span><div id="scroll5" class="bar SQL " data-skill="MySql"></div>
                    </div>                    
                    
                    <div class="icon_skill">
                        <span class="margin_icon_skill"><img src="icones/logo-bootstrap.png" alt="logo bootstrap" style="width: 60px;"></span><div id="scroll8" class="bar bootstrap " data-skill="Bootstrap"></div>
                    </div>
                    <div class="icon_skill">
                        <span class="margin_icon_skill"><img src="icones/logo-symfony.png" alt="logo symfony" style="width: 60px;"></ion-icon></span><div id="scroll10" class="bar Symfony " data-skill="Symfony"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--------------------------------------Section Mes Projets-------------------------------------->
    <section class="projects">
        <h2 id="Mes projets">Mes projets</h2>
        <div class="container_projet">
        
            <div class="case_images">
                <div class="bloc_projet">
                    <h3>Spotizer</h3>
                    <div class="bloc_image">
                        <a href="Projets/Spotizer/public" target="_blank"><img src="images/Aperçu_Spotizer.png" alt="Spotizer" class="images_projet"></a>
                    </div>
                </div>
                <div class="bloc_projet">
                    <h3>NR formation</h3>
                    <div class="bloc_image">
                        <a href="Projets/E_formation/index.php" target="_blank"><img src="images/Apercu_E_formation.png" alt="pokéball" class="images_projet"></a>    
                    </div>
                </div>
                <div class="bloc_projet">
                    <h3>Weather Live</h3>
                    <div class="bloc_image">
                        <a href="Projets/meteo/index.html" target="_blank"><img src="images/Apercu_appli_meteo.png" alt="pokéball" class="images_projet"></a>    
                    </div>
                </div>
                <div class="bloc_projet">
                    <h3>Local Market</h3>
                    <div class="bloc_image">
                        <a href="Projets/localMarket/index.php" target="_blank"><img src="images/Apercu_LocalMarket.png" alt="Site Local Market" class="images_projet"></a>
                    </div> 
                </div>
                <div class="bloc_projet">
                    <h3>Site Budget</h3>
                    <div class="bloc_image">
                        <a href="Projets/Appli_budget/index.html" target="_blank"><img src="images/Apercu_appli_budget.png" alt="Appli budget" class="images_projet"></a>      
                    </div>
                </div>
                <div class="bloc_projet">
                    <h3>Site de sophrologie / hypnose (projet en cours)</h3> 
                    <div class="bloc_image">
                        <a href="" target="_blank"><img src="img/enCours2.png" alt="Bubble_aim" class="images_projet"></a>      
                    </div>
                </div>
                <div class="bloc_projet">
                    <h3>Hôtel unique</h3>
                    <div class="bloc_image">
                        <a href="Projets/Hotel_unique/index.html" target="_blank"><img src="images/Apercu_hotel_unique.png" alt="hotel_unique" class="images_projet"></a>      
                    </div>
                </div>                
                <div class="bloc_projet">
                    <h3>Boucherie / traiteur</h3>
                    <div class="bloc_image">
                        <a href="" target="_blank"><img src="img/enCours2.png" alt="Site Twisto" class="images_projet"></a>      
                    </div>
                </div>
                <div class="bloc_projet">
                    <h3>Salon de coiffure</h3>
                    <div class="bloc_image">
                        <a href="" target="_blank"><img src="img/enCours2.png" alt="Site Twisto" class="images_projet"></a>      
                    </div>
                </div>
            </div>
        </div>


    </section>

    <!--------------------------------------Formulaire de Contact-------------------------------------->
    <section class="contact">
        <div class="container">
            <h2 id="Contact">Contact</h2>
            <div class="map_formu">
                <p>
                    <ion-icon class="tel" name="call-outline"></ion-icon> <a href="tel:+33695398460">06.02.08.34.43</a>
                    <br>
                    <br>
                    <ion-icon class="mail" name="mail-outline"></ion-icon><a href="mailto: contact@nicolas.reitin.fr">  contact@nicolas.reitin.fr</a> 
                </p>
                <div class="formu">
                    <p>
                        <a href="mailto: contact@nicolas.reitin.fr"><input type="email" class="btn btn-outline-warning" value="Contact par mail"></a>
                    </p>
                    <!-- <form action="" method="post">
                    <div class="form-group">
                        <label for="nom">Entrez votre nom</label>
                        <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" name="nom">
                    </div>
                    <div class="form-group mt-2">
                        <label for="objet">Entrez l'objet de votre message</label>
                        <input type="message" class="form-control" id="nom" placeholder="Objet" name="objet">
                    </div>
                    <div class="form-group mt-2">
                        <label for="email">Entrez votre mail</label>
                        <input type="text" class="form-control" id="email" placeholder="Mail" name="email">
                    </div>
                    <div class="form-group mt-2">
                        <label for="bio">Message</label>
                        <textarea class="form-control" name="messages" id="bio" rows="2" placeholder="Tapez votre message ici"></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <input type="submit" class="btn btn-outline-warning " id="nom" value="Envoyer mon message" name="envoyer">
                    </div>
                    </form> -->
                </div>
            </div>
        </div>
    </section>
    
    
     <!--------------------------------------Footer-------------------------------------->
<?php
include "Includes/footer.php"
?>
