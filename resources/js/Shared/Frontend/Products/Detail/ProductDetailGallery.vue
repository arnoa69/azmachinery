<script setup>
import { useI18n } from "vue-i18n";

const { t } = useI18n();

const imageDescription = t('products.image_label');

const props = defineProps({
    product: {
        type: Object,
        required: true
    }
})
console.log(props.product.base_name);
let image = null;
let image_01 = null;
let image_02 = null;
let image_03 = null;
let image_04 = null;

const isGalvanized = (slug) => {
    const galvanizedKeywords = ['gan', 'gal', 'gab', 'gap', 'gao'];
    return galvanizedKeywords.some(keyword => slug.includes(keyword));
};

switch (props.product.base_name) {
    case 'big-foot':
    image = '/img/products/big-foot/big-foot.jpg';
    image_01 = '/img/products/big-foot/big-foot-1.jpg';
    image_02 = '/img/products/big-foot/big-foot-2.jpg';
    image_03 = '/img/products/big-foot/big-foot-3.jpg';
    image_04 = '/img/products/big-foot/big-foot-4.jpg';
        break;
    case 'star':
    image = '/img/products/star/star.jpg';
    image_01 = '/img/products/star/star-1.jpg';
    image_02 = '/img/products/star/star-2.jpg';
    image_03 = '/img/products/star/star-3.jpg';
    image_04 = '/img/products/star/star-4.jpg';
    break;
    case 'star-otc':
    image = '/img/products/star-otc/star-otc.jpg';
    image_01 = '/img/products/star-otc/star-otc-1.jpg';
    image_02 = '/img/products/star-otc/star-otc-2.jpg';
    image_03 = '/img/products/star-otc/star-otc-3.jpg';
    image_04 = '/img/products/star-otc/star-otc-4.jpg';
        break;
    case 'hcrn-06':
    image = '/img/products/hcrn-06/hcrn-06.jpg';
    image_01 = '/img/products/hcrn-06/hcrn-06-1.jpg';
    image_02 = '/img/products/hcrn-06/hcrn-06-2.jpg';
    image_03 = '/img/products/hcrn-06/hcrn-06-3.jpg';
    image_04 = '/img/products/hcrn-06/hcrn-06-4.jpg';
    break;
    case 'hcrn-08':
    image = '/img/products/hcrn-06/hcrn-06-1.jpg';
    image_01 = '/img/products/hcrn-06/hcrn-06.jpg';
    image_02 = '/img/products/hcrn-06/hcrn-06-2.jpg';
    image_03 = '/img/products/hcrn-06/hcrn-06-3.jpg';
    image_04 = '/img/products/hcrn-06/hcrn-06-4.jpg';
    break;
    case 'hcry-08':
    image = '/img/products/hcry-08/hcry-08.jpg';
    image_01 = '/img/products/hcry-08/hcry-08.jpg';
    image_02 = '/img/products/hcry-08/hcry-08-2.jpg';
    image_03 = '/img/products/hcry-08/hcry-08-3.jpg';
    image_04 = '/img/products/hcry-08/hcry-08-1.jpg';
    break;
    case 'prime-xs':
    image = '/img/products/prime-xs/prime-xs.jpg';
    image_01 = '/img/products/prime-xs/prime-xs-1.jpg';
    image_02 = '/img/products/prime-xs/prime-xs-2.jpg';
    image_03 = '/img/products/prime-xs/prime-xs-3.jpg';
    image_04 = '/img/products/prime-xs/prime-xs-rl.jpg';
    break;
    case 'secu-dock':
    image = '/img/products/secu-dock/secu-dock.jpg';
    image_01 = '/img/products/secu-dock/secu-dock-1.jpg';
    image_02 = '/img/products/secu-dock/secu-dock-2.jpg';
    image_03 = '/img/products/secu-dock/secu-dock.jpg';
    image_04 = '/img/products/secu-dock/secu-dock-3.jpg';
    break;
    case 'hcrn-065':
    image = '/img/products/hcrn-065/hcrn-065.jpg';
    image_01 = '/img/products/hcrn-065/hcrn-065-1.jpg';
    image_02 = '/img/products/hcrn-065/hcrn-065-2.jpg';
    image_03 = '/img/products/hcrn-065/hcrn-065-3.jpg';
    image_04 = '/img/products/hcrn-065/hcrn-065-4.jpg';
        break;
    case 'wlo':
    image = '/img/products/wlo/wlo-main.jpg';
    image_01 = '/img/products/wlo/wlo-1.jpg';
    image_02 = '/img/products/wlo/wlo-2.jpg';
    image_03 = '/img/products/wlo/wlo-3.jpg';
    image_04 = '/img/products/wlo/wlo-4.jpg';
        break;
    case 'easy-xl':
    image = '/img/products/easy-xl/easy-xl.jpg';
    image_01 = '/img/products/easy-xl/easy-xl-1.jpg';
    image_02 = '/img/products/easy-xl/easy-xl-2.jpg';
    image_03 = '/img/products/easy-xl/easy-xl-3.jpg';
    image_04 = '/img/products/easy-xl/easy-xl-4.jpg';
        break;
    default:
        break;
}

if (isGalvanized(props.product.slug)) {
    switch (props.product.base_name) {
        case 'big-foot':
    image = '/img/products/big-foot/galva/big-foot-galvanized.jpg';
    image_01 = '/img/products/big-foot/galva/big-foot-galvanized-05.jpg';
    image_02 = '/img/products/big-foot/galva/big-foot-galvanized-02.jpg';
    image_03 = '/img/products/big-foot/galva/big-foot-galvanized-03.jpg';
    image_04 = '/img/products/big-foot/galva/big-foot-galvanized-04.jpg';
        break;
    case 'star':
    image = '/img/products/star/galva/star-galvanized.jpg';
    image_01 = '/img/products/star/galva/star-galvanized-01.jpg';
    image_02 = '/img/products/star/galva/star-galvanized-02.jpg';
    image_03 = '/img/products/star/galva/star-galvanized-03.jpg';
    image_04 = '/img/products/star/galva/star-galvanized-04.jpg';
    break;
    case 'star-otc':
    image = '/img/products/galvanized/rampe_mobile_galvanized.png';
        break;
    case 'hcrn-06':
    image = '/img/products/hcrn-06/galva/hcrn-06-galvanized.jpg';
     break;
    case 'hcrn-08':
    image = '/img/products/hcrn-06/galva/hcrn-06-galvanized.jpg';
    break;
    case 'hcry-08':
    image = '/img/products/hcry-08/hcry-08.jpg';
    break;
    case 'prime-xs':
    image = '/img/products/prime-xs/galva/prime-xs-galvanized.jpg';
    break;
    case 'secu-dock':
    image = '/img/products/secu-dock/secu-dock.jpg';
    break;
    case 'hcrn-065':
    image = '/img/products/hcrn-065/galva/hcrn-065-galvanized.jpg';
        break;
    case 'wlo':
    image = '/img/products/wlo/galva/wlo-galvanized.jpg';
    image_01 = '/img/products/wlo/galva/wlo-galvanized-01.jpg';
    image_02 = '/img/products/wlo/galva/wlo-galvanized-02.jpg';
    image_03 = '/img/products/wlo/galva/wlo-galvanized-03.jpg';
    image_04 = '/img/products/wlo/galva/wlo-galvanized-04.jpg';
        break;
    case 'easy-xl':
    image = '/img/products/easy-xl/easy-xl.jpg';
        break;
    default:
        break;
    }
}
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
