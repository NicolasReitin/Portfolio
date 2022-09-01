<?php
$title = "Voir les vidéos";
include "Includes/bdd.php";
include "Includes/header.php";
include "Includes/sidebar.php";
?>

<div class="parent mt-5">
    <h2>Mes vidéos ajoutées</h2>
    <div class="voir_categorie">
        <div class="container-fluid mt-5">
                <table class="table" style="margin-right: 10%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Catégorie</th>
                            <th>Titre</th>
                            <th style="width: 30%;">Description</th>
                            <th>Poster</th>
                            <th>Fichier</th>
                            <th>Date</th>
                            <th>Action 1</th>
                            <th>Action 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $req_select = "SELECT * FROM formation_add_video ORDER BY id DESC";
                        $selection = mysqli_query($connexion, $req_select);


                        while($row = mysqli_fetch_assoc($selection)){ 
                            $id = $row['id'];
                            $categorie = $row['categorie'];
                            $titre = $row['titre'];
                            $description = $row['description'];
                            $poster = $row['poster'];
                            $file = $row['file'];
                            $date = $row['date'];
                            
                            $req_select2 = "SELECT * FROM formation_add_categorie WHERE id = '$categorie'";
                            $selection2 = mysqli_query($connexion, $req_select2);

                            while($row2 = mysqli_fetch_assoc($selection2)){ 
                                $categorie = $row2['categorie'];   
                            }    

                            echo "<tr>";
                                echo "<td>$id</td>";
                                echo "<td>$categorie</td>";
                                echo "<td>$titre</td>";
                                echo "<td>$description</td>";
                                echo "<td>$poster</td>";
                                echo "<td>$file</td>";
                                echo "<td>$date</td>";
                                echo "<td><a href='video_modif.php?id=$id'><button class='btn btn-warning'>Modifier</button></a></td>";
                                echo "<td><a href='video_suppr.php?id=$id'><button class='btn btn-danger'>X</button></a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
        </div>
        <a href="video_add.php">Ajouter une nouvelle vidéo</a>
    </div>
</div> <!-- fin parent -->


<?php 
include "Includes/footer.php";
?>