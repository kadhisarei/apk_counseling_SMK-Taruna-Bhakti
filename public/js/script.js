const navScroll = document.querySelector('.navbar');


window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        navScroll.classList.add('navbar-scrolled');
    }else if (window.scrollY <= 50) {
        navScroll.classList.remove('navbar-scrolled');
    }
})

function notifOpen() {
    document.getElementById("notif").style.display = "flex";
    document.getElementById("notif").style.flexDirection = "column";
    document.getElementById("notif").style.alignItems = "center";
    document.getElementById("notif").style.justifyContent = "center";
  }
  function notifClose() {
    document.getElementById("notif").style.display = "none";
  }
