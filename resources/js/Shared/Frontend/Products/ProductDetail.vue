<script setup>
import CategorySidebar from "../../../Components/Layouts/Layout1/Sidebar/CategorySidebar.vue";
import HelpSidebar from "../../../Components/Layouts/Layout1/Sidebar/HelpSidebar.vue";
import ProductDetailGallery from "./Detail//ProductDetailGallery.vue";
import ProductSpecification from "./Detail//ProductSpecification.vue";
import FabButton from './FAB/FabButton.vue';
import { ref, computed, watch, onMounted } from "vue";
import { useI18n } from 'vue-i18n';
import CookieBanner from '@/Shared/Cookiebanner/CookieBanner.vue';
import ManageCookieBanner from '@/Shared/Cookiebanner/ManageCookieBanner.vue';
import PolicyBanner from '@/Shared/Cookiebanner/PolicyBanner.vue';
import { posthogModule } from '@/plugins/posthog';
import PriceCalculator from './Calculator/PriceCalculator.vue';


const { locale } = useI18n();

const phone_number = ref('');
const props = defineProps({
    product: {
        type: Object,
        required: true,
    }
});

const showForm = ref(false);

const formatPrice = (price) => {
    return Math.floor(price); // Entfernt die Dezimalstellen
};
const formatProductName = (name) => {
    const parts = name.split('STANDARD'); // Teile den Namen bei "STANDARD"
    if (parts[0]) {
        // Ersetze Bindestriche durch Leerzeichen und entferne überflüssige Leerzeichen
        return parts[0].replace(/-/g, ' ').trim() + ' STANDARD';
    }
    return '';
};

const goBack = () => {
    window.history.back();
}
const showBanner = ref(!(posthogModule.posthog.has_opted_out_capturing() || posthogModule.posthog.has_opted_in_capturing()));
const showConfigBanner = ref(false)
const showPolicyBanner = ref(false)

</script>

