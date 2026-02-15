let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');


menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('active');

}


window.onscroll = () => { 
    menu.classList.remove('bx-x');
        navbar.classList.remove('active');
    
}
// Typing Text Code//


const typed = new Typed('.multiple-text', {
    strings: ['Physical Fitness', 'Weight Gain','Strength Training','Fat Loss','Weight Lifting','Running'],
    typeSpeed: 60,
    backSpeed:60,
    backDelay:1000,
    loop:true,

  });
  var swiper = new Swiper(".swiper", {
    slidesPerView: "auto", // Auto-adjust slide width
    centeredSlides: true,  // Center active slide
    spaceBetween: 20,      // Space between slides
    loop: true,            // Infinite scrolling
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});
