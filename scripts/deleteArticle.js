

document.querySelectorAll('#delete_article').forEach(el => {

    el.addEventListener('click', (e) => {
        e.preventDefault();
        let idArticle = e.target.getAttribute('data-id');
        
        document.querySelector('.delete__form').setAttribute('action', `http://localhost/voyages/articles/delete/${idArticle}`);
        document.querySelector('.popups-container').style.display = 'block';
        document.querySelector('.popups-menu__delete').style.display = 'block';
    }
    );
});