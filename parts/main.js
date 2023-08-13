// Get the modal
let modal = document.getElementById('myModal');
let btn = document.getElementById("myBtn");
let span = document.querySelector(".close");

// Lorsqu'on clique sur le bouton, on ouvre la modale
btn.onclick = function() {
    modal.style.display = "block";
}

// Lorsqu'on clique sur la croix, on ferme la modale
span.onclick = function() {
    modal.style.display = "none";
}

// Lorsqu'on clique n'importe où sur le background, la modale se ferme
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}