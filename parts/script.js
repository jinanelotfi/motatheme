let currentPage = 1;
let category = 'all';
let format = 'all';
let date = 'desc';

document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('ajax_call').addEventListener('click', function() {
    currentPage++;
    let formData = new FormData();
    formData.append('paged', currentPage);    
    
  if (category !== 'all' || format !== 'all') {
    formData.append('action', 'request_gallery_by_category');
    formData.append('category', category);
    formData.append('format', format);  
    formData.append('date', date); 
  } else {
    formData.append('action', 'request_gallery');
  }


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
   
function resetPage() {
  currentPage = 1;
  document.getElementById('ajax_return').innerHTML = ''; 
};




function ajaxFun () {
    currentPage = 1;

    let formData = new FormData();
    formData.append('action', 'request_gallery_by_category');
    formData.append('category', category);
    formData.append('format', format);
    formData.append('date', date);
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
    

      Lightbox.init();

      // Les modif commencent ici   
      
      const optionsCateActive = document.querySelector(".options-cate");
      const optionsFormActive = document.querySelector(".options-form");
      const optionsDateActive = document.querySelector(".options-date");
      
      // On ajoute la margin-top à .options-cate
      if (optionsCateActive && category !== 'all') {
          optionsCateActive.style.marginTop = "64px";
      };

      //  // On ajoute la margin-top à .options-form       
       if (optionsFormActive && format !== 'all') {
           optionsFormActive.style.marginTop = "64px";
       };

      //  // On ajoute la margin-top à .options-date       
       if (optionsDateActive && date !== 'desc') {
           optionsDateActive.style.marginTop = "64px";
       };

    }).catch(function(error) {
        console.error('There was a problem with the fetch operation: ', error);
    });

  };




  // Select des catégories
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('category-filter').addEventListener('change', function() {
      category = this.value;
      resetPage();
      ajaxFun(); 

  });
});

// Select des formats
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('format-filter').addEventListener('change', function() {
      format = this.value;
      resetPage();
      ajaxFun();
  });
});

// // Select des dates
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('date-sort').addEventListener('change', function() {
      date = this.value;
      resetPage();
      ajaxFun();
  });
});

// Gestion du menu déroulant des Filtres
// Catégorie
const optionMenu = document.querySelector(".dropdown.categoryy");
const selectInput = document.getElementById("category-filter");
const optionsCate = document.querySelector(".options-cate");
const chevronCate = document.getElementById("chevron-cate");

// Format
const optionMenuForm = document.querySelector(".dropdown.formatt");
const selectInputForm = document.getElementById("format-filter");
const optionsForm = document.querySelector(".options-form");
const chevronForm = document.getElementById("chevron-form");

// Date
const optionMenuDate = document.querySelector(".dropdown.datee");
const selectInputDate = document.getElementById("date-sort");
const optionsDate = document.querySelector(".options-date");
const chevronDate = document.getElementById("chevron-date");


// Catégorie
selectInput.addEventListener("click", toggleCategoryDropdown);
chevronCate.addEventListener("click", toggleCategoryDropdown);

function toggleCategoryDropdown() {
  optionMenu.classList.toggle("active");
  chevronCate.classList.toggle("active-chevron"); 
  optionsCate.classList.toggle("active");
  
}

// Format
selectInputForm.addEventListener("click", toggleFormDropdown);
chevronForm.addEventListener("click", toggleFormDropdown);

function toggleFormDropdown() {
  chevronForm.classList.toggle("active-chevron"); 
  optionMenuForm.classList.toggle("active");
  optionsForm.classList.toggle("active");
}

// Date
selectInputDate.addEventListener("click", toggleDateDropdown);
chevronDate.addEventListener("click", toggleDateDropdown);

function toggleDateDropdown() {
  chevronDate.classList.toggle("active-chevron"); 
  optionMenuDate.classList.toggle("active");
  optionsDate.classList.toggle("active");
}

// Catégorie
optionsCate.querySelectorAll(".option-cate").forEach((option) => {
    option.addEventListener("click", () => {
        let selectedOption = option.innerText;
        selectInput.value = selectedOption; 
        category = selectedOption;  // Mise à jour de la variable category
        ajaxFun();
        optionMenu.classList.remove("active");
        optionsCate.classList.remove("active");
        chevronCate.classList.remove("active-chevron"); 
    });
});

// Format
optionsForm.querySelectorAll(".option-form").forEach((option) => {
  option.addEventListener("click", () => {
      let selectedOptionForm = option.innerText;
      selectInputForm.value = selectedOptionForm; 
      format = selectedOptionForm;  // Mise à jour de la variable format
      ajaxFun();
      optionMenuForm.classList.remove("active");
      optionsForm.classList.remove("active");
      chevronForm.classList.remove("active-chevron"); 
  });
});
// Date
optionsDate.querySelectorAll(".option-date").forEach((option) => {
  option.addEventListener("click", () => {
      let selectedOptionDate = option.getAttribute("data-value");
      selectInputDate.value = option.innerText; 
      date = selectedOptionDate;  // Mise à jour de la variable date
      ajaxFun();
      optionMenuDate.classList.remove("active");
      optionsDate.classList.remove("active");
      chevronDate.classList.remove("active-chevron"); 
  });
});
