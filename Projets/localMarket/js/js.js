let cf = document.getElementById('cf');

const menuCache = document.getElementById('menuCache');
const menuLeft = document.getElementById('menuLeft');

const menuLeftAlim = document.getElementById('menuLeftAlim');
const menuLeftBeaute = document.getElementById('menuLeftbeaute');

let pastille = document.getElementById('in-cart-items-num');

let pagePanier = [];
let panierTampon = [];

function verifCart(){
    if(localStorage.getItem('cart')){
        return cart = JSON.parse(localStorage.getItem('cart'))
    }else{
        return cart =[];
    }
}

//------------------------------------------------------------------------------------

function generateMenuCache(){
    menuCache.classList.remove('menuCache');
}
function closeMenuCache(){
    menuCache.classList.add('menuCache');
}

function generateMenuLeft(){
    menuLeft.classList.remove('diplayNone');
}
function generateMenuLeftAlim(){
    menuLeftAlim.classList.remove('diplayNone');
}
function generateMenuLeftBeaute(){
    menuLeftBeaute.classList.remove('diplayNone');
}



function generateAlim(){
    cf.innerHTML = "";
    for (let i=0; i<monAlimentaire.magasins.length; i++){
            //création des lignes
            maRow = document.createElement("div");
            maRow.classList.add("row");
            cf.appendChild(maRow);         
            
            for(let y=0; y<monAlimentaire.magasins[i].produits.length; y++){
                //création des colonnes
                let maCol = document.createElement("div");
                maCol.classList.add("col-3", "card");
                maRow.appendChild(maCol);

                let images = document.createElement ("img");
                images.src = monAlimentaire.magasins[i].produits[y].image;
                images.alt = "photo de " + monAlimentaire.magasins[i].produits[y].name;
                images.classList.add("imgCard");
                maCol.appendChild(images);

                let H5 = document.createElement("h5");
                H5.textContent = monAlimentaire.magasins[i].produits[y].name;
                H5.id = "titreCard";
                maCol.appendChild(H5);

                let description = document.createElement("p"); 
                description.textContent = monAlimentaire.magasins[i].produits[y].description;
                maCol.appendChild(description);

                let prix = document.createElement("div");
                prix.textContent = monAlimentaire.magasins[i].produits[y].prix;
                prix.id = "prixCard";
                maCol.appendChild(prix);

                let maRow2 = document.createElement('div');
                maRow2.classList.add('row', 'add-to-cart');
                maCol.appendChild(maRow2)

                    let maCol2 = document.createElement('div')
                    maCol2.classList.add('col');
                    maRow2.appendChild(maCol2);      


                        maCol2.innerHTML = `<label for="q">Qté: </label><select id="${monAlimentaire.magasins[i].produits[y].name}" name="q" class="btn btn-outline-secondary"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option></select>`;

                        let button = document.createElement('button');
                        button.classList.add('btn', 'btn-warning');
                        button.textContent = "Ajouter panier";
                        button.id = monAlimentaire.magasins[i].produits[y].name;
                        maCol2.appendChild(button);



                    button.addEventListener('click', ()=>{
                        let quantité = document.getElementById(monAlimentaire.magasins[i].produits[y].name).value;
                            //console.log(quantité);
                            //console.log(monAlimentaire.magasins[i].produits[y].name);
                            //console.log(parseFloat(monAlimentaire.magasins[i].produits[y].prix));
                        let articleInPanier= {
                            "name" : monAlimentaire.magasins[i].produits[y].name,
                            "prix" : parseFloat(monAlimentaire.magasins[i].produits[y].prix),
                            "quantité" : quantité,
                        }
                        verifCart();
                        cart.push(articleInPanier);
                        localStorage.setItem('cart', JSON.stringify(cart));                          
                })
            }
    }

}



//-------------------------------------------Choix par catégorie-----------------------------------------

