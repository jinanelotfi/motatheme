let currentPage = 1;
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('ajax_call').addEventListener('click', function() {
      currentPage++;
      let formData = new FormData();
      formData.append('action', 'request_gallery');
      formData.append('paged', currentPage);
   
   
      fetch(load_js.ajax_url, {
        method: 'POST',
        body: formData,
      }).then(function(response) {
        if (!response.ok) {
          throw new Error('Network response error.');
        }
   
   
        return response.text();
      }).then(function(html) {
        if (html.trim() !== '') {
          document.getElementById('ajax_return').insertAdjacentHTML('beforeend', html);
        };
      }).catch(function(error) {
        console.error('There was a problem with the fetch operation: ', error);
      });
    });
   });
