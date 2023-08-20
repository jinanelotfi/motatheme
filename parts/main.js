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


// miniatures photos suivante et précédente qui apparaissent au survol
jQuery(document).ready(function($) {
    $('.prev-link').hover(function() {
        var prevThumbnail = $(this).find('.nav-thumbnail').html();
        $('.prev-thumbnail').html(prevThumbnail).show();
    }, function() {
        $('.prev-thumbnail').hide();
    });

    $('.next-link').hover(function() {
        var nextThumbnail = $(this).find('.nav-thumbnail').html();
        $('.next-thumbnail').html(nextThumbnail).show();
    }, function() {
        $('.next-thumbnail').hide();
    });
});
