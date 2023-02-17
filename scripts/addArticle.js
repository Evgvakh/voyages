const cats = [];

function fetchCats() {
  return fetch(`http://localhost/voyages/application/process/processCategories.php`)
          .then (res => res.json())
          .then (res => {return res;});
}

async function getCats() {
  const fetchedCats = await fetchCats();   
  fetchedCats.forEach(element => {
    cats.push(element);
  });  
}

getCats();

document.querySelector('.fa-blog').addEventListener('click', (e) => {
    document.querySelector('#edit_title').value = '';         
    document.querySelector('#edit_content').value = '';
    document.querySelector('.popups-container').style.display = 'block';
    document.querySelector('.popups-menu__edit').style.display = 'block';
    document.querySelector('.add-article').style.display = 'none';
    document.querySelector('.add-article__arrow').style.display = 'none';
    document.querySelector('.popups-menu__edit h2').textContent = 'Add new article';
    document.querySelector('.popups-menu__edit button').textContent = 'Create article';

    cats.forEach(el => {        
        document.querySelector('#edit_category').innerHTML += `<option value="${el.id}" style="color: black;">${el.nom}</option>`;
    });

    document.querySelector('.edit__form').setAttribute('action', `http://localhost/voyages/articles/add`); 
});