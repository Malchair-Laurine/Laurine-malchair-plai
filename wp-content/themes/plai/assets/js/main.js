const burger = document.querySelector('.navigation__burger');
const navList = document.querySelector('.navigation__list');

if (burger && navList) {
    burger.addEventListener('click', () => {
        const isOpen = burger.getAttribute('aria-expanded') === 'true';
        burger.setAttribute('aria-expanded', String(!isOpen));
        navList.classList.toggle('navigation__list--open');
    });

    navList.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            burger.setAttribute('aria-expanded', 'false');
            navList.classList.remove('navigation__list--open');
        });
    });

    document.addEventListener('click', (e) => {
        if (!e.target.closest('.navigation')) {
            burger.setAttribute('aria-expanded', 'false');
            navList.classList.remove('navigation__list--open');
        }
    });
}