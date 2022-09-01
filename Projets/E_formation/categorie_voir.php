<?php
$title = "Voir les catégories";
include "Includes/bdd.php";
include "Includes/header.php";
include "Includes/sidebar.php";

?>

<div class="parent mt-5">
    <h2>Mes catégories ajoutées</h2>
    <div class="voir_categorie">
        <div class="container-fluid mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Catégories</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $req_select = "SELECT * FROM formation_add_categorie"; // requête de selection
                        $selection = mysqli_query($connexion, $req_select); //execution de la requête

                        while($row = mysqli_fetch_assoc($selection)){  //boucle pour afficher toutes les catégories
                            $id = $row['id']; //récupération de l'id de la catégorie
                            $categorie = $row['categorie']; //récupération de la catégorie
                            echo "<tr>"; //ouverture de la ligne
                                echo "<td>$id</td>"; //affichage de l'id de la catégorie
                                echo "<td>$categorie</td>"; //affichage de la catégorie
                                echo "<td><a href='categorie_modif.php?id=$id'><button class='btn btn-warning'>Modifier</button></a></td>"; //affichage du bouton de modification
                                echo "<td><a href='categorie_suppr.php?id=$id'><button class='btn btn-danger'>X</button></a></td>"; //affichage du bouton de suppression
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
        </div>
        <a href="categorie_add.php">Ajouter une nouvelle catégorie</a>
    </div>
</div> <!-- fin parent -->


<?php 
include "Includes/footer.php";
?>
