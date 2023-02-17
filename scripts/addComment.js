const commentText = document.querySelector("#comment_text");
const userToResponse = document.querySelectorAll(".comments-item__head>b");
const userEl = document.querySelector("#user_id");
const loggedUser = document.querySelector(".user-data>p");

const users = [];

function fetchUsers() {
  return fetch(`http://localhost/voyages/application/process/processUsers.php`)
    .then((res) => res.json())
    .then((res) => {
      return res;
    });
}

async function getUsers() {
  const fetchedUsers = await fetchUsers();
  fetchedUsers.forEach((element) => {
    users.push(element);
  });
}

getUsers();

document.querySelector("#add_comment").addEventListener("click", (e) => {
  if (commentText.value.length === 0) {
    e.preventDefault();
    alert("Pls fill the field");
  }
  users.forEach((el) => {    
    if (el.login === e.target.getAttribute('data-id')) {
      userEl.setAttribute('value', el.id);      
    }
  });
});

userToResponse.forEach((el) => {
  el.addEventListener("click", () => {
    commentText.value += `@${el.textContent}, `;
  });
});
