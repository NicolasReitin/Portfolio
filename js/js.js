const animation1 = document.getElementById('scroll1');
const animation2 = document.getElementById('scroll2');
const animation3 = document.getElementById('scroll3');
const animation4 = document.getElementById('scroll4');
const animation4_5 = document.getElementById('scroll4_5');
const animation5 = document.getElementById('scroll5');
const animation6 = document.getElementById('scroll6');
const animation7 = document.getElementById('scroll7');
const animation8 = document.getElementById('scroll8');
const animation9 = document.getElementById('scroll9');




//----------------------------------------------Déclanchement skill avec scroll-------------------------------------------------------

window.addEventListener('scroll',() => {
    if(window.scrollY > 450) {
        animation1.classList.add('animation', 'scroll1');
        animation2.classList.add('animation', 'scroll2');
        animation3.classList.add('animation', 'scroll3');
        animation4.classList.add('animation', 'scroll4');
        animation4_5.classList.add('animation', 'scroll4_5');
        animation5.classList.add('animation', 'scroll5');
        animation6.classList.add('animation', 'scroll6');
        animation7.classList.add('animation', 'scroll7');
        animation8.classList.add('animation', 'scroll8');
        animation9.classList.add('animation', 'scroll9');



    }
    // else{
    //     animation1.classList.remove('animation', 'scroll1');
    //     animation2.classList.remove('animation', 'scroll2');
    //     animation3.classList.remove('animation', 'scroll3');
    //     animation4.classList.remove('animation', 'scroll4');
    //     animation4_5.classList.remove('animation', 'scroll4_5');
    //     animation5.classList.remove('animation', 'scroll5');
    //     animation6.classList.remove('animation', 'scroll6');
    //     animation7.classList.remove('animation', 'scroll7');
    //     animation8.classList.remove('animation', 'scroll8');
    //     animation9.classList.remove('animation', 'scroll9');

       
    // }
})

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

//----------------------------------------------texte dynamic page d'accueil-------------------------------------------------------
const txtAnim = document.getElementById('textdynamic');
console.log(txtAnim);

new Typewriter(txtAnim, {
    deleteSpeed: 40
})
.changeDelay(100)
.typeString('Développeur ')
.pauseFor(400)
.typeString('<span style="color: #ed7d2d;"><strong>HTML</strong></span> !')
.pauseFor(1000)
.deleteChars(6)
.typeString('<span style="color: #06a3f8;"><strong>CSS</strong></span> !')
.pauseFor(1000)
.deleteChars(5)
.typeString('<span style="color: #f2d603;"><strong>Javascript</strong></span> !')
.pauseFor(1000)
.deleteChars(12)
.typeString('<span style="color: #9f38c2;"><strong>PhP</strong></span> !')
.pauseFor(1000)
.deleteChars(5)
.typeString('<span style="color: rgb(32, 80, 123);"><strong>My</strong></span><span style="color: rgb(199, 153, 45);"><strong>SQL</strong></span> !')
.pauseFor(1000)
.deleteChars(8)
.typeString('<strong>Front-End</strong> !')
.pauseFor(1000)
.deleteChars(11)
.typeString('<strong>Back-End</strong> !')
.pauseFor(1000)
.deleteChars(10)
.typeString('<strong>Full-Stack!</strong>')
.start()



// Get the modal
let modal = document.getElementById("myModal");
// Get the image and insert it inside the modal - use its "alt" text as a caption
let img = document.getElementById("myImg");
let modalImg = document.getElementById("img01");
let captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = "images/CV_2022.png";
  nonScroll();
}
// Get the <span> element that closes the modal
let span = document.getElementsByClassName("close")[0];
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  ouiScroll();
} 

// annuler scroll au click sur le CV et le modal
function nonScroll()
{ 
scrollHorizontal = window.pageYOffset; // récupère la valeur de la position verticale de la fenêtre
scrollGauche = window.pageXOffset; // récupère la valeur de la position horizontale de la fenêtre
window.onscroll = function() // définit une fonction anonyme qui sera exécutée à chaque fois que la fenêtre sera déplacée
{ 
window.scrollTo(scrollVertical, scrollHorizontal); // permet de restaurer la position de la fenêtre
}; 
}

function ouiScroll() // fonction qui permet de réactiver le scroll
{ 
window.onscroll = function() {}; // supprime la fonction anonyme
} 