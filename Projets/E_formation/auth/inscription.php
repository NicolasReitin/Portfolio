<?php
$title = "Inscription";
include "../Includes/bdd.php" ;
include "../Includes/header_login.php";


if(isset($_POST['inscription'])){
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $nom = htmlspecialchars($_POST['nom']); // On récupère le nom
    $prenom = htmlspecialchars($_POST['prenom']); // On récupère le prénom
    $date_de_naissance = htmlspecialchars($_POST['date_de_naissance']);
    $mail = htmlspecialchars($_POST['mail']); // On récupère le mail
    $mdp = htmlspecialchars(sha1($_POST['mdp'])); // On récupère le mot de passe et on le crypt

    if(!empty($pseudo) AND !empty($nom)AND !empty($prenom) AND !empty($date_de_naissance) AND !empty($mail) AND !empty($mdp)){ // Si les variables sont définies et non vides
        
        // vérification si le mail existe déjà
        $verif = "SELECT * FROM formation_users WHERE mail = '$mail' OR pseudo = '$pseudo'"; // requête de selection
        $result_verif = mysqli_query($connexion, $verif);//execution de la requête
        if(mysqli_num_rows($result_verif)==0){  //si le résultat de notre requête n'est pas encore existant on continue la condition sinon on affiche un message d'erreur
                
                ?>
                    <div class="confirmInscription">
                        <?= "Bienvenue sur le site <strong>".ucfirst($pseudo)."</strong>."."<br>"."Tu peux maintenant revenir à l'accueil et t'authentifier."."<br>"."<a href='../accueil.php'>Retour à la page d'accueil</a>"; 
                        ?>
                    </div>
                <?php
            $req_query = "INSERT INTO formation_users(pseudo, nom, prenom, date_de_naissance, mail, mdp) VALUES('$pseudo', '$nom', '$prenom', '$date_de_naissance', '$mail', '$mdp')"; // requête d'insertion dans la BDD
            $ajout_member = mysqli_query($connexion, $req_query); // execution de la requête 
        }else{
            ?>
                    <div class="confirmInscription">
                        <?= "&#9888; Le pseudo ou l'adresse mail que vous avez renseigné est déjà utilisé &#9888;"."<br>"."Merci de reessayer avec un autre.";
                        ?>
                    </div>
            <?php
        }
    }else{
        ?>
            <div class="champsIncomplets">
                <?= "&#9888; Certains champs sont manquants &#9888;"."<br>"." Merci de remplir tous les champs ";
                ?>
            </div>
        <?php
    }
}
?>
<!-------------------------------------------------------formulaire d'inscription------------------------------------------------------->

<div class="parent">
    <div class="blocLogin"> 
        <a href="../index.php"><img class="logo" src="../img/logo_blanc.png" alt=""></a>
        <div class="connexion">
            <h2>Inscription</h2>
            <form action="" method="POST">
                <div class="nom" >
                    <div class="blocItem">
                    <img class="icon" src="../icones/profil.png" alt="login">
                    </div>
                    <input type="text" name="pseudo" placeholder="Pseudo"><br>
                </div>
                <div class="prenom" >
                    <div class="blocItem">
                    </div>
                    <input type="text" name="nom" placeholder="Nom"><br>
                </div>
                <div class="prenom">
                    <div class="blocItem">
                    </div>
                    <input type="text" name="prenom" placeholder="Prénom"><br>
                </div>
                <div class="prenom" >
                    <div class="blocItem">
                    </div>
                    <input type="date" name="date_de_naissance" style="text-align: end; color: #878a8e; " placeholder="Date de naissance"><br>
                </div>
                <div class="mail">
                    <div class="blocItem">
                    <img class="icon" src="../icones/enveloppe.png" alt="enveloppe">
                    </div>
                    <input type="email" name="mail" placeholder="E-mail"><br>
                </div>
                <div class="password">
                    <div class="blocItem">
                    <img class="icon" src="../icones/lock.png" alt="cadenas">
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
            <h2>Déjà inscrit ?</h2>
            <a href="connexion.php" class="btn btn-outline-warning">Se connecter</a>
        </div>
        
        <div class="mention">NR Class room, en tant que responsable de traitement, traite les données recueillies à des fins de gestion de la relation client, gestion des commandes et des livraisons, personnalisation des services, prévention de la fraude, marketing et publicité ciblée. Pour en savoir plus, reportez-vous à la Politique de protection de vos données personnelles</div>
    </div>
</div> 

<?php
include "Includes/footer_login.php"
?>