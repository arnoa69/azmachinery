<script setup>

</script>

<template>
    <section id="presentation" class="about section section-bg dark-background">

        <div class="container position-relative">

            <div class="row gy-5">

                <div class="content col-xl-5 d-flex flex-column justify-content-center"  data-aos-delay="100" data-aos="zoom-out">
                    <h3>{{ $t('presentation.title') }}</h3>
                    <div class="order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
                        <img src="/img/products/galvanized/rampe_mobile_galvanized.png" class="img-fluid animated" alt="">
                    </div>
                </div>

                <div class="col-xl-7" data-aos="fade-up" data-aos-delay="200">
                    <div class="row gy-4">

                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-1-circle-fill"></i>
                            <h4>{{ $t('presentation.point-1-title') }}</h4>
                            <p>{{ $t('presentation.point-1-description') }}</p>
                        </div><!-- Icon-Box -->

                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-2-circle-fill"></i>
                            <h4>{{ $t('presentation.point-2-title') }}</h4>
                            <p>{{ $t('presentation.point-2-description') }}</p>
                        </div><!-- Icon-Box -->

                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-3-circle-fill"></i>
                            <h4>{{ $t('presentation.point-3-title') }}</h4>
                            <p>{{ $t('presentation.point-3-description') }}</p>
                        </div><!-- Icon-Box -->

                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-4-circle-fill"></i>
                            <h4>{{ $t('presentation.point-4-title') }}</h4>
                            <p>{{ $t('presentation.point-4-description') }}</p>
                        </div><!-- Icon-Box -->

                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-5-circle-fill"></i>
                            <h4>{{ $t('presentation.point-5-title') }}</h4>
                            <p>{{ $t('presentation.point-5-description') }}</p>
                        </div><!-- Icon-Box -->

                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-6-circle-fill"></i>
                            <h4>{{ $t('presentation.point-6-title') }}</h4>
                            <p>{{ $t('presentation.point-6-description') }}</p>
                        </div><!-- Icon-Box -->

                    </div>
                </div>

            </div>

        </div>

    </section>
</template>
