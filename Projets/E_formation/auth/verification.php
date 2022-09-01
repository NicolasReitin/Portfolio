<?php
session_start();
include "../Includes/bdd.php";


if (isset($_POST['login']) && isset($_POST['mail']) && isset($_POST['mdp']))
{
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $usermail = mysqli_real_escape_string($connexion, htmlspecialchars($_POST['mail'])); 
    $password = mysqli_real_escape_string($connexion, htmlspecialchars($_POST['mdp']));

    if($usermail !== "" && $password !== "")
    {
        $req = "SELECT pseudo ,count(*) FROM formation_users WHERE mail='$usermail' AND mdp= sha1('$password')"; // requête de selection
        $result = mysqli_query($connexion, $req) ;//execution de la requête

        $select_param = "SELECT id_user, pseudo FROM formation_users WHERE mail='$usermail' AND mdp= sha1('$password')";
        $result_param = mysqli_query($connexion, $select_param);
        $reponse_param = mysqli_fetch_array($result_param);

        $reponse = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = intval($reponse['count(*)']);
        if($count===1) // nom d'utilisateur et mot de passe correctes
        {
            // $_SESSION['Id_utilisateur'] = $reponse_param[0];
            $_SESSION['pseudo'] = $reponse_param[1];
            var_dump($reponse_param);
            header('Location: ../accueil.php');
            // header('Location: accueil.php?id='.$reponse_param[0].'');
        }
        else{
            // header('Location: connexion.php');
            // // echo "Le mail ou le mot de passe est inccorect";
            header('Location: ../connexion.php?erreur1'); // utilisateur ou mot de passe incorrect

        }
    }
    else
    {
        header('Location: ../connexion.php?erreur2'); // utilisateur ou mot de passe vide
    }
    
}

mysqli_close($connexion); // fermer la connexion

?>