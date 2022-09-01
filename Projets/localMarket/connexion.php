<?php
$title = "Login";
include "Includes/bdd.php" ;
include "Includes/header_login.php";


        if (isset($_POST['login'])){
            $usermail = $_POST['usermail'];
            $usermdp = sha1($_POST['usermdp']);

            $query = "SELECT * FROM stagiaire_add_videos WHERE usermail='$usermail' and usermdp='".sha1($usermdp)."'"; // requête de selection
            $result = mysqli_query($connexion, $query) ;//execution de la requête
            
            
        }
        
?>
    
    <div class="parent">
        <div class="blocLogin"> 
            <a href="index.php"><img class="logo" src="images/Logo Local Market.png" alt=""></a>
            <div class="connexion">
                <h2>Déjà client ?</h2>
                <form action="" method="POST">
                    <div class="mail">
                        <img class="icon" src="icones/enveloppe.png" alt="">
                        <input type="email" name="usermail" placeholder="E-mail"><br>
                    </div>
                    <div class="password">
                        <img class="icon" src="icones/lock.png" alt="">
                        <input type="password" name="usermdp" placeholder="Password">
                    </div>
                    <div>
                        <p><a href="#">Mot de passe oublié ?</a></p>
                        <input type="submit" name="login" value="Se connecter" class="btn btn-warning">
                    </div>
                </form>
            </div>
            <hr>
            <div class="newClient">
                <h2>Nouveau client ?</h2>
                <a href="inscription.php" class="btn btn-outline-warning">Créer un compte</a>
            </div>
            <div class="mention">Local Market, en tant que responsable de traitement, traite les données recueillies à des fins de gestion de la relation client, gestion des commandes et des livraisons, personnalisation des services, prévention de la fraude, marketing et publicité ciblée. Pour en savoir plus, reportez-vous à la Politique de protection de vos données personnelles</div>
        </div>
    </div> 

<?php
include "Includes/footer_login.php"
?>