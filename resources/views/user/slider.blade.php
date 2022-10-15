<x-front.app>



<!-- Slider main container -->
<div class="swiper-container myswiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
      <div class="swiper-slide"><img src="{{ asset('storage/teams/logo/big.png') }}" width="30%"></div>
      <div class="swiper-slide"><img src="{{ asset('storage/teams/logo/AAM.jpg') }}" width="30%"></div>
      <div class="swiper-slide"><img src="{{ asset('storage/teams/logo/FMZ.png') }}" width="30%"></div>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>
  
    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  
    <!-- If we need scrollbar -->
    <div class="swiper-scrollbar"></div>
  </div>



    <script src="{{ mix('js/swiper.js') }}"></script>
</x-front.app>