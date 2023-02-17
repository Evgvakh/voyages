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
        loginField.value = '';
        loginField.placeholder = 'This user name already exists.';        
    }
    if (emails.includes(emailField.value)) {
        e.preventDefault();
        emailField.value = '';
        emailField.placeholder = 'This email has been already used.';
    }
    if (passField.value !== passConfirmField.value) {
        e.preventDefault();
        passField.value = ''; passConfirmField.value = '';
        passField.placeholder = 'Passwords do NOT match.';
        passConfirmField.placeholder = 'Passwords do NOT match.';
    }
    
    if (loginField.value.length < 1 || emailField.value < 1 || passField.value < 1 || passConfirmField.value < 1) {
        e.preventDefault();
        document.querySelector('.register-container h2').innerHTML = 'Create New User <span>Please fill all the fields</span>';        
    }   
});
    
