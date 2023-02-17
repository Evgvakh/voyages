$('input[type=file]').on('change', function() {
	let file = this.files[0];
	$(this).closest('label').find('p').html(file.name + '<i class="fa-solid fa-xmark ml-2"></i>');
  $('.fa-xmark').on('click', function() {
    $('.fa-xmark').closest('p').html(' ');
  });
});

document.querySelector('.cross-close').addEventListener('click', () => {
  document.querySelector('.popups-container').style.display = 'none';
  document.querySelector('.popups-menu__edit').style.display = 'none';
  document.querySelector('.popups-menu__delete').style.display = 'none';  
  document.querySelector('.delete-comment').style.display = 'none';
  document.querySelector('.edit-comment').style.display = 'none';
  document.querySelector('.add-article').style.display = 'initial';
  document.querySelector('.add-article__arrow').style.display = 'block';
});

const articles = [];
const categories = [];

function fetchItems(link) {
  return fetch(`http://localhost/voyages/application/process/process${link}.php`)
          .then (res => res.json())
          .then (res => {return res;});
}

async function getItems(itemURL) {
  const fetchedArticles = await fetchItems(itemURL);
  let array = itemURL.toLowerCase();  
  fetchedArticles.forEach(element => {
    array === 'articles' ? articles.push(element) : categories.push(element);
  });  
}

getItems('Articles');
getItems('Categories');

document.querySelectorAll('#edit_article').forEach(el => {
  el.addEventListener('click', (e) => {
    e.preventDefault();
    
    let idArticle = e.target.getAttribute('data-id');    
    let article = articles.find(({id}) => {return id == idArticle;});

    categories.forEach(el => {
      let isSelected = article.id_category === el.id;
      document.querySelector('#edit_category').innerHTML += `<option ${isSelected ? 'selected' : ''} value="${el.id}" style="color: black;">${el.nom}</option>`;
    });
    
    document.querySelector('.popups-menu__edit h2').textContent = 'Edit article';
    document.querySelector('.popups-container').style.display = 'block';
    document.querySelector('.popups-menu__edit').style.display = 'block';      
    document.querySelector('#edit_title').value = article.titre;         
    document.querySelector('#edit_content').value = article.contenu;
    document.querySelector('.popups-menu__edit button').textContent = 'save changes';
    document.querySelector('.edit__form').setAttribute('action', `http://localhost/voyages/articles/edit/${idArticle}`);
  });  
});


