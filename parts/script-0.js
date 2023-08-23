// (function ($) {
//     $(document).ready(function () {
  
//       // Chargment des commentaires en Ajax
//       $('.load-more-button').click(function (e) {

//         // Empêcher l'envoi classique du formulaire
//         e.preventDefault();

//         // L'URL qui réceptionne les requêtes Ajax dans l'attribut "action" de <form>
//         const ajaxurl = $(this).data('ajaxurl');

//         // Les données de notre formulaire
//         // ⚠️ Ne changez pas le nom "action" !
//         const data = {
//             action: $(this).data('action'), 
//             nonce:  $(this).data('nonce'),
//             postid: $(this).data('postid'),
//         }

//         // Pour vérifier qu'on a bien récupéré les données
//         console.log(ajaxurl);
//         console.log(data);

//         // Requête Ajax en JS natif via Fetch
//         fetch(ajaxurl, {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/x-www-form-urlencoded',
//                 'Cache-Control': 'no-cache',
//             },
//             body: new URLSearchParams(data),
//         })
//         .then(response => response.json())
//         .then(response => {
//             console.log(response);

//             // En cas d'erreur
//             if (!response.success) {
//                 alert(response.data);
//                 return;
//             }

//             // Et en cas de réussite
//             $(this).hide(); // Cacher le formulaire
//             $('.comments').html(response.data); // Et afficher le HTML
//         });
//     });
  
//     });
//   })(jQuery);

(function($) {
    $(document).ready(function() {
        // Chargement de plus de contenu en Ajax
        $('.load-more-button').click(function(e) {
            e.preventDefault();

            const button = $(this),
                data = {
                    'action': 'capitaine_load_comments',
                    'query': load_more_params.posts,
                    'page': load_more_params.current_page
                };

                console.log(button);
                
            $.ajax({
                url: load_more_params.ajaxurl,
                data: data,
                type: 'POST',
                success: function(response) {
                    if (response.success) {
                        button.before(response.data.gallery_html);
                        load_more_params.current_page++;
                        if (load_more_params.current_page > load_more_params.max_page) {
                            button.remove();
                        }
                    } else {
                        button.remove();
                    }
                }
            });
        });
    });
})(jQuery);
