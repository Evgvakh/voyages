const loginFieldLog = document.querySelector('#loginlog');
const passFieldLog = document.querySelector('#passwordlog');
const loginBtn = document.querySelector('#createlog');

const loginsToCheck = [];
const passwordsToCheck = [];

function fetchUsers() {
    return fetch("http://localhost/voyages/application/process/processUsers.php")
        .then (res => res.json())
        .then (res => {return res;});
}

async function getUsers() {
    const result = await fetchUsers();
    result.forEach(element => {
        loginsToCheck.push(element.login);
    });
}

async function getEmails() {
    const result = await fetchUsers();
    result.forEach(element => {
        passwordsToCheck.push(element.password);
    });
}

getUsers();
getEmails();

loginBtn.addEventListener('click', (e) => {
    if (!loginsToCheck.includes(loginFieldLog.value) || !passwordsToCheck.includes(passFieldLog.value)) {
        e.preventDefault();
        alert('WRONG CREDENTIALS');
    }
});