function choiceCategorie(categorie){
    cf.innerHTML = "";
    for (let i=0; i<monAlimentaire.magasins.length; i++){
            //création des lignes
            maRow = document.createElement("div");
            maRow.classList.add("row");
            cf.appendChild(maRow);         
            
            for(let y=0; y<monAlimentaire.magasins[i].produits.length; y++){
                if(monAlimentaire.magasins[i].produits[y].categorie === categorie){
                    //création des colonnes
                    let maCol = document.createElement("div");
                    maCol.classList.add("col-3", "card");
                    maRow.appendChild(maCol);

                    let images = document.createElement ("img");
                    images.src = monAlimentaire.magasins[i].produits[y].image;
                    images.alt = "photo de " + monAlimentaire.magasins[i].produits[y].name;
                    images.classList.add("imgCard");
                    maCol.appendChild(images);

                    let H5 = document.createElement("h5");
                    H5.textContent = monAlimentaire.magasins[i].produits[y].name;
                    maCol.appendChild(H5);

                    let description = document.createElement("p"); 
                    description.textContent = monAlimentaire.magasins[i].produits[y].description;
                    maCol.appendChild(description);

                    let prix = document.createElement("div");
                    prix.textContent = monAlimentaire.magasins[i].produits[y].prix;
                    maCol.appendChild(prix);

                    let maRow2 = document.createElement('div');
                    maRow2.classList.add('row', 'add-to-cart');
                    maCol.appendChild(maRow2);

                    let maCol2 = document.createElement('div')
                    maCol2.classList.add('col');
                    maRow2.appendChild(maCol2);      

                        maCol2.innerHTML = `<label for="q">Qté: </label><select id="${monAlimentaire.magasins[i].produits[y].name}" name="q" class="btn btn-outline-secondary"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option></select>`;

                        let button = document.createElement('button');
                        button.classList.add('btn', 'btn-warning');
                        button.textContent = "Ajouter panier";
                        button.id = monAlimentaire.magasins[i].produits[y].name;
                        maCol2.appendChild(button);
                    
                        button.addEventListener('click', ()=>{
                            let quantité = document.getElementById(monAlimentaire.magasins[i].produits[y].name).value;
                            //console.log(quantité);
                            //console.log(monAlimentaire.magasins[i].produits[y].name);
                            //console.log(parseFloat(monAlimentaire.magasins[i].produits[y].prix));
                            let articleInPanier= {
                                "name" : monAlimentaire.magasins[i].produits[y].name,
                                "prix" : parseFloat(monAlimentaire.magasins[i].produits[y].prix),
                                "quantité" : quantité,
                            }
                            verifCart();
                            cart.push(articleInPanier);
                            localStorage.setItem('cart', JSON.stringify(cart));
                            })
                }
            }
    }
}

function getItem() {
    pagePanier= localStorage.getItem("cart")
    panierTampon = JSON.parse(pagePanier);
}
getItem();


let sumPastille = 0;
function countPanier(){
    for (let i=0; i<panierTampon.length; i++){
        sumPastille += Number.parseInt(panierTampon[i].quantité);
    }
    pastille.textContent = sumPastille;
    }
countPanier();







//----------------------------------------------Retour en haut de page-------------------------------------------------------

jQuery(function(){
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 200 ) { 
                $('#scrollUp').css('right','10px');
            } else { 
                $('#scrollUp').removeAttr( 'style' );
            }
        });
    });
});




function generateBeaute(){
    cf.innerHTML = "";
}
function generateCulture(){
    cf.innerHTML = "";
}
function generatePlante(){
    cf.innerHTML = "";
}
function generateSport(){
    cf.innerHTML = "";
}
function generateMaison(){
    cf.innerHTML = "";
}
function generateSante(){
    cf.innerHTML = "";
}
function generateService(){
    cf.innerHTML = "";
}
function generatevins(){
    cf.innerHTML = "";
}

