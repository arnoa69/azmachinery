<script setup>
import { useI18n } from "vue-i18n";
const { locale } = useI18n();

let videoLanguage = null;

switch (locale.value) {
    case 'en':
    videoLanguage = '/img/about.jpg';
        break;
}

locale.value == 'fr' ? 'fr' : 'en'
</script>

<template>
    <section id="about" class="about section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h1>{{ $t('about.h1') }}</h1>
</div><!-- End Section Title -->

<div class="container">

  <div class="row gy-4">
    <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
      <img src="/img/about.jpg" class="img-fluid" alt="">
      <a href="https://www.youtube.com/watch?v=5jE0-Ulp0VM" class="glightbox pulsating-play-btn"></a>
      <span class="video-source">{{ $t('about.videoSource') }}</span>
    </div>
    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
      <h3>{{ $t('about.h3') }}</h3>
      <p class="fst-italic">
        {{ $t('about.p.1') }}
      </p>
      <ul>
        <li><i class="bi bi-check2-all"></i> <span>{{ $t('about.li.1') }}</span></li>
        <li><i class="bi bi-check2-all"></i> <span>{{ $t('about.li.2') }}</span></li>
        <li><i class="bi bi-check2-all"></i> <span>{{ $t('about.li.3') }}</span></li>
      </ul>
      <p>{{ $t('about.p.2') }}</p>
    </div>
  </div>

</div>

</section><!-- /About Section -->
</template>

<style scoped>
.video-source {
    font-size: 12px;
}
.col-lg-6 img {
  border-radius: 10px;
}
h1 {
    font-weight: 700;
    font-size: 34px;
}
/* Pulsating Play Button
------------------------------*/
.pulsating-play-btn {
  width: 94px;
  height: 94px;
  background: radial-gradient(var(--accent-color) 50%, color-mix(in srgb, var(--accent-color), transparent 75%) 52%);
  border-radius: 50%;
  display: block;
  position: relative;
  overflow: hidden;
}

.pulsating-play-btn:before {
  content: "";
  position: absolute;
  width: 120px;
  height: 120px;
  animation-delay: 0s;
  animation: pulsate-play-btn 2s;
  animation-direction: forwards;
  animation-iteration-count: infinite;
  animation-timing-function: steps;
  opacity: 1;
  border-radius: 50%;
  border: 5px solid color-mix(in srgb, var(--accent-color), transparent 30%);
  top: -15%;
  left: -15%;
  background: rgba(198, 16, 0, 0);
}

.pulsating-play-btn:after {
  content: "";
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translateX(-40%) translateY(-50%);
  width: 0;
  height: 0;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  border-left: 15px solid #fff;
  z-index: 100;
  transition: all 400ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
}

.pulsating-play-btn:hover:before {
  content: "";
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translateX(-40%) translateY(-50%);
  width: 0;
  height: 0;
  border: none;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  border-left: 15px solid #fff;
  z-index: 200;
  animation: none;
  border-radius: 0;
}

.pulsating-play-btn:hover:after {
  border-left: 15px solid var(--accent-color);
  transform: scale(20);
}

@keyframes pulsate-play-btn {
  0% {
    transform: scale(0.6, 0.6);
    opacity: 1;
  }

  100% {
    transform: scale(1, 1);
    opacity: 0;
  }
}
.about .pulsating-play-btn {
  position: absolute;
  left: calc(50% - 47px);
  top: calc(50% - 47px);
}
</style>
