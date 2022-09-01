let cf = document.getElementById('cf');
let tbody = document.getElementById('tbody');
let solde = document.getElementById('solde_final');
let balance = document.getElementById('affichageBalance');
//ancienne valeur tampon
let count = 0;

// fonction pour supprimer les valuers par défaut du JSON.
eraseJSON();
function eraseJSON(){
    for (let i=0; i<budget.transaction.length; i++){
        budget.transaction.splice(i, 1);
    }
}

//on génère le tableau à l'ouverture de la page (utile si local storage)
generate();  
//fonction de stockage dans le localstorage des opérations effectuées et entrées dans le JSON.
//isBudgetSet();

console.log(budget.transaction);

//Affiche le solde en aditionnant toutes les valeurs stockées dans le JSON
function generateSolde() {
    //variable tampon pour stocker les valeurs
    let temp = 0;
    //on parcours le tableau busget.transaction
    for (let i=0; i<budget.transaction.length; i++) {
        //on stock chaque valeur dans la variable tampon
        temp = temp + budget.transaction[i].valeur;
    }
    //on affiche la somme de ces valeurs
    solde.innerHTML = temp + " €";
    //si la somme est inf à 0 c'est rouge / sinon c'est vert
    if (temp < 0) {
        solde.style.color = 'red';
    } else {
        solde.style.color = '#4CF000';
    }
}


//fonction qui génère le tableau de compte
function generate(){
    //on vide le tableau de compte
    tbody.innerHTML = "";
    //on parcours le JSON
    for (let i=0; i<budget.transaction.length; i++){
        //on créé une ligne de tableau par élément de 'transaction'
        let maRow = document.createElement("tr");
        //on met une variable maCol vide pour le moment pour l'utiliser en dehors de la boucke qui la créé
        let maCol = "";
        tbody.appendChild(maRow);
            //on utilise un switch pour faire correspondre chaque création de colonne à un item de budget.transaction. Impossible avec une boucle for classique car les éléments ne constituent pas un tableau.
            for(let y = 0; y<4; y++){
                //on créé une colonne (et donc un td) pour chaque élément.
                maCol = document.createElement("td");
                switch(y){
                    case 0 : maCol.textContent= budget.transaction[i].date;
                    break;
                    case 1 : maCol.textContent= budget.transaction[i].valeur + " €";
                    break;
                    case 2 : maCol.textContent= budget.transaction[i].categories;
                    break;
                    case 3 : maCol.textContent= budget.transaction[i].etablissement;
                    break;
                }
                maRow.appendChild(maCol);
            //on colore la ligne en fonction de si c'est un débit (rouge) ou un crédit (vert)
            if (budget.transaction[i].valeur < 0){
                maCol.style.color="red";
            } else {
                maCol.style.color="#4CF000";
            }
            } 
            //on créé un bouton pour effacer l'entrée du tableau
            let delButon = document.createElement("button");
            delButon.classList.add("btn", "btn-danger");
            delButon.textContent = "X";
            //fonction au clic
            delButon.addEventListener("click", function(){
                //au clic sur le bouton, on supprimera la première entrée du tableau qui suit l'indice de i appelé dans la boucle, soit l'entrée du tableau associée à la ligne où se trouve le bouton.
                budget.transaction.splice(i, 1);
                //on resauvegarde le JSON dans le localStorage avec la modif (suppression)
                localStorage.setItem('budget', JSON.stringify(budget));
                //on génère un nouveau tableau de compte
                generate();
            })
            maRow.appendChild(delButon);
    }
    //on génère un nouveau solde à partir des entrées restantes.
    //en appelant cette fonction ici, cela permet, comme la fonction est appelée dès le chargement de la page, d'avoir un solde à jour en cas de données stockées dans le localstorage.
    generateSolde();
    //utile lors de l'appel de la fontion de balance = fait disparaitre la ligne lorsqu'une nouvelle entrée est enregistrée.
    balance.innerHTML = "";
}


