// import Swiper from 'swiper'; 最小限の機能しか入っていない
import Swiper from 'swiper/bundle'; // 全ての機能が入っている
// import Swiper styles
import 'swiper/css';

// core version + navigation, pagination modules:
// import Swiper, { Navigation, Pagination } from 'swiper';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

 // import styles bundle
 import 'swiper/css/bundle';

 const slideLength = document.querySelectorAll('.swiper-card .swiper-slide').length;

  const initSwiper = () => {
    const mySwiper = new Swiper('.swiper-card .swiper', {
      slidesPerView: 'auto',
      spaceBetween: 16,
      loop: true,
      loopedSlides: slideLength,
      speed: 5000,
      autoplay: {
        delay: 0,
        disableOnInteraction: false,
      },
      freeMode: {
        enabled: true,
        momentum: false,
      },
      grabCursor: true,
      breakpoints: {
        1025: {
          spaceBetween: 32,
        }
      },
      on: {
        touchEnd: (swiper) => {
          swiper.slideTo(swiper.activeIndex + 1);
        }
      }
    });
  };

  window.addEventListener('load', function(){
    initSwiper();
  });