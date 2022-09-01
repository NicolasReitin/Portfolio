<?php
$title = "Panier";
include "Includes/header_sans_menu.php";
?>

<div class="sectionPanier">
    <h2>Récapitulatif de votre panier</h2>
    <div class="container-fluid" id="cfPanier"></div>
    <table class="table">
        <thead>
            <tr><th>Article</th><th>Prix</th><th>Quantité</th></tr>
        </thead>
        <tbody id="cart-tablebody"></tbody>
    </table> 
    <div>
        <button type="submit" class="btn btn-danger deleteAll" onclick="removeAllItem()">Tout supprimer</button>
        <p>Total : <span id="subtotal"></span> €</p>

        <button id="confirm-command" class="btn btn-warning passCommand">Passer la commande</button>
    </div>
    <div class="retourIndex">
        <a href="index.html"> <i class="fa-solid fa-chevron-left"></i>Continuer mes achats</a>
    </div>
</div>



<?php
include "Includes/footer.php";
?>