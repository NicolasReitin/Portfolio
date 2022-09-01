let tbody = document.querySelector('tbody');
let subtotal = document.getElementById('subtotal');




getItem()


function getItem() {
    pagePanier= localStorage.getItem("cart")
    panierTampon = JSON.parse(pagePanier);
}

function removeAllItem() {
    localStorage.clear();
    location.reload();

}
function generateTable(){
    tbody.innerHTML="";
    for(i=0; i<panierTampon.length; i++){
        let tr = document.createElement('tr');
        tbody.appendChild(tr);

        let tdname = document.createElement('td');
        tdname.textContent = panierTampon[i].name;
        tr.appendChild(tdname);

        let tdprix = document.createElement('td');
        tdprix.textContent = panierTampon[i].prix +" €";
        tr.appendChild(tdprix);

        let tdqte = document.createElement('td');
        tdqte.textContent = panierTampon[i].quantité;
        tr.appendChild(tdqte);

        let button = document.createElement('button');
        button.classList.add('btn', 'btn-danger','btnDelete');
        button.textContent = "X";
        button.id = i
        tr.appendChild(button);
        
        button.addEventListener('click', ()=>{
            pagePanier= localStorage.getItem("cart")
            panierTampon = JSON.parse(pagePanier);
            panierTampon.splice(button.id,1);
            localStorage.setItem('cart', JSON.stringify(panierTampon));
            sumTotal();
            generateTable();
        })
    }
}
generateTable()

function sumTotal(){
    let sum = 0;
    for (let i=0; i<panierTampon.length; i++){
        sum += panierTampon[i].prix*panierTampon[i].quantité;
    }
    subtotal.textContent = Math.round((sum + Number.EPSILON)*100)/100;
}
sumTotal()








