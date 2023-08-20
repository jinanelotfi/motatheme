// Get the modal
let modal = document.getElementById("myModal");
let btn = document.getElementById("myBtn");
let span = document.querySelector(".close");
let contactMenu = document.querySelector(".contact-menu");

// Lorsqu'on clique sur le bouton, on ouvre la modale
contactMenu.onclick = function() {
    modal.style.display = "block";
}

btn.onclick = function() {
    modal.style.display = "block";
    // referenceField.value = referenceValue;
}

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