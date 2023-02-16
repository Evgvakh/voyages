const container = document.querySelector('.index__main-container');

const height = container.clientHeight;

const images = document.querySelectorAll('.gallery-item');

const imgFall = [
    { transform: 'scale(15)', opacity: '0' },
    { transform: 'scale(14)', opacity: '0.1' },
    { transform: 'scale(13)', opacity: '0.15' },
    { transform: 'scale(12)', opacity: '0.2' },
    { transform: 'scale(11)', opacity: '0.25' },
    { transform: 'scale(10)', opacity: '0.3' },
    { transform: 'scale(9)', opacity: '0.35' },
    { transform: 'scale(8)', opacity: '0.36' },
    { transform: 'scale(7)', opacity: '0.37' },
    { transform: 'scale(6)', opacity: '0.39' },
    { transform: 'scale(3)', opacity: '0.42' },
    { transform: 'scale(1)', opacity: '0.77' }
];


document.querySelector('.fa-chevron-down').addEventListener('click', (e) => {
    document.querySelector('.index__slide-block').style.transform = `translateY(-${height}px)`;
    e.target.style.display = 'none';

    const imgAnimation = images.forEach((el, i) => {
        images[i].animate(
            imgFall,
            {duration: 1400, easing: "cubic-bezier(.12,.46,1,.5)", delay: i * 100 * Math.random()}
        );
    });
});



