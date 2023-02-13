const loginField = document.querySelector('#loginreg');
const emailField = document.querySelector('#emailreg');
const passField = document.querySelector('#passwordreg');
const passConfirmField = document.querySelector('#password_confirmreg');
const registerBtn = document.querySelector('#createreg');

const logins = [];
const emails = [];

function fetchUsers() {
    return fetch("http://localhost/voyages/application/process/processUsers.php")
        .then (res => res.json())
        .then (res => {return res;});
}

async function getUsers() {
    const result = await fetchUsers();
    result.forEach(element => {
        logins.push(element.login);
    });
}

async function getEmails() {
    const result = await fetchUsers();
    result.forEach(element => {
        emails.push(element.email);
    });
}

getUsers();
getEmails();

registerBtn.addEventListener('click', async (e) => {
    
    if (logins.includes(loginField.value)) {
        e.preventDefault();
        alert('sadasdasd');
    }
    if (emails.includes(emailField.value)) {
        e.preventDefault();
        alert('sssss');
    }
    if (passField.value !== passConfirmField.value) {
        e.preventDefault();
        alert('pass no match');
    }    
});
    
