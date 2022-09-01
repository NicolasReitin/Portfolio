<?php
$title = "Contact";
include "Includes/header_sans_menu.php";
?>


<!------------------------------------------section formulaire de contact------------------------------------------------->
<section class="contact">
            <div class="container">
            <h2 id="Contact">Formulaire de contact</h2>
                <div class="map_formu">
                    <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19694.46344804634!2d-0.3237745664221788!3d49.1778895187751!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480a68597aac7e6d%3A0x20d6aa072815b364!2s52%20Rue%20Bri%C3%A8re%2C%2014120%20Mondeville!5e0!3m2!1sfr!2sfr!4v1647722241372!5m2!1sfr!2sfr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <p>Tel : 06.02.08.34.43
                    <br>
                    <br>Mail : reitin.pro@gmail.com
                    </p>
                    <div class="formu">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" name="nom">
                        </div>
                        <div class="form-group">
                            <label for="objet">Entrez l'objet de votre message</label>
                            <input type="message" class="form-control" id="nom" placeholder="Objet" name="objet">
                        </div>
                        <div class="form-group">
                            <label for="email">Entrez votre mail</label>
                            <input type="mail" class="form-control" id="email" placeholder="Mail" name="email">
                        </div>
                        <div class="form-group">
                            <label for="bio">Message</label>
                            <textarea class="form-control" name="messages" id="bio" rows="2" placeholder="Tapez votre message ici"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger " id="nom" value="Envoyer mon message" name="envoyer">
                        </div>
                    </form>
                    </div>
                </div>
            <hr>

            </div>
        </section>



<?php
include "Includes/footer.php";
?>