const comments = [];

function fetchComments() {
  return fetch(`http://localhost/voyages/application/process/processComments.php`)
          .then (res => res.json())
          .then (res => {return res;});
}

async function getComments() {
  const fetchedComments = await fetchComments();
  
  fetchedComments.forEach(element => {
    comments.push(element);
  });  
}

getComments();

document.querySelectorAll('#edit_comment').forEach(el => {
    el.addEventListener('click', (e) => {
        e.preventDefault();

        let commentId = Number(e.target.getAttribute('data-id'));        
        let comment = comments.find(({id}) => {return id == commentId;});        

        document.querySelector('.popups-container').style.display = 'block';
        document.querySelector('.edit-comment').style.display = 'block';
        document.querySelector('.edit-comment textarea').value = comment.contenu;
        document.querySelector('.edit-comment input').setAttribute('value', comment.id_article);
        
        document.querySelector('.edit-comment__form').setAttribute('action', `http://localhost/voyages/articles/editComment/${commentId}/#comments`);

    });
})