<template>
    <section id="product-detail" class="about">
        <div class="price-circle">{{ formatPrice(product.total_price) }} €</div>
        <div class="container">
            <div class="d-block d-md-none">
                <div class="section-links flex-column">
                    <h1 style="margin-left: -180px;">{{ formatProductName(product.name) }}</h1>
                    <div style="margin-left: -210px;" class="product-stats text-left">
                        <span class="rating">
                            <i class="bi bi-star-fill" style="color: #DA913C;"></i>
                            4.9
                        </span>
                        <span class="reviews">2.4k Reviews</span>
                        <span class="sold">• 2.9k + sold</span>
                        <span class="stats d-none d-md-inline">100+ sold</span>
                    </div>
                    <button @click="goBack" class="btn-back mt-3">
                        <i class="bi bi-arrow-left-circle-fill"></i> <span class="back-btn-label">{{ $t("products.back_button") }}</span>
                    </button>

                    <button @click="goBack" class="btn-back-mobile mt-3">
                        <i class="bi bi-arrow-left-circle"></i>
                    </button>
                    <button @click="toggleFavorites" class="btn-favorites-mobile mt-3">
                        <i class="bi bi-bookmark-heart"></i>
                    </button>

                    <div class="section-title mt-2">
                        <!-- <h2>{{ $t("products.target_audience_title") }}</h2> -->
                        {{ $t(`${product.slug}.product_description`) }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 d-flex align-items-stretch justify-content-center justify-content-lg-start">
                    <!-- BEGIN LEFT SIDBAR -->
                    <div class="d-flex flex-column">
                        <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                            <!-- <div class="service-details">
                                <div class=" service-box">
                                    <img class="pic" :src="`/img/products/normal/rampes-star_org.jpg`"
                                        :alt="product.name" />
                                </div>
                            </div> -->
                            <product-detail-gallery />
                        </div>
                        <div class="row no-gutters mt-2">
                        </div>
                        <div class="row categories-list">
                            <div class="service-details">
                                <product-specification :product="product" />
                                <HelpSidebar :page_or_slug="product.slug" />
                            </div>
                        </div>
                        <div class="row">
                            <div
                                class="col-lg-12 d-flex justify-content-center product-img align-items-stretch position-relative">
                                <a href="https://www.youtube.com/watch?v=K7FVp6UbXi8"
                                    class="glightbox play-btn mb-4">.</a>
                            </div>
                            <div class="service-details">
                                <CategorySidebar /> <!-- Component CategorySidebar.vue -->
                            </div>
                        </div>
                    </div>
                </div> <!-- END LEFT SIDBAR -->
                <!--  end col-lg-4  -->
                <div class="col-lg-8 d-flex flex-column align-items-stretch"> <!-- BEGIN RIGHT CONTNENT COLUMN -->
                    <div class="content ps-lg-4 d-flex flex-column justify-content-center">
                        <div class="row">

                            <div class="col-lg-6"> <!-- BEGIN OF RIGHT CONTNENT COLUMN -->
                                <div class="for-whom mt-2">
                                    <div class="d-none d-md-block">
                                        <div class="section-title">
                                            <!-- <h2>{{ $t("products.target_audience_title") }}</h2> -->
                                            {{ $t(`${product.slug}.product_description`) }}
                                        </div>
                                    </div>

                                    <!-- <ul>
                                        <li><i class="bi bi-chevron-right"></i> <strong>{{ $t("products.target_audience_06") }}</strong></li>
                                        <li><i class="bi bi-chevron-right"></i> <strong>{{ $t("products.target_audience_07") }}</strong></li>
                                        <li><i class="bi bi-chevron-right"></i> <strong>{{ $t("products.target_audience_08") }}</strong> </li>
                                        <li><i class="bi bi-chevron-right"></i> <strong>{{ $t("products.target_audience_09") }}</strong></li>
                                        <li><i class="bi bi-chevron-right"></i> <strong>{{ $t("products.target_audience_10") }}</strong></li>
                                        <li><i class="bi bi-chevron-right"></i> <strong>{{ $t("products.target_audience_01") }}</strong></li>
                                        <li><i class="bi bi-chevron-right"></i> <strong>{{ $t("products.target_audience_02") }}</strong></li>
                                        <li><i class="bi bi-chevron-right"></i> <strong>{{ $t("products.target_audience_03") }}</strong> </li>
                                        <li><i class="bi bi-chevron-right"></i> <strong>{{ $t("products.target_audience_04") }}</strong></li>
                                        <li><i class="bi bi-chevron-right"></i> <strong>{{ $t("products.target_audience_05") }}</strong></li>
                                    </ul> -->
                                    <!-- <div class="chip-wrapper">
                                        <p class="chip-red chip">{{ $t("products.target_audience_06") }}</p>
                                        <p class="chip-red chip">{{ $t("products.target_audience_07") }}</p>
                                        <p class="chip-red chip">{{ $t("products.target_audience_08") }}</p>
                                        <p class="chip-red chip">{{ $t("products.target_audience_09") }}</p>
                                    </div> -->
                                </div>
                            </div> <!-- END OF RIGHT CONTNENT COLUMN -->
                            <div class="col-lg-6"> <!-- BEGIN OF LEFT CONTNENT COLUMN -->
                                <product-specification :product="product" />
                            </div> <!-- END OF LEFT CONTNENT COLUMN -->
                        </div>
                        <div class="row mt-n3">
                            <price-calculator :baseName="product.base_name" :slug="product.slug"
                                :price="product.total_price" :version="product.version" :type="product.type" />
                        </div> <!-- end row -->
                    </div>
                    <!-- End .content-->
                </div> <!-- END RIGHT CONTNENT COLUMN -->
            </div>
        </div> <!-- END Container -->
    </section>
    <!-- End About Me Section -->
    <div>
        <fab-button @click="showForm = true" />
        <transition name="slide-in">
            <help-sidebar v-if="showForm" />
        </transition>
    </div>

    <CookieBanner v-if="showBanner" @hideBanner="showBanner = false" @showManageBanner="showConfigBanner = true"
        @showPolicyBanner="showPolicyBanner = true" />

    <ManageCookieBanner v-if="showConfigBanner" @hideConfigBanner="showConfigBanner = false"
        @hideBothBanner="showBanner = false, showConfigBanner = false" />

    <PolicyBanner v-if="showPolicyBanner" @hide-policy-banner="showPolicyBanner = false" />
</template>

<style scoped>
/*--------------------------------------------------------------
# About Me
--------------------------------------------------------------*/

.card {
    margin: 20px;
}

.card-header {
    background-color: #f8f9fa;
}

.price {
    font-weight: bold;
    font-size: 1.2em;
}

.description {
    font-size: 0.9em;
    color: #6c757d;
}

.dot-container {
    display: inline-block;
    position: relative;
    width: 12px;
    /* 3px width per dot + 1px margin-right per dot */
    height: 3px;
    margin-left: 5px;
    /* some space between text and dots */
}

.dot {
    width: 3px;
    height: 3px;
    background-color: rgb(220, 12, 12);
    border-radius: 50%;
    position: absolute;
    opacity: 0;
    animation: dot-animation 6s infinite;
    margin-left: -6px;
}

.dot:nth-child(1) {
    left: 0;
    animation-delay: 1s;
}

.dot:nth-child(2) {
    left: 5px;
    /* 3px width + 2px space */
    animation-delay: 2s;
}

.dot:nth-child(3) {
    left: 10px;
    /* 3px width * 2 + 2px space * 2 */
    animation-delay: 3s;
}

@keyframes dot-animation {

    0%,
    100% {
        opacity: 0;
    }

    20%,
    80% {
        opacity: 1;
    }
}

.bi.bi-file-pdf-fill {
    font-size: 18px;
    color: #e21414;
}

.download-pdf {
    color: #e21414;
    text-decoration: none;
}



.count-box ul li {
    font-size: 15px;
}



@media (max-width: 991px) {
    .section-title p {
        font-size: 19px;
        margin-bottom: 10px;
    }

    .about h1 {
        font-size: 14px !important;
        margin-bottom: 20px;
        font-weight: 700;
        color: black;
        text-align: left;
        margin-top: -26px;
    }

    .description {
        font-size: 14px;
    }
}




.about .content h3 {
    font-weight: 700;
    font-size: 26px;
    color: #3b434a;
    text-transform: uppercase;
}

.calculator {
    border: 3px solid red;
    min-width: 150px;
    max-width: 800px;
    padding: 15px;
    margin: 15px;
    min-height: 100px;
    max-height: 220px;
}

.about .content ul {
    list-style: none;
    padding: 0;
}

.pic {
    width: 100%;
}

.feature-title {
    font-size: 22px !important;
    color: #3b434a;
    font-weight: 700;
    padding: 0;
}

.about .content ul li {
    margin-bottom: 13px;
    display: flex;
    align-items: center;
}

.about .content ul strong {
    margin-right: 10px;
}

.about .content ul i {
    font-size: 16px;
    margin-right: 5px;
    color: #e62614;
    line-height: 0;
}

.about .content p:last-child {
    margin-bottom: 0;
}

.about .content .count-box {
    width: 100%;
}

.about .content .count-box i {
    display: block;
    font-size: 36px;
    color: #ffb727;
    float: left;
    line-height: 0;
}

.about .content .count-box span {
    font-size: 36px;
    line-height: 30px;
    display: block;
    font-weight: 700;
    color: #3b434a;
    margin-left: 50px;
}

.about .content .count-box p {
    padding: 15px 0 0 0;
    margin: 0 0 0 50px;
    font-family: "Raleway", sans-serif;
    font-size: 14px;
    color: #5d6a75;
}

.about .content .count-box a {
    font-weight: 600;
    display: block;
    margin-top: 20px;
    color: #5d6a75;
    font-size: 15px;
    font-family: "Satisfy", serif;
    transition: ease-in-out 0.3s;
}

.about .content .count-box a:hover {
    color: #82909c;
}


.section-title {
    padding-bottom: 15px !important;
    text-align: left;

}

/*--------------------------------------------------------------
# Services Details Page
--------------------------------------------------------------*/
/* Service-details Section - Services Details Page
------------------------------*/
.categories-list {
    margin-top: 10px;
    margin-bottom: 20px;
}

.service-details .service-box {
    padding: 20px;
    box-shadow: 0px 2px 20px rgba(194, 193, 193, 0.6);
}

.service-details .service-box+.service-box {
    margin-top: 30px;
}

.service-details .service-box h4 {
    font-size: 20px;
    font-weight: 700;
    border-bottom: 2px solid rgba(235, 233, 233, 0.9);
    padding-bottom: 15px;
    margin-bottom: 15px;
}

.service-details .services-list a {
    color: rgba(47, 49, 51, 0.8);
    background-color: rgba(244, 244, 244, 0.9);
    display: flex;
    align-items: center;
    padding: 12px 15px;
    margin-top: 15px;
    transition: 0.3s;
    text-decoration: none;
}

.service-details .services-list a:first-child {
    margin-top: 0;
}

.service-details .services-list a i {
    font-size: 16px;
    margin-right: 8px;
    color: var(--accent-color);
}

.service-details .services-list a.active {
    color: #fff;
    background-color: rgba(232, 69, 69, 0.9);
}

.service-details .services-list a.active i {
    color: var(--contrast-color);
}

.service-details .services-list a:hover {
    color: #fff;
    background-color: rgba(232, 69, 69, 0.9);
}

.service-details .download-catalog a {
    color: var(--default-color);
    display: flex;
    align-items: center;
    padding: 10px 0;
    transition: 0.3s;
    border-top: 1px solid rgba(var(--default-color-rgb), 0.1);
}

.service-details .download-catalog a:first-child {
    border-top: 0;
    padding-top: 0;
}

.service-details .download-catalog a:last-child {
    padding-bottom: 0;
}

.service-details .download-catalog a i {
    font-size: 24px;
    margin-right: 8px;
    color: var(--accent-color);
}

.service-details .download-catalog a:hover {
    color: var(--accent-color);
}

.service-details .help-box {
    background-color: rgba(232, 69, 69, 0.9);
    color: #fff;
    margin-top: 30px;
    padding: 30px 15px;
}

.service-details .help-box .help-icon {
    font-size: 48px;
}

.service-details .help-box h4,
.service-details .help-box a {
    color: var(--contrast-color);
}

.service-details .services-img {
    margin-bottom: 20px;
}

.service-details h3 {
    font-size: 26px;
    font-weight: 700;
}

.service-details p {
    font-size: 15px;
}

.service-details ul {
    list-style: none;
    padding: 0;
    font-size: 15px;
}

.service-details ul li {
    padding: 5px 0;
    display: flex;
    align-items: center;
}

.service-details ul i {
    font-size: 20px;
    margin-right: 8px;
    color: var(--accent-color);
}




.section-links {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.chips-wrapper {
    display: flex;
    border: solid 1px #160202;
}

.chip {
    padding: 5px 10px;
    border-radius: 15px;
    margin-right: 10px;
    font-weight: bold;
    color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-size: 11px;
    display: inline-block;
}


.chip-blue-clear {
    background-color: #54C0D1;
}

.chip-green-dark {
    background-color: #99A795;
}

.chip-blue-dark {
    background-color: #0d47a1;
}

.chip-red {
    background-color: #dc3545;
}

.btn-back {
    background-color: #000;
    color: #fff;
    border: none;
    border-radius: 0;
    padding: 5px 10px;
    display: flex;
    align-items: center;
}

.bi .bi-arrow-left-circle-fill .mycircle {
    margin-right: 3px;
}

.back-btn-label {
    margin-left: 6px;
}

@media (min-width: 992px) {
    .for-whom {
        margin-left: 6px;
    }
}

.pds_phone {
    width: 100%;
    padding-left: 15px;
    padding-right: 15px;
    margin-top: -20px;
}

.submit-button {
    margin-top: 15px;
    width: 100%;
    border: none;
    height: 35px;
}

.form-check-label {
    font-size: 12px;
}

.form-check {
    margin-top: 10px;
}

/* FAB button */
.slide-in-enter-active {
    animation: slide-in 0.5s ease-out;
}

.slide-in-leave-active {
    animation: slide-out 0.3s ease-in;
}

@keyframes slide-in {
    from {
        transform: translateX(100%);
    }

    to {
        transform: translateX(0);
    }
}

@keyframes slide-out {
    from {
        transform: translateX(0);
    }

    to {
        transform: translateX(100%);

    }
}

.btn-back-mobile {
    display: none;
    /* Standardmäßig ausblenden */
    position: absolute;
    /* Absolut positionieren */
    top: 220px;
    /* Abstand vom oberen Rand */
    left: 20px;
    /* Abstand vom linken Rand */
    background-color: transparent;
    /* Hintergrund transparent */
    border: none;
    /* Kein Rahmen */
    border-radius: 50%;
    /* Runde Form */
    width: 40px;
    /* Breite des Buttons */
    height: 40px;
    /* Höhe des Buttons */
    cursor: pointer;
    /* Zeiger-Cursor */
    z-index: 10;
    /* Über anderen Elementen anzeigen */
}

.btn-back-mobile i {
    color: white;
    /* Weiße Farbe für das Icon */
    font-size: 24px;
    /* Größe des Icons */
}

.btn-favorites-mobile {
    display: none;
    /* Standardmäßig ausblenden */
    position: absolute;
    /* Absolut positionieren */
    top: 220px;
    /* Gleicher Abstand wie der zurück Button */
    right: 20px;
    /* Abstand vom rechten Rand */
    background-color: transparent;
    /* Hintergrund transparent */
    border: none;
    /* Kein Rahmen */
    border-radius: 50%;
    /* Runde Form */
    width: 40px;
    /* Breite des Buttons anpassen */
    height: 40px;
    /* Höhe des Buttons anpassen */
    cursor: pointer;
    /* Zeiger-Cursor */
    z-index: 10;
    /* Über anderen Elementen anzeigen */
    align-items: center;
    /* Vertikale Zentrierung */
    justify-content: center;
    /* Horizontale Zentrierung */
}

.btn-favorites-mobile i {
    color: white;
    /* Weiße Farbe für das Herz-Icon */
    font-size: 24px;
    /* Größe des Icons auf 16px setzen */
}

.price-circle {
    display: none;
    /* Standardmäßig ausblenden */
    position: absolute;
    /* Absolut positionieren */
    top: 285px;
    /* Position über dem oberen Rand */
    right: 26px;
    /* Abstand vom linken Rand */
    width: 80px;
    /* Durchmesser des Kreises */
    height: 80px;
    /* Durchmesser des Kreises */
    background-color: black;
    /* Hintergrund rot */
    border: 1px solid white;
    color: white;
    /* Schriftfarbe weiß */
    border-radius: 50%;
    /* Runde Form */
    align-items: center;
    /* Vertikale Zentrierung */
    justify-content: center;
    /* Horizontale Zentrierung */
    font-size: 14px;
    /* Schriftgröße */
    font-weight: bold;
    /* Fettdruck */
    z-index: 20;
    /* Über anderen Elementen anzeigen */
}

h1 {
    font-size: inherit;
    /* Standardgröße beibehalten */
}

.product-stats {
    display: none;
    /* Standardmäßig ausblenden */
    font-size: 11px;
    margin-top: -10px;
    position: absolute;
}

@media (max-width: 767.98px) {
    .product-stats {
        display: inline;
        /* Auf mobilen Geräten anzeigen */
    }

    h1 {
        font-size: 10px;
        /* Schriftgröße auf 10px setzen */
    }

    .btn-back {
        display: none;
    }

    .portfolio-item {
        display: none;
        /* Verstecke alle Portfolio-Elemente */
    }

    /* Zeige nur das Element mit col-lg-12 an */
    .col-lg-12 {
        display: block;
        /* Zeige das Element mit col-lg-12 an */
    }

    #product-detail {
        margin-top: -40px;
        border-top-left-radius: 20px;
        /* Runde die untere linke Ecke */
        border-top-right-radius: 20px;
        /* Runde die untere rechte Ecke */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        /* Schatten hinzufügen */
    }

    .btn-back-mobile {
        display: flex;
        /* Button nur auf mobilen Geräten anzeigen */
        align-items: center;
        /* Vertikale Zentrierung */
        justify-content: center;
        /* Horizontale Zentrierung */
    }

    .btn-favorites-mobile {
        display: flex;
        /* Button nur auf mobilen Geräten anzeigen */
    }

    .price-circle {
        display: flex;
        /* Button nur auf mobilen Geräten anzeigen */
    }
}
</style>
