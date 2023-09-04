let currentPage = 1;
let category = 'all';
let format = 'all';
let date = 'desc';

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
        } else {
            document.getElementById('ajax_call').style.display = 'none';
          }
      }).catch(function(error) {
        console.error('There was a problem with the fetch operation: ', error);
      });
    });
   });


// Select des catégories

function ajaxFun () {
    let formData = new FormData();
    formData.append('action', 'request_gallery_by_category');
    formData.append('category', category);
    formData.append('format', format);
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
        document.getElementById('ajax_return').innerHTML = html;
    }).catch(function(error) {
        console.error('There was a problem with the fetch operation: ', error);
    });

}

document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('category-filter').addEventListener('change', function() {
      category = this.value;
      ajaxFun()

  });
});


// Select des formats
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('format-filter').addEventListener('change', function() {
      format = this.value;
      ajaxFun()
  });
});

// Select des dates
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('date-sort').addEventListener('change', function() {
      date = this.value;
      ajaxFun()
  });
});

