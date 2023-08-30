// Get the modal
let modal = document.getElementById("myModal");
let btn = document.getElementById("myBtn");
let span = document.querySelector(".close");
let contactMenu = document.querySelector(".contact-menu");

// Lorsqu'on clique sur le bouton, on ouvre la modale
contactMenu.onclick = function() {
    modal.style.display = "block";
}

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
        const links = Array.from(document.querySelectorAll('a[href$=".png"], a[href$=".jpg"], a[href$=".jpeg"]'))
        const gallery = links.map(link => link.getAttribute('href'))

        links.forEach(link => link.addEventListener('click', e => {
            e.preventDefault()                
            new Lightbox(e.currentTarget.getAttribute('href'), gallery)
        }))
    }

    // @param {string} url URL de l'image
    // @param {string[]} images Chemins des images de la lightbox

    constructor(url, images) {
        this.element = this.buildDom(url)
        this.images = images
        this.loadImage(url)
        document.body.appendChild(this.element)
        this.onKeyUp = this.onKeyUp.bind(this)
        document.addEventListener('keyup', this.onKeyUp)
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
        e.preventDefault()
        let i = this.images.findIndex(image => image === this.url)
        if (i === this.images.length - 1) {
            i = -1
        }
        this.loadImage(this.images[i + 1])

    } 
    
    // @param {MouseEvent/KeyboardEvent} e
    prev (e) {
        e.preventDefault()
        let i = this.images.findIndex(image => image === this.url)
        if (i === 0) {
            i = this.images.length
        }
        this.loadImage(this.images[i - 1])
    } 


    // @param {string} url URL de l'image
    //  @return {HTMLElement}
    buildDom(url) {
        const dom = document.createElement('div')
        dom.classList.add('lightbox')
        dom.innerHTML = `
            <button class="lightbox_close">x</button>
            <button class="lightbox_next">suivant</button>
            <button class="lightbox_prev">précédent</button>
            <div class="lightbox_container">            
            </div>`
        dom.querySelector('.lightbox_close').addEventListener('click', this.close.bind(this))
        dom.querySelector('.lightbox_next').addEventListener('click', this.next.bind(this))
        dom.querySelector('.lightbox_prev').addEventListener('click', this.prev.bind(this))
        return dom
    }

}

Lightbox.init();

