<script setup>

</script>

<template>
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch" data-aos="fade-right">
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
            <h3>{{ $t('about.title') }}</h3>
            <p>{{ $t('about.description') }}</p>

            <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon"><i class="bi bi-1-circle"></i></div>
              <h4 class="title"><a href="">{{ $t('about.box1Title') }}</a></h4>
              <p class="description">{{ $t('about.box1Description') }}</p>
            </div>

            <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon"><i class="bi bi-award-fill"></i></div>
              <h4 class="title"><a href="">{{ $t('about.box2Title') }}</a></h4>
              <p class="description">{{ $t('about.box2Description') }}</p>
            </div>

            <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon"><i class="bi bi-sign-turn-slight-right-fill"></i></div>
              <h4 class="title"><a href="">{{ $t('about.box3Title') }}</a></h4>
              <p class="description">{{ $t('about.box3Description') }}</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->
</template>
