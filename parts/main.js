// Get the modal
let modal = document.getElementById("myModal");
let btn = document.getElementById("myBtn");
let span = document.querySelector(".close");
let contactMenu = document.querySelector(".contact-menu");
let contactMenuBurger = document.querySelector(".contact-menu-burger");

// Lorsqu'on clique sur le lien Contact, on ouvre la modale
contactMenu.onclick = function() {
    modal.style.display = "block";
}

// Lorsqu'on clique sur le lien Contact du menu burger, on ouvre la modale
contactMenuBurger.onclick = function() {
    modal.style.display = "block";
}

// Lorsqu'on clique sur le bouton Contact, on ouvre la modale
if (btn != null) {
btn.onclick = function() {
    modal.style.display = "block";
}}

// Lorsqu'on clique sur la croix, on ferme la modale
span.onclick = function() {
    modal.style.display = "none";
    resetReferenceField();
}

// Lorsqu'on clique n'importe où sur le background, la modale se ferme
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        resetReferenceField();
    }
}

// Remplir le champs "Réf. photo" automatiquement dans le single
let prefillButtons = document.querySelectorAll(".prefill-reference");

function prefillReferenceField(referenceValue) {
    let referenceField = document.getElementById("referenceField");
    referenceField.value = referenceValue;
}

prefillButtons.forEach(function(button) {
    button.addEventListener("click", function() {        
        let referenceValue = this.getAttribute("data-reference");
        // On vérifie si le bouton a la classe .contact-menu
        if (!button.classList.contains("contact-menu")) {
            prefillReferenceField(referenceValue);
            modal.style.display = "block";
        }
    });
});

// Fonction pour réinitialiser le champ Réf. photo
function resetReferenceField() {
    let referenceField = document.getElementById("referenceField");
    referenceField.value = "";
}





// Lightbox
// @property {HTMLElement} element
// @property {string[]} images Chemins des images de la lightbox
// @property {string} url Image actuellement affichée
class Lightbox {

    static init() {
        const lightboxTriggers = document.querySelectorAll('.full-screen-icon');
        const images = Array.from(lightboxTriggers).map(trigger => trigger.getAttribute('data-url'));


        lightboxTriggers.forEach((trigger, index) => {
            trigger.addEventListener('click', e => {
                e.preventDefault();
                const imageUrl = trigger.getAttribute('data-url');            
                const references = Array.from(document.querySelectorAll('.reference-lightbox')).map(ref => ref.textContent);
                const categories = Array.from(document.querySelectorAll('.categorie-lightbox')).map(cat => cat.textContent);  

                new Lightbox(imageUrl, images, references, categories);
            });
        });
    }

        
    

    // @param {string} url URL de l'image
    // @param {string[]} images Chemins des images de la lightbox

    constructor(url, images, references, categories) {
        this.element = this.buildDom(url);
        this.images = images;
        this.references = references;
        this.categories = categories;
        this.currentIndex = images.indexOf(url);
        this.loadImage(url);
        document.body.appendChild(this.element);
        this.onKeyUp = this.onKeyUp.bind(this);
        document.addEventListener('keyup', this.onKeyUp);
    }

    // @param {string} url URL de l'image

    loadImage (url) {
        this.url = null
        const image = new Image()
        const container = this.element.querySelector('.lightbox_container')
        const loader = document.createElement('div')
        loader.classList.add('lightbox_loader')
        container.innerHTML = ''
        container.appendChild(loader)

        const currentIndex = this.images.indexOf(url);
        const reference = this.references[currentIndex];
        const categorie = this.categories[currentIndex];

        const refCatLight = document.createElement('div')
        refCatLight.classList.add('ref-cate-light')
        const pRef = document.createElement('p')
        pRef.innerHTML = reference
        const pCat = document.createElement('p')
        pCat.innerHTML = categorie

        refCatLight.appendChild(pRef)
        refCatLight.appendChild(pCat)
        container.appendChild(refCatLight)


        image.onload = () => {
            container.removeChild(loader)
            container.appendChild(image)
            this.url = url
        }
        image.src = url
    }


    // Ferme la lightbox en appuyant sur le bouton Echap
    // @param {KeyboardEvent} e

    onKeyUp (e) {
        if (e.key === 'Escape') {
            this.close(e)
        } else if (e.key === 'ArrowLeft') {
            this.prev(e)
        } else if (e.key === 'ArrowRight') {
            this.next(e)
        }
    }

    // Ferme la lightbox
    // @param {MouseEvent/KeyboardEvent} e
    close (e) {
        e.preventDefault()
        this.element.classList.add('fadeOut')
        window.setTimeout(() => {
            this.element.parentElement.removeChild(this.element)
        }, 500)
        document.removeEventListener('keyup', this.onKeyUp)
    }

    // @param {MouseEvent/KeyboardEvent} e
    next (e) {
        e.preventDefault();
        this.currentIndex = (this.currentIndex + 1) % this.images.length; 
        this.loadImage(this.images[this.currentIndex]);

    } 
    
    // @param {MouseEvent/KeyboardEvent} e
    prev (e) {
        e.preventDefault();
        this.currentIndex = (this.currentIndex + 1) % this.images.length; 
        this.loadImage(this.images[this.currentIndex]);
    } 


    // @param {string} url URL de l'image
    //  @return {HTMLElement}
    buildDom(url) {
        const dom = document.createElement('div')
        dom.classList.add('lightbox')        
        dom.innerHTML = `
            <div class="close-light">
                <p>x</p>
            </div>
            <div class="arrow-lightbox">
                <div class="lightbox_prev"> 
                    <img src="./wp-content/themes/motatheme/assets/images/arrow-left-white.png" alt="">       
                    <p>Précédent</p>
                </div>
                <div class="lightbox_next">
                    <img src="./wp-content/themes/motatheme/assets/images/arrow-right-white.png" alt="">
                    <p>Suivant</p>
                </div>
            </div>
            <div class="lightbox_container">                      
            </div>`;
        dom.querySelector('.close-light').addEventListener('click', this.close.bind(this))
        dom.querySelector('.lightbox_next').addEventListener('click', this.next.bind(this))
        dom.querySelector('.lightbox_prev').addEventListener('click', this.prev.bind(this))

        return dom
    }

}


Lightbox.init();


// Réglages menu hamburger
const hamburgerButton = document.querySelector(".nav-toggler")
const navigation = document.querySelector(".nav-burger")

hamburgerButton.addEventListener("click", toggleNav)

function toggleNav() {
  hamburgerButton.classList.toggle("active")
  navigation.classList.toggle("active")
}


