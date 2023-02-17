
const hiddenListCat = document.querySelector('.cat-select__list');

document.querySelector('.cat-select').addEventListener('click', () => {
    display(hiddenListCat);
});

function display(elem) {
    if(elem.style.display === '' || elem.style.display === 'none') {
        elem.closest('li').style.color = 'rgb(150, 109, 78)';
        elem.style.display = 'flex';                        
    } else {
        elem.style.display = 'none';        
    }
}