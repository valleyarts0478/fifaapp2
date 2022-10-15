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

      const swiper = new Swiper('.swiper', {
        autoplay: {
            delay: 0,
          },
          mousewheel: true,
          loop: true,
          speed: 3000,
          slidesPerView: 3,
          centeredSlides: true,
          preventInteractionOnTransition: true,
          pagination: {
            el: '.swiper-pagination',
            type: 'progressbar',
          }
          
      });