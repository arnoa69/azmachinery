<script setup>
const image = '/../../img/products/normal/test1.jpg';
</script>

<template>
    <!-- Portfolio Section -->
        <div class="col-lg-12 col-md-6 portfolio-item isotope-item filter-app">
            <div class="portfolio-content h-100">
                <div class="portfolio-info">
                    <a :href="image" title="App 1" data-gallery="portfolio-gallery-app"
                        class="glightbox preview-link">
                        <img :src="image" class="img-fluid" alt="">
                    </a>
                </div>
            </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-3 col-md-6 portfolio-item isotope-item filter-product">
            <div class="portfolio-content h-100">
                <div class="portfolio-info">
                    <a :href="image" title="App 1" data-gallery="portfolio-gallery-app"
                        class="glightbox preview-link">
                        <img :src="image" class="img-fluid" alt="">
                    </a>
                </div>
            </div>
        </div><!-- End Portfolio Item -->
        <div class="col-lg-3 col-md-6 portfolio-item isotope-item filter-product">
            <div class="portfolio-content h-100">
                <div class="portfolio-info">
                    <a :href="image" title="App 1" data-gallery="portfolio-gallery-app"
                        class="glightbox preview-link">
                        <img :src="image" class="img-fluid" alt="">
                    </a>
                </div>
            </div>
        </div><!-- End Portfolio Item -->
        <div class="col-lg-3 col-md-6 portfolio-item isotope-item filter-product">
            <div class="portfolio-content h-100">
                <div class="portfolio-info">
                    <a :href="image" title="App 1" data-gallery="portfolio-gallery-app"
                        class="glightbox preview-link">
                        <img :src="image" class="img-fluid" alt="">
                    </a>
                </div>
            </div>
        </div><!-- End Portfolio Item -->
        <div class="col-lg-3 col-md-6 portfolio-item isotope-item filter-product">
            <div class="portfolio-content h-100">
                <div class="portfolio-info">
                    <a :href="image" title="App 1" data-gallery="portfolio-gallery-app"
                        class="glightbox preview-link">
                        <img :src="image" class="img-fluid" alt="">
                    </a>
                </div>
            </div>
        </div><!-- End Portfolio Item -->
</template>

<style scoped>
img {
    border-radius: 10px;
}
.portfolio-item {
    margin-top: 10px;
}
/* Verstecke alle Portfolio-Elemente auf mobilen Geräten */
@media (max-width: 767.98px) {
    .portfolio-item {
        display: none; /* Verstecke alle Portfolio-Elemente */
    }

    /* Zeige nur das Element mit col-lg-12 an
    .col-lg-12 {
        display: block;
    } */
}
</style>
