const loginFieldLog = document.querySelector('#loginlog');
const passFieldLog = document.querySelector('#passwordlog');
const loginBtn = document.querySelector('#createlog');

const loginsToCheck = [];
const credentialsToCheck = [];

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

async function getCredentials() {
    const result = await fetchUsers();
    result.forEach(element => {
        credentialsToCheck.push(Object(credentialsToCheck[element.login] = element.password));
    });    
}

getUsers();
getCredentials();

loginBtn.addEventListener('click', (e) => {
    if (!loginsToCheck.includes(loginFieldLog.value)) {
        e.preventDefault();
        loginFieldLog.value = '';
        passFieldLog.value = '';
        loginFieldLog.placeholder = 'No such user';
    } else {        
        if (credentialsToCheck[loginFieldLog.value] != passFieldLog.value) {
            e.preventDefault();
            passFieldLog.value = '';
            passFieldLog.placeholder = 'Wrong password';
        }
        
    }


    
});


