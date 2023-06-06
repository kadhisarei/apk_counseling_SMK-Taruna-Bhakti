const navScroll = document.querySelector('.navbar');

window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        navScroll.classList.add('navbar-scrolled');
    }else if (window.scrollY <= 50) {
        navScroll.classList.remove('navbar-scrolled');
    }
})