//à partir des données entrées par l'utilisateur dans le formulaire credit, on créé une nouvelle entrée dans le JSON.
function newCredit(){
    //on récupère les valeurs saisies dans les formulaires
    let newMontant = document.getElementById('valeur').value;
    let newDate = document.getElementById('date').value;
    //ce n'est pas un input mais un select + options donc pour récupérer la valeur selctionnées il faut utiliser cette méthode là.
    //Remplir valeur dasn HTML et selectionner la value au lieu de l'option. 
    let newCategorie = document.getElementById("categorie").options[document.getElementById('categorie').selectedIndex].text;
    let newEtablissement = document.getElementById('etablissement').value;
    //on formate les données pour qu'elles coresspondent au JSON.
    let newTrans = {
        //on précise que c'est un élément plus car pour les opérations avec les valeurs '-' cela pose problème sinon (problème de concaténation de chaines de caractères)
        "valeur": + newMontant,
        "date": newDate,
        "categories": newCategorie,
        "etablissement": newEtablissement,
    };
    //on unshift la nouvelle entrée plutôt que de la push pour qu'elle se trouve en début de tableau et que la dernière ligne enregistrée soit la première visible pour l'utilisateur.
    budget.transaction.unshift(newTrans);
    //on stock la nouvelle entrée dans le local storage (mieux vaut trop que pas assez)
    localStorage.setItem('budget', JSON.stringify(budget));
    //on génère un nouveau solde.
    generateSolde()
    //on refaut un nouveau tableau.
    generate();
}


//pareil que l'autre mais en débit. Les deux fonctions sont appelées par deux boutons différents en HTML.
function newDebit(){
    let newMontant = document.getElementById('valeur-').value;
    let newDate = document.getElementById('date-').value;
    let newCategorie = document.getElementById("categorie-").options[document.getElementById('categorie-').selectedIndex].text;
    let newEtablissement = document.getElementById('etablissement-').value;
    let newTrans = {
        //comme c'est un débit, on précise que la valeur entrée est négative.
        "valeur": - newMontant,
        "date": newDate,
        "categories": newCategorie,
        "etablissement": newEtablissement,
    };

    budget.transaction.unshift(newTrans);
    //localStorage
    localStorage.setItem('budget', JSON.stringify(budget));
    
    generateSolde();
    generate();
}


//on créé une fonction de recherche d'opérations entrées par catégorie
function recherche(){
    let recCategorie = document.getElementById('categorieRec').options[document.getElementById('categorieRec').selectedIndex].text;
    //on vide le tableau existant.
    tbody.innerHTML = "";
    //on parcours le JSON.
    for (let i=0; i<budget.transaction.length; i++){
        //on s'attarde sur les éléments qui ont la même catégorie que celle selectionnée dans la recherche.
        if (budget.transaction[i].categories == recCategorie) {
            //s'ils correspondent, on recréé les élements correspondant à la recherche dans un nouveau tableau
            let maRow = document.createElement("tr");
            tbody.appendChild(maRow);
            for(let y = 0; y<4; y++){
                let maCol = document.createElement("td");
                switch(y){
                    case 0 : maCol.textContent= budget.transaction[i].date;
                    break;
                    case 1 : maCol.textContent= budget.transaction[i].valeur + " €";
                    break;
                    case 2 : maCol.textContent= budget.transaction[i].categories;
                    break;
                    case 3 : maCol.textContent= budget.transaction[i].etablissement;
                    break;
                }
                //les couleurs, toujours les couleurs
                maRow.appendChild(maCol);
                if (budget.transaction[i].valeur < 0){
                    maCol.style.color="red";
                } else {
                    maCol.style.color="#4CF000";
                }
            }
            
        }
        
    }
}


