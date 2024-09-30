<script setup>
import { useI18n } from "vue-i18n";
import { getProductImages } from '@/utils/imageUtil';

const { t } = useI18n();

const imageDescription = t('products.image_label');

const props = defineProps({
    product: {
        type: Object,
        required: true
    }
})

const isGalvanized = (slug) => {
    const galvanizedKeywords = ['gan', 'gal', 'gab', 'gap', 'gao'];
    return galvanizedKeywords.some(keyword => slug.includes(keyword));
};

const { main: image, additional: [image_01, image_02, image_03, image_04] } = getProductImages(props.product.base_name, isGalvanized(props.product.slug));

</script>

<template>
    <!-- Portfolio Section -->
        <div class="col-lg-12 col-md-6 portfolio-item isotope-item filter-app main-image">
            <div class="portfolio-content h-100">
                <div class="portfolio-info">
                    <a :href="image" :title="product.slug + ': ' + imageDescription" data-gallery="portfolio-gallery-app"
                        class="glightbox preview-link">
                        <img :src="image" class="img-fluid" :alt="product.slug">
                    </a>
                </div>
            </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-3 col-md-6 portfolio-item isotope-item filter-product additional-image">
            <div class="portfolio-content h-100">
                <div class="portfolio-info">
                    <a :href="image_01" :title="product.slug + ': ' + imageDescription" data-gallery="portfolio-gallery-app"
                        class="glightbox preview-link">
                        <img :src="image_01" class="img-fluid" alt="">
                    </a>
                </div>
            </div>
        </div><!-- End Portfolio Item -->
        <div class="col-lg-3 col-md-6 portfolio-item isotope-item filter-product additional-image">
            <div class="portfolio-content h-100">
                <div class="portfolio-info">
                    <a :href="image_02" :title="product.slug + ': ' + imageDescription" data-gallery="portfolio-gallery-app"
                        class="glightbox preview-link">
                        <img :src="image_02" class="img-fluid" alt="">
                    </a>
                </div>
            </div>
        </div><!-- End Portfolio Item -->
        <div class="col-lg-3 col-md-6 portfolio-item isotope-item filter-product additional-image">
            <div class="portfolio-content h-100">
                <div class="portfolio-info">
                    <a :href="image_03" :title="product.slug + ': ' + imageDescription" data-gallery="portfolio-gallery-app"
                        class="glightbox preview-link">
                        <img :src="image_03" class="img-fluid" alt="">
                    </a>
                </div>
            </div>
        </div><!-- End Portfolio Item -->
        <div class="col-lg-3 col-md-6 portfolio-item isotope-item filter-product additional-image">
            <div class="portfolio-content h-100">
                <div class="portfolio-info">
                    <a :href="image_04" :title="product.slug + ': ' + imageDescription" data-gallery="portfolio-gallery-app"
                        class="glightbox preview-link">
                        <img :src="image_04" class="img-fluid" alt="">
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

.main-image img {
    width: 415px;
    height: 250px;
    object-fit: cover; /* Ensure the image covers the area without stretching */
}

.additional-image img {
    width: 100px;
    height: 60px;
    object-fit: cover; /* Ensure the image covers the area without stretching */
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
