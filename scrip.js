const menuIcon = document.querySelector('#menu-icon');
const navbar = document.querySelector('.navbar');

menuIcon.addEventListener('click', () => {
    menuIcon.classList.toggle('bx-x');
    navbar.classList.toggle('active');
});

const sections = document.querySelectorAll('section');
const navlinks = document.querySelectorAll('header nav a');
window.addEventListener('scroll', () => {
    sections.forEach(sec => {
        const top = window.scrollY;
        const offset = sec.offsetTop - 150;
        const height = sec.offsetHeight;
        const id = sec.getAttribute('id');
        if (top >= offset && top < offset + height) {
            navlinks.forEach(link => {
                link.classList.remove('active');
            });
            document.querySelector(`header nav a[href*='${id}']`).classList.add('active');
        }
    });
});

// Le code ci-dessous utilise la bibliothèque ScrollReveal pour animer certains éléments de la page
// Il doit être placé après les événements liés au menu et à la navigation

ScrollReveal({
    distance: '80px',
    duration: 2000,
    delay: 200
});

ScrollReveal().reveal('.home-content, .heading', { origin: 'top' });
ScrollReveal().reveal('.image-container,.image-containerr, .services-container, .centre-box, .contact form', { origin: 'bottom' });
ScrollReveal().reveal('.home-content h1, .about-img,logo', { origin: 'left' });
ScrollReveal().reveal('.home-content p, .about-content', { origin: 'right' });


const typed = new Typed('.multiple-text', {
    strings: ['Un Site de Donation de Sang', 'Le Futur'],
    typeSpeed: 100,
    backSpeed: 100,
    backDelay: 1000,
    loop: true
});
const typedd = new Typed('.multiple-textt', {
    strings: ['De La Banque de Sang'],
    typeSpeed: 100,
    backSpeed: 100,
    backDelay: 1000,
    loop: true
});
const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnlogin-popup');

const iconClose = document.querySelector('.icon-close');


registerLink.addEventListener('click', () => {
    wrapper.classList.add('active');

});
loginLink.addEventListener('click', () => {
    wrapper.classList.remove('active');

});


btnPopup.addEventListener('click', () => {
    wrapper.classList.add('active-popup');

});

iconClose.addEventListener('click', () => {
    wrapper.classList.remove('active-popup');

});