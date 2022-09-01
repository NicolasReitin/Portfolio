<?php
$title = "Inscription";
include "Includes/bdd.php" ;
include "Includes/header_login.php";

    // if(!$connexion){
    //     echo"Vous n'êtes pas connectés";
    // }else{
    //     echo "Vous êtes connectés";
    // }

    if(isset($_POST['inscription'])){
        $nom = $_POST['nom']; // On récupère le nom
        $prenom = $_POST['prenom']; // On récupère le prénom
        $mail = $_POST['mail']; // On récupère le mail
        $mdp = sha1($_POST['mdp']); // On récupère le mot de passe et on le crypt
        if(!empty($nom) AND !empty($prenom) AND !empty($mail) AND !empty($mdp)){ // Si les variables sont définies et non vides
            
        // vérification si le mail existe déjà
        $verif = "SELECT * FROM users_nico WHERE mail = '$mail'"; // requête de selection
        $result_verif = mysqli_query($connexion, $verif);//execution de la requête
            if(mysqli_num_rows($result_verif)<=0){  //si le résultat de notre requête n'est pas encore existant on continue la condition sinon on affiche un message d'erreur
                ?>
                    <div class="confirmInscription">
                        <?= "Bienvenue sur Local Market ".$prenom."."."<br>"."<a href='index.php'>Retour à la page d'accueil</a>"; 
                        ?>
                    </div>
                <?php
            $req_query = "INSERT INTO users_nico(nom, prenom, mail, mdp) VALUES('$nom', '$prenom', '$mail', '$mdp')"; // requête d'insertion
            $ajout_member = mysqli_query($connexion, $req_query); // execution de la requête 
            }else{
                echo "Ce mail existe déjà";
            }
        }else{
            ?>
                <div class="champsIncomplets">
                    <?= "&#9888; Merci de remplir tous les champs &#9888;";
                    ?>
                </div>
            <?php
        }
    }
?>

<!-------------------------------------------------------formulaire d'inscription------------------------------------------------------->

    <div class="parent">
        <div class="blocLogin"> 
            <a href="index.php"><img class="logo" src="images/Logo Local Market.png" alt=""></a>
            <div class="connexion">
                <h2>Inscription</h2>
                <form action="" method="POST">
                    <div class="nom" >
                        <div class="blocItem">
                        <img class="icon" src="icones/profil.png" alt="login">
                        </div>
                        <input type="text" name="nom" placeholder="Nom"><br>
                    </div>
                    <div class="prenom">
                        <div class="blocItem">
                        </div>
                        <input type="text" name="prenom" placeholder="Prénom"><br>
                    </div>
                    <div class="mail">
                        <div class="blocItem">
                        <img class="icon" src="icones/enveloppe.png" alt="enveloppe">
                        </div>
                        <input type="email" name="mail" placeholder="E-mail"><br>
                    </div>
                    <div class="password">
                        <div class="blocItem">
                        <img class="icon" src="icones/lock.png" alt="cadenas">
                        </div>
                        <input type="password" name="mdp" placeholder="Password">                    
                    </div>
                    <div>
                        <input type="submit" class="btn btn-warning" name="inscription" value="Inscription">
                    </div>
                </form>
                
            </div>
            <hr>
            <div class="newClient">
                <h2>Déjà client ?</h2>
                <a href="connexion.php" class="btn btn-outline-warning">Se connecter</a>
            </div>
            
            <div class="mention">Local Market, en tant que responsable de traitement, traite les données recueillies à des fins de gestion de la relation client, gestion des commandes et des livraisons, personnalisation des services, prévention de la fraude, marketing et publicité ciblée. Pour en savoir plus, reportez-vous à la Politique de protection de vos données personnelles</div>
        </div>
    </div> 

<?php
include "Includes/footer_login.php"
?>