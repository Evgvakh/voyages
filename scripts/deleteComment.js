document.querySelectorAll("#delete_comment").forEach((el) => {
  el.addEventListener("click", (e) => {
    e.preventDefault();

    let commentId = e.target.getAttribute("data-id");
    let articleId = e.target.getAttribute("data-art");
    document.querySelector(".delete-comment__form").setAttribute(
        "action",
        `http://localhost/voyages/articles/deleteComment/${commentId}/#comments`
      );
    document.querySelector(".popups-container").style.display = "block";
    document.querySelector(".delete-comment").style.display = "block";
    document.querySelector('.delete-comment input').setAttribute('value', articleId);
  });
});
