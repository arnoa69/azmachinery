<script setup>
import { useI18n } from "vue-i18n";

const { t } = useI18n();

</script>

<template>
    <section id="faq-2" class="faq-2 section light-background">

<div class="container section-title" data-aos="fade-up">
  <h2>{{ $t('faq.title') }}</h2>
  <p>{{ $t('faq.subTitle') }} </p>
</div><!-- End Section Title -->

<div class="container">

  <div class="row justify-content-center">
  <div class="col-lg-4">
    <div data-aos="zoom-out" data-aos-delay="200">
        <img src="/img/others/faq-image.jpg" class="img-fluid animated rounded-4" alt="">
    </div>
  </div>

    <div class="col-lg-8">

      <div class="faq-container">

        <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
          <i class="faq-icon bi bi-question-circle"></i>
          <h3>{{ $t('faq.q.1') }}</h3>
          <div class="faq-content">
            <p>{{ $t('faq.a.1.1') }}<br /><br />

                <b>{{ $t('faq.a.1.2.bold') }}</b> {{ $t('faq.a.1.2.c') }}<br />
                <b>{{ $t('faq.a.1.3.bold') }}</b> {{ $t('faq.a.1.3.c') }}<br />
                <b>{{ $t('faq.a.1.4.bold') }}</b> {{ $t('faq.a.1.4.c') }}<br />
                <b>{{ $t('faq.a.1.5.bold') }}</b> {{ $t('faq.a.1.5.c') }}<br />
                <b>{{ $t('faq.a.1.6.bold') }}</b> {{ $t('faq.a.1.6.c') }}<br />
                <b>{{ $t('faq.a.1.7.bold') }}</b> {{ $t('faq.a.1.7.c') }}<br />
                <b>{{ $t('faq.a.1.8.bold') }}</b> {{ $t('faq.a.1.8.c') }}

            </p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item faq-active" data-aos="fade-up" data-aos-delay="300">
          <i class="faq-icon bi bi-question-circle"></i>
          <h3>{{ $t('faq.q.2') }}</h3>
          <div class="faq-content">
            <p>{{ $t('faq.a.2') }}</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
          <i class="faq-icon bi bi-question-circle"></i>
          <h3>{{ $t('faq.q.3') }}</h3>
          <div class="faq-content">
            <p>{{ $t('faq.a.3') }}</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
          <i class="faq-icon bi bi-question-circle"></i>
          <h3>{{ $t('faq.q.4') }}</h3>
          <div class="faq-content">
            <p>{{ $t('faq.a.4') }}</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
          <i class="faq-icon bi bi-question-circle"></i>
          <h3>{{ $t('faq.q.5') }}</h3>
          <div class="faq-content">
            <p>{{ $t('faq.a.5') }}</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
          <i class="faq-icon bi bi-question-circle"></i>
          <h3>{{ $t('faq.q.6') }}</h3>
          <div class="faq-content">
            <p>{{ $t('faq.a.6') }}</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
          <i class="faq-icon bi bi-question-circle"></i>
          <h3>{{ $t('faq.q.7') }}</h3>
          <div class="faq-content">
            <p>{{ $t('faq.a.7') }}</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

      </div>

    </div>

  </div>

</div>

</section><!-- /Faq 2 Section -->
</template>

<style scoped>
/*--------------------------------------------------------------
# Faq 2 Section
--------------------------------------------------------------*/
.faq-2 .faq-container {
  margin-top: 15px;
}

.faq-2 .faq-container .faq-item {
  background-color: var(--surface-color);
  position: relative;
  padding: 20px;
  margin-bottom: 20px;
  overflow: hidden;
}

.faq-2 .faq-container .faq-item:last-child {
  margin-bottom: 0;
}

.faq-2 .faq-container .faq-item h3 {
  font-weight: 600;
  font-size: 18px;
  line-height: 24px;
  margin: 0 30px 0 32px;
  transition: 0.3s;
  cursor: pointer;
}

.faq-2 .faq-container .faq-item h3 span {
  color: var(--accent-color);
  padding-right: 5px;
}

.faq-2 .faq-container .faq-item h3:hover {
  color: var(--accent-color);
}

.faq-2 .faq-container .faq-item .faq-content {
  display: grid;
  grid-template-rows: 0fr;
  transition: 0.3s ease-in-out;
  visibility: hidden;
  opacity: 0;
}

.faq-2 .faq-container .faq-item .faq-content p {
  margin-bottom: 0;
  overflow: hidden;
}

.faq-2 .faq-container .faq-item .faq-icon {
  position: absolute;
  top: 22px;
  left: 20px;
  font-size: 20px;
  line-height: 0;
  transition: 0.3s;
  color: var(--accent-color);
}

.faq-2 .faq-container .faq-item .faq-toggle {
  position: absolute;
  top: 20px;
  right: 20px;
  font-size: 16px;
  line-height: 0;
  transition: 0.3s;
  cursor: pointer;
}

.faq-2 .faq-container .faq-item .faq-toggle:hover {
  color: var(--accent-color);
}

.faq-2 .faq-container .faq-active h3 {
  color: var(--accent-color);
}

.faq-2 .faq-container .faq-active .faq-content {
  grid-template-rows: 1fr;
  visibility: visible;
  opacity: 1;
  padding-top: 10px;
}

.faq-2 .faq-container .faq-active .faq-toggle {
  transform: rotate(90deg);
  color: var(--accent-color);
}
</style>
