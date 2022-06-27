
// CAROSELLI NELLA PAGINA DEL REVISORE (ANNUNCI DA REVISIONARE)
let belleFoto = document.querySelectorAll('.bellaFoto');
let carouselControlPrev = document.querySelector('.carousel-control-prev');
let carouselControlNext = document.querySelector('.carousel-control-next');
// let begliAnnunci = document.querySelectorAll('.bellAnnuncio');
// let carouselControlPrevMain = document.querySelector('.carousel-control-prev-main');
// let carouselControlNextMain = document.querySelector('.carousel-control-next-main');

carouselControlPrev.addEventListener('click', ()=>{
    belleFoto.forEach((foto,i) => {
        foto.classList.remove('active');
    });
    belleFoto[i-1].classList.add('active');
})

carouselControlNext.addEventListener('click', ()=>{
    belleFoto.forEach((foto,i) => {
        foto.classList.remove('active');
    });
    belleFoto[i+1].classList.add('active');
})

// carouselControlPrevMain.addEventListener('click', ()=>{
//     begliAnnunci.forEach((foto,i) => {
//         foto.classList.remove('active');
//     });
//     begliAnnunci[i-1].classList.add('active');
// })

// carouselControlNextMain.addEventListener('click', ()=>{
//     begliAnnunci.forEach((foto,i) => {
//         foto.classList.remove('active');
//     });
//     begliAnnunci[i+1].classList.add('active');
// })

