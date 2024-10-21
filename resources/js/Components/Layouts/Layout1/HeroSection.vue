<script setup>
import { ref, onMounted, computed } from 'vue'
import { useI18n } from "vue-i18n";

const { t } = useI18n();

</script>

<template>
    <section id="hero" class="hero section dark-background">

        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-6 text-center">
                        <h2>{{ $t('hero.title.start') }}</h2>
                        <p>{{ $t('hero.title.description') }}</p>
                        <a href="/get-a-quote" class="btn-get-started">{{ $t('hero.title.button') }}</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active">
                <img src="/img/hero-carousel/hero-carousel-1.jpg" alt="">
            </div>

            <div class="carousel-item">
                <img src="/img/hero-carousel/hero-carousel-2.jpg" alt="">
            </div>

            <div class="carousel-item">
                <img src="/img/hero-carousel/hero-carousel-3.jpg" alt="">
            </div>

            <div class="carousel-item">
                <img src="/img/hero-carousel/hero-carousel-4.jpg" alt="">
            </div>

            <div class="carousel-item">
                <img src="/img/hero-carousel/hero-carousel-5.jpg" alt="">
            </div>

            <div class="carousel-item">
                <img src="/img/hero-carousel/hero-carousel-6.jpg" alt="">
            </div>

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>

    </section><!-- /Hero Section -->

</template>

<style scoped></style>
