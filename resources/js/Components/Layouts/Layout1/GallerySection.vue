<script setup>

  const image1 = '../../img/gallery/rampen-bau-1.jpg'
  const image2 = '../../img/gallery/rampen-bau-2.jpg'
  const image3 = '../../img/gallery/rampen-bau-3.jpg'
  const image4 = '../../img/gallery/rampen-bau-4.jpg'
  const image5 = '../../img/gallery/rampen-bau-5.jpg'
  const image6 = '../../img/gallery/rampen-bau-6.jpg'
  const image7 = '../../img/gallery/rampen-bau-7.jpg'
  const image8 = '../../img/gallery/rampen-bau-8.jpg'
</script>

<template>
    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>{{ $t('gallery.title') }}</h2>
          <p>{{ $t('gallery.subTitle') }}</p>
        </div>

        <div class="row g-0" data-aos="fade-left">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
              <a v-bind:href="image1" class="gallery-lightbox">
                <img v-bind:src="image1" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="150">
              <a v-bind:href="image2" class="gallery-lightbox">
                <img v-bind:src="image2" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200">
              <a v-bind:href="image3" class="gallery-lightbox">
                <img v-bind:src="image3" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="250">
              <a v-bind:href="image4" class="gallery-lightbox">
                <img v-bind:src="image4" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
              <a v-bind:href="image5" class="gallery-lightbox">
                <img v-bind:src="image5" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="350">
              <a v-bind:href="image6" class="gallery-lightbox">
                <img v-bind:src="image6" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="400">
              <a v-bind:href="image7" class="gallery-lightbox">
                <img v-bind:src="image7" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="450">
              <a v-bind:href="image8" class="gallery-lightbox">
                <img v-bind:src="image8" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->
</template>
