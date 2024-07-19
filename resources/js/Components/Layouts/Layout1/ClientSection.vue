<script setup>
import { ref, onMounted } from 'vue';
import Swiper from 'swiper/bundle';
import 'swiper/swiper-bundle.css';

const swiperRef = ref(null);

onMounted(() => {
  swiperRef.value = new Swiper('.init-swiper', {
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
});
</script>

<template>
    <section id="clients" class="clients section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper init-swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="img/clients/client-1.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="img/clients/client-2.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="img/clients/client-3.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="img/clients/client-4.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="img/clients/client-5.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="img/clients/client-6.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="img/clients/client-7.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="img/clients/client-8.png" class="img-fluid" alt=""></div>
                </div>
                <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                    <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button"
                        aria-label="Go to slide 1" aria-current="true"></span><span class="swiper-pagination-bullet"
                        tabindex="0" role="button" aria-label="Go to slide 2"></span><span
                        class="swiper-pagination-bullet" tabindex="0" role="button"
                        aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet" tabindex="0"
                        role="button" aria-label="Go to slide 4"></span><span class="swiper-pagination-bullet"
                        tabindex="0" role="button" aria-label="Go to slide 5"></span><span
                        class="swiper-pagination-bullet" tabindex="0" role="button"
                        aria-label="Go to slide 6"></span><span class="swiper-pagination-bullet" tabindex="0"
                        role="button" aria-label="Go to slide 7"></span><span class="swiper-pagination-bullet"
                        tabindex="0" role="button" aria-label="Go to slide 8">
                    </span>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
/* Your styles here */
</style>
