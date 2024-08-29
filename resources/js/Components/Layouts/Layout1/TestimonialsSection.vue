<script setup>
import { ref } from 'vue'
import { useI18n } from "vue-i18n";

const { t } = useI18n();

const testimonial1 = '/img/testimonials/testimonials-11.jpg';
const testimonial3 = '/img/testimonials/testimonials-33.jpg';
const testimonial2 = '/img/testimonials/testimonials-22.jpg';
const testimonial4 = '/img/testimonials/testimonials-44.jpg';
const testimonial5 = '/img/testimonials/testimonials-55.jpg';
const testimonial6 = '/img/testimonials/testimonials-66.jpg';
const louiseSvenson = 'louise svensson';
const louiseSvensonText = t('testimonials.louiseSvensonText');
const brunoDreix = "Bruno DREUX";
const brunoDreixText = t('testimonials.brunoDreixText');
const proFoodCenter = "profoodcenter";
const proFoodCenterText = t('testimonials.proFoodCenterText');
const vincentGirardet = "Vincent Girardet";
const vincentGirardetText = t('testimonials.vincentGirardetText');
const christell48 = "christell 48";
const christell48Text = t('testimonials.christell48Text');
const mauroMartin = "Mauro Martin";
const mauroMartinText = t('testimonials.mauroMartinText');

const swiperOptions = ref({
    loop: true,
    speed: 600,
    autoplay: {
        delay: 5000
    },
    slidesPerView: "auto",
    pagination: {
        el: ".swiper-pagination",
        type: "bullets",
        clickable: true
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 40
        },
        1200: {
            slidesPerView: 1,
            spaceBetween: 10
        }
    }
})
</script>
<template>
    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ $t('testimonials.title') }}</h2>
            <p>{{ $t('testimonials.subTitle') }}</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper init-swiper">

                <div class="swiper-config" style="display: none;">
                    {{ JSON.stringify(swiperOptions) }}
                </div>


                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img :src="testimonial1" class="testimonial-img" alt="">
                            <h3>{{ louiseSvenson }}</h3>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                {{ louiseSvensonText }}
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img :src="testimonial2" class="testimonial-img" alt="">
                            <h3>{{ brunoDreix }}</h3>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                {{ brunoDreixText }}
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img :src="testimonial3" class="testimonial-img" alt="">
                            <h3>{{ proFoodCenter }}</h3>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                {{ proFoodCenterText }}
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img :src="testimonial4" class="testimonial-img" alt="">
                            <h3>{{ vincentGirardet }}</h3>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                {{ vincentGirardetText }}
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img :src="testimonial5" class="testimonial-img" alt="">
                            <h3>{{ christell48 }}</h3>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                {{ christell48Text }}
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img :src="testimonial6" class="testimonial-img" alt="">
                            <h3>{{ mauroMartin }}</h3>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                {{ mauroMartinText }}
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->


                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section><!-- /Testimonials Section -->
</template>

<style scoped>
.stars {
    i {
        color: #FFC107;
        margin: 0 1px;
    }
}
</style>
