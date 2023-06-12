console.log('jees');

const carousell = document.querySelector('.carousell');
const firstCard = carousell.querySelector('.card-guru').offsetWidth;
let whenDragging = false, startX, startScrollLeft, timeOut;

const dragStart= (e) => {
    whenDragging = true;
    carousell.classList.add("dragging");
    startX = e.pageX;
    startScrollLeft = carousell.scrollLeft;
};

const dragging = (e) => {
    if(!whenDragging) return;

    carousell.scrollLeft = startScrollLeft - (e.pageX -startX);
};

const dragStop = () => {
    whenDragging = false;
    carousell.classList.remove('dragging');
    console.log('stop');
};

// const autoPlay = () => {
//     if(window.innerWidth < 600) return;
//     timeOut = setTimeout(() => carousell.scrollLeft += firstCard, 4000);
// }
// autoPlay();

carousell.addEventListener("mousedown", dragStart);
carousell.addEventListener("mousemove", dragging);
carousell.addEventListener("mouseup", dragStop);