// async function fetchUsers() {
//     await fetch("http://localhost/voyages/application/process/processUsers.php")
//         .then (res => res.json())
//         .then (res => {console.log(res); return res;});
// }



// fetchUsers();


const passBlockToShow = document.querySelectorAll('.password-block');

passBlockToShow.forEach(el => {    
    el.addEventListener('click', (e) => {
        if (e.currentTarget.children[1].value.length > 0) {
            if (e.target.className === 'fa-solid fa-eye') {            
                if (e.currentTarget.children[1].getAttribute('type') === 'password') {
                    e.currentTarget.children[1].setAttribute('type', 'text');
                } else if (e.currentTarget.children[1].getAttribute('type') === 'text') {
                    e.currentTarget.children[1].setAttribute('type', 'password');
                }
            } 
        }       
    });
});

const parToReduce = document.querySelectorAll('#contentPar');

function reduceArtPar (elem) {    
    let text = elem.textContent.replace(/\s+/g,' ');
    text = text.split("");
    
    if (text.length < 220) {
        elem.textContent = text.join("");
    } else {
        text = text.slice(0, 201);        
        let lastSpace = text.lastIndexOf(" ");
        text = text.slice(0, lastSpace);
        text = text.join("");
        text += '...';
        elem.textContent = text;
    }
}

parToReduce.forEach(el => reduceArtPar(el));


