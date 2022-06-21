const swiper = new Swiper('.swiper', {
    // Optional parameters
    slidesPerView: 2,
    spaceBetween: 15,
    loop: true,
    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
      },
      // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 10,
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 5,
          },
        }
      });
  