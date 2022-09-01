<?php
$title = "Login";
include "../Includes/bdd.php" ;
include "../Includes/header_login.php";
?>
    
    <div class="parent">
        <div class="blocLogin"> 
            <a href="../index.php"><img class="logo" src="../img/logo_blanc.png" alt=""></a>
            <div class="connexion">
                <h2>Déjà inscrit ?</h2>
                <form action="verification.php" method="POST">
                    <div class="mail">
                        <img class="icon" src="../icones/enveloppe.png" alt="">
                        <input type="email" name="mail" placeholder="E-mail"><br>
                    </div>
                    <div class="password">
                        <img class="icon" src="../icones/lock.png" alt="">
                        <input type="password" name="mdp" placeholder="Password">
                    </div>
                    <?php
                    if(isset($_GET['erreur1'])){
                        echo "<p style='color: red'>Le mail ou le mot de passe est incorrect</p>";
                    }
                    if(isset($_GET['erreur2'])){
                        echo "<p style='color: red'>Un des champs est vide</p>";
                    }
                    ?>
                    <div>
                        <p><a href="#">Mot de passe oublié ?</a></p>
                        <input type="submit" name="login" value="Se connecter" class="btn btn-warning">
                    </div>
                </form>
            </div>
            <hr>
            <div class="newClient">
                <h2>Nouvel utilisateur ?</h2>
                <a href="inscription.php" class="btn btn-outline-warning">Créer un compte</a>
            </div>
            <div class="mention">NR Class room, en tant que responsable de traitement, traite les données recueillies à des fins de gestion de la relation client, gestion des commandes et des livraisons, personnalisation des services, prévention de la fraude, marketing et publicité ciblée. Pour en savoir plus, reportez-vous à la Politique de protection de vos données personnelles
            </div>
        </div>
    </div> 

<?php
include "Includes/footer_login.php"
?>