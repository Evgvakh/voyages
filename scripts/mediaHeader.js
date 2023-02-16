const hiddenListPage = document.querySelector('.page-select__list');
const hiddenListCat = document.querySelector('.cat-select__list');

document.querySelector('.page-select').addEventListener('click', () => {
    display(hiddenListPage, hiddenListCat);
});

document.querySelector('.cat-select').addEventListener('click', () => {
    display(hiddenListCat, hiddenListPage);
});


function display(elem1, elem2) {
    if(elem1.style.display === '' || elem1.style.display === 'none') {
        elem1.closest('li').style.color = 'rgb(150, 109, 78)';
        elem1.style.display = 'flex';
        elem2.closest('li').style.color = 'initial';
        elem2.style.display = 'none';                
    } else {
        elem1.style.display = 'none';        
    }
}