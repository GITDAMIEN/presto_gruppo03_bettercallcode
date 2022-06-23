// const swiper = new Swiper('.swiper', {
//     // Optional parameters
//     slidesPerView: 2,
//     spaceBetween: 15,
//     loop: true,
//     // If we need pagination
//     pagination: {
//         el: '.swiper-pagination',
//         dynamicBullets: true,
//       },
//       // Navigation arrows
//     navigation: {
//         nextEl: '.swiper-button-next',
//         prevEl: '.swiper-button-prev',
//       },
//       breakpoints: {
//         640: {
//           slidesPerView: 2,
//           spaceBetween: 10,
//         },
//         768: {
//           slidesPerView: 4,
//           spaceBetween: 10,
//         },
//         1024: {
//             slidesPerView: 4,
//             spaceBetween: 5,
//           },
//         }
//       });
  
// const navbar = document.querySelector('.presto-nav');


// document.addEventListener('scroll', ()=> {
//     if(window.scrollY > 50){
//         navbar.classList.add('orangeBg')
//     }else{
//       navbar.classList.remove('orangeBg')
//     }
// });


const navbar = document.querySelector('.presto-nav');
window.onscroll = () => {
    if (window.scrollY > 600) {
        navbar.classList.add('nav-active');
    } else {
        navbar.classList.remove('nav-active');
    }
};