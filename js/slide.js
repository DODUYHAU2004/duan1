var container = document.querySelector('.container_slide');
var slide = document.querySelector('.slides');
var next = document.querySelector('.next');
var prev = document.querySelector('.prev');
var slides = document.querySelectorAll('.item');
var slide_Width = slides[0].clientWidth;
var index = 1;

const interval = 5000;
var slide_in;
slide.style.transform = `translateX(-${index*slide_Width}px)`;

const start = ()=>{
   slide_in = setInterval(() => {
        moveNextBtn();
    }, interval);
}
const moveNextBtn = ()=>{
    if (index >= slides.length - 1 ) return;
    index++;
    slide.style.transform = `translateX(-${index*slide_Width}px)`;
    slide.style.transition =`0.5s`;
}
const movePrevBtn = ()=>{
    if (index <= 0 ) return;
    index--;
    slide.style.transform = `translateX(-${index*slide_Width}px)`;
    slide.style.transition =`0.5s`;
}
// next
next.addEventListener("click",moveNextBtn);
// prev
prev.addEventListener("click",movePrevBtn);
slide.addEventListener("transitionend",()=>{
    slides = document.querySelectorAll('.item');
    index = slides.indexOf(slide.firstChild);
});
container.addEventListener("mousemove",()=>{
    clearInterval(slide_in);
});
container.addEventListener("mouseleave",start);
start();
