// ESTE JAVA SCRIPT ES PARA EL MENU RESPONSIVE
document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.header');
    const navToggle = document.querySelector('.nav-toggle');
    const nav = document.querySelector('.nav');

    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

    if (navToggle && nav) {
        navToggle.addEventListener('click', () => {
            nav.classList.toggle('open');
            navToggle.classList.toggle('open');
        });
    }

    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (nav && nav.classList.contains('open')) {
                nav.classList.remove('open');
                if (navToggle) navToggle.classList.remove('open');
            }
        });
    });

    const navDropdowns = document.querySelectorAll('.nav-item.nav-dropdown');
    navDropdowns.forEach(item => {
        const trigger = item.querySelector('.nav-link');
        if (!trigger) return;

        trigger.addEventListener('click', (e) => {
            const isMobile = window.matchMedia('(max-width: 768px)').matches || (nav && nav.classList.contains('open'));
            if (isMobile) {
                e.preventDefault();
                item.classList.toggle('open');
            }
        });
    });
});