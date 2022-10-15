 // import Swiper JS
 import Swiper from 'swiper';
 // import Swiper styles
 import 'swiper/swiper-bundle.css';

// core version + navigation, pagination modules:
import SwiperCore, { Navigation, Pagination } from 'swiper/core';

// configure Swiper to use modules
SwiperCore.use([Navigation, Pagination]);

// init Swiper:
const swiper = new Swiper('.myswiper', {
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      loop: true,
      autoplay: {
          delay: 2000,
          disableOnInteraction: false,
        },
});