<script setup>
import { ref } from 'vue';

const swiperOptions = ref({
    loop: true,
    speed: 600,
    autoplay: {
      delay: 5000
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 2,
        spaceBetween: 40
      },
      480: {
        slidesPerView: 3,
        spaceBetween: 60
      },
      640: {
        slidesPerView: 4,
        spaceBetween: 80
      },
      992: {
        slidesPerView: 6,
        spaceBetween: 120
      }
    }
});
</script>

<template>
    <section id="clients" class="clients section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper init-swiper">
                <div class="swiper-config" style="display: none;">
                    {{ JSON.stringify(swiperOptions) }}
                </div>
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="img/clients/renault.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="img/clients/hermes.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="img/clients/lidle.jpg" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="img/clients/amazon.jpg" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="img/clients/hello-fresh.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="img/clients/aldi.jpg" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="img/clients/disneyland-paris.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="img/clients/viessmann.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="img/clients/danone.jpg" class="img-fluid" alt=""></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
</template>

<style scoped>
/* Your styles here */
</style>