//on créé une recherche d'opérations par date (même procédé que pour la recherche par catégorie)
function rechercheDate(){
    //on récupère la date cherchée
    let recDate = document.getElementById('dateRec').value;
    //on vide le tableau pour afficher que les résultats souhaités
    tbody.innerHTML = "";
    //on parcourt le JSON
    for (let i=0; i<budget.transaction.length; i++){
        //même opération que pour la catégorie.
        if (budget.transaction[i].date == recDate) {
            let maRow = document.createElement("tr");
            tbody.appendChild(maRow);
            for(let y = 0; y<4; y++){
                let maCol = document.createElement("td");
                switch(y){
                    case 0 : maCol.textContent= budget.transaction[i].date;
                    break;
                    case 1 : maCol.textContent= budget.transaction[i].valeur;
                    break;
                    case 2 : maCol.textContent= budget.transaction[i].categories;
                    break;
                    case 3 : maCol.textContent= budget.transaction[i].etablissement;
                    break;
                }
                maRow.appendChild(maCol);
                if (budget.transaction[i].valeur < 0){
                    maCol.style.color="red";
                } else {
                    maCol.style.color="#4CF000";
                }
            } 
        }
        
    }
}

//fonction de balance entre deux dates.
function comparaison(){
    //on enregistre les deux dates souhaitées.
    let date1 = document.getElementById('date1').value;
    let date2 = document.getElementById('date2').value;
    //on stock les valeurs de ces deux dates dans deux variables distinctes
    let somme = 0;
    let somme2 = 0;
    //on parcours le JSON
    for (let i=0; i<budget.transaction.length; i++){
        //si la date 1 match on ajoute sa valeur à une première variable
        if (date1 == budget.transaction[i].date){
            somme = somme + budget.transaction[i].valeur;
        //pareil pour la date 2.
        } else if (date2 == budget.transaction[i].date) {
            somme2 = somme2 + budget.transaction[i].valeur;
        }
    }
    //on fait la balance entre les deux variables.
    sommeFinal = somme + somme2;
    //on affiche le résultat.
    balance.innerHTML = "La balance entre le "+ date1 + " et le " + date2 + " est de " + sommeFinal + " €.";
}

//fonction d'enregistrement dans le localstorage.
function isBudgetSet(){
    var monBudget = localStorage.getItem('budget');
    if(monBudget != ""){
        budget = JSON.parse(monBudget);
        generate();
    }
}


//---------------------------------------------FONCTIONS EN CHANTIER-----------------------------------------------------//
//tentative d'utilisation de moment.js pour convertir les dates en fr. pas très fructueux.
let now = moment();
console.log(now.format('DD-MM-YYYY'));

//fonction teste pour avoir un solde initial mais qui repose sur la V1 du calcul du solde total.
function addSoldeInitial(){
    let soldeInitial = document.getElementById('initial').value;
    let textSoldeInitial = document.getElementById('textSoldeInitial');
    let divSoldeInitial = document.getElementById('divSoldeInitial');
    //on utilisait une valeur tampon 'count', déclarée en début de fichier JS, pour stocker les valeurs entrées dans le tableau. Le problème était que la valeur n'était pas gardée en cas de refresh de Cmd+R  !!! 
   count = soldeInitial;
   //l'affihage du solde était juste un innerHTML de la valeur count, elle même incrémentée par toutes les valeurs des opérations éffectuées.
   solde.innerHTML = count + " €";
   textSoldeInitial.classList.add('active');
   divSoldeInitial.classList.add('active');
   //on appelait une fonction pour colorer le solde en vert ou rouge.
   generateColorSolde()
}

//on a utiliser cette fonction pour le solde avec 'count'. Par la suite, on a implémenté cette fonction au generateSolde() directement.
function generateColorSolde() {
    if (count < 0) {
        solde.style.color = 'red';
    } else {
        solde.style.color = '#4CF000';
    }
}

//tentative de création d'une fonction pour colorer les lignes... a plus fait planter le code qu'autre chose.
function colorLine(){
    if (budget.transaction[i].valeur < 0){
        maCol.style.color="red";
    } else {
        maCol.style.color="yellowgreen";
    }
}
