<script setup>
import HelpSidebar from "../../../Components/Layouts/Layout1/Sidebar/HelpSidebar.vue";
import ProductDetailGallery from "./Detail//ProductDetailGallery.vue";
import ProductSpecification from "./Detail//ProductSpecification.vue";
import FabButton from './FAB/FabButton.vue';
import { ref, computed, onMounted } from "vue";
import { useI18n } from 'vue-i18n';
import CookieBanner from '@/Shared/Cookiebanner/CookieBanner.vue';
import ManageCookieBanner from '@/Shared/Cookiebanner/ManageCookieBanner.vue';
import PolicyBanner from '@/Shared/Cookiebanner/PolicyBanner.vue';
import { posthogModule } from '@/plugins/posthog';
import PriceCalculator from './Calculator/PriceCalculator.vue';
import HelpChat from './Calculator/HelpChat.vue';


const { locale } = useI18n();

const phone_number = ref('');
const props = defineProps({
    product: {
        type: Object,
        required: true,
    }
});

const showForm = ref(false);

const soldItems = ref({
    'star': 533,
    'easy-xl': 126,
    'wlo': 98,
    'prime-xs': 101,
    'star-otc': 666,
    'big-foot': 67,
    'hcrn-06': 406,
    'hcrn-065': 388,
    'hcrn-08': 284,
    'hcry-08': 312,
    'secu-dock': 114
});


const formatPrice = (price) => {
    return Math.floor(price); // Entfernt die Dezimalstellen
};
const formatProductName = (name) => {
    const parts = name.split(/STANDARD|LLOXL|LLO|XL/); // Teile den Namen bei "STANDARD", "LLOXL", "LLO", oder "XL"
    if (parts[0]) {
        // Ersetze Bindestriche durch Leerzeichen und entferne überflüssige Leerzeichen
        const suffix = name.includes('STANDARD') ? ' STANDARD' :
            name.includes('LLOXL') ? ' LLOXL' :
                name.includes('LLO') ? ' LLO' :
                    name.includes('XL') ? ' XL' : '';
        return parts[0].replace(/-/g, ' ').trim() + suffix;
    }
    return '';
};

const formatProductNameLarge = (name) => {
    const replacements = {
        '-LLO': ' Long level off ',
        '-XL': ' Extra large',
        '-STANDARD': ' Standard',
        '-LLOXL': ' Long level off extra large',
        '-.': ' ',
        '-TB': ' + Cover',
        '-ZR': ' + Security zone',
        '-FF': ' + Fork slider',
        '-RL': ' + Guardrails',
        '-E': ' + Electric',
        '-GAL': ' + Galvanized'
    }
    return name.replace(/-LLO|-XL|-STANDARD|-LLOXL|-\.|\.|-TB|-ZR|-FF|-RL|-E|-GAL/g, (match) => replacements[match] || '')
}

const goBack = () => {
    window.history.back();
}
const showBanner = ref(!(posthogModule.posthog.has_opted_out_capturing() || posthogModule.posthog.has_opted_in_capturing()));
const showConfigBanner = ref(false)
const showPolicyBanner = ref(false)


// State to manage the current component being displayed
const currentComponent = ref('PriceCalculator');

// Methods to change the displayed component
const showHelpSidebar = () => {
    currentComponent.value = 'HelpSidebar';
};

const showHelpChat = () => {
    currentComponent.value = 'HelpChat';
};

const showPriceCalculator = () => {
    currentComponent.value = 'PriceCalculator';
};

// Method to share the product
const shareProduct = () => {
    if (navigator.share) {
        navigator.share({
            title: 'Produktname', // Titel des Produkts
            text: 'Schau dir dieses Produkt an!', // Text, der geteilt wird
            url: window.location.href // URL der aktuellen Seite
        })
            .then(() => {
                console.log('Erfolgreich geteilt');
            })
            .catch((error) => {
                console.error('Fehler beim Teilen:', error);
            });
    } else {
        alert('Teilen ist auf diesem Gerät nicht unterstützt.');
    }
};

const industries = [
  'Construction',
  'Manufacturing',
  'Logistics',
  'Warehousing',
  'Retail',
  'Food and Beverage',
  'Healthcare',
  'Aerospace',
  'Automotive',
  'Chemical Industry'
];

const chunkedIndustries = computed(() => {
  const half = Math.ceil(industries.length / 2);
  return [industries.slice(0, half), industries.slice(half)];
})

const videos = ref([
  { id: 1, thumbnail: '/img/products/small/star-otc_thumb.jpg', url: 'https://www.youtube.com/watch?v=uv4eaAKH1yg' },
  { id: 2, thumbnail: '/img/products/small/star-otc_thumb.jpg', url: 'https://www.youtube.com/watch?v=uv4eaAKH1yg' },
  { id: 3, thumbnail: '/img/products/small/star-otc_thumb.jpg', url: 'https://www.youtube.com/watch?v=uv4eaAKH1yg' }
]);

const playVideo = (url) => {
  window.open(url, '_blank');
};

// Optional: You can use onMounted to set the initial component explicitly
onMounted(() => {
    currentComponent.value = 'PriceCalculator';
});
</script>

<template>
    <section id="product-detail" class="about">
        <div class="price-circle">{{ formatPrice(product.total_price) }} €</div>
        <div class="container">
            <div class="d-block d-md-none">
                <div class="section-links flex-column">
                    <h1 style="margin-left: -90px;">{{ formatProductName(product.name) }}</h1>
                    <div style="margin-left: -120px;" class="product-stats-mobile text-left">
                        <span class="rating">
                            <i class="bi bi-star-fill" style="color: #DA913C;"></i>
                            4.9
                        </span>
                        <span class="reviews">58+ Reviews • </span>
                        <span class="sold" v-for="(count, baseName) in soldItems" :key="baseName"><span
                                v-if="baseName === product.base_name">{{ count }}</span></span>
                        <span>+ sold</span>

                    </div>
                    <button @click="goBack" class="btn-back mt-3">
                        <i class="bi bi-arrow-left-circle-fill"></i>
                        <span class="back-btn-label">{{ $t("products.back_button") }}</span>
                    </button>

                    <button @click="goBack" class="btn-back-mobile mt-3">
                        <i class="bi bi-arrow-left-circle"></i>
                    </button>
                    <button @click="toggleFavorites" class="btn-favorites-mobile mt-3">
                        <i class="bi bi-bookmark-heart"></i>
                    </button>

                    <div class="section-title mt-2">
                        <a :href="`/products/${product.slug}/pdf`" class="pdf-download-link ml-2" target="_blank">
                            {{ $t("products.product_data_sheet") }}
                            <i class="bi bi-file-pdf-fill"></i>
                        </a>
                        <!-- <h2>{{ $t("products.target_audience_title") }}</h2> -->
                        <p>{{ $t(`${product.slug}.product_description`) }}</p>
                        <div style="margin-top: 20px;">
                            <span class="modern-title">Industries That Can Benefit</span>
                            <div class="columns">
                                <ul v-for="(column, index) in chunkedIndustries" :key="index">
                                <li v-for="industry in column" :key="industry">{{ industry }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sticky-bar">
                    <a href="/" class="sticky-bar-icon">
                        <i class="bi bi-house"></i>
                    </a>
                    <a href="/price-calculator" class="sticky-bar-icon">
                        <i class="bi bi-calculator"></i>
                    </a>
                    <a href="/get-a-quote" class="sticky-bar-icon">
                        <i class="bi bi-chat-left-quote"></i>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 d-flex align-items-stretch justify-content-center justify-content-lg-start">
                    <!-- BEGIN LEFT SIDBAR -->
                    <div class="d-flex flex-column">
                        <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                            <product-detail-gallery :product="product" />
                        </div>
                        <div class="row no-gutters mt-2">
                        </div>
                        <div class="row categories-list">
                            <div class="service-details specification">
                                <product-specification :product="product" />
                            </div>
                        </div>
                    </div>
                </div> <!-- END LEFT SIDBAR -->
                <!--  end col-lg-4  -->
                <div class="col-lg-8 d-flex flex-column align-items-stretch"> <!-- BEGIN RIGHT CONTNENT COLUMN -->
                    <div class="content ps-lg-4 d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"> <!-- BEGIN OF RIGHT CONTNENT COLUMN -->
                                <h1 class="product-title">{{ formatProductNameLarge(product.name) }}</h1>
                                <div class="product-stats mt-1">
                                    <span class="rating">
                                        <i class="bi bi-star-fill" style="color: #DA913C;"></i>
                                        4.9
                                    </span>
                                    <span class="reviews">58+ Reviews • </span>
                                    <span class="sold" v-for="(count, baseName) in soldItems" :key="baseName"><span
                                            v-if="baseName === product.base_name">{{ count }}</span></span>
                                    <span>+ sold </span>
                                    <a :href="`/products/${product.slug}/pdf`" class="pdf-download-link ml-2"
                                        target="_blank">
                                        {{ $t("products.product_data_sheet") }} <i class="bi bi-file-pdf-fill"></i>
                                    </a>
                                </div>
                                <div class="for-whom">
                                    <div class="d-none d-md-block">
                                        <div class="section-title mt-6">
                                            <!-- <h2>{{ $t("products.target_audience_title") }}</h2> -->
                                            {{ $t(`${product.slug}.product_description`) }}
                                        </div>

                                        <div style="margin-top: 20px;">
                                            <span class="modern-title">Industries That Can Benefit</span>
                                            <div class="columns">
                                                <ul v-for="(column, index) in chunkedIndustries" :key="index">
                                                <li v-for="industry in column" :key="industry" class="list-item">{{ industry }}</li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- END OF RIGHT CONTNENT COLUMN -->


                            <div class="col-lg-6 calc" style="position: relative;">
                                <div class="component-wrapper"><!-- wrapper -->
                                    <!-- Phantom div for maintaining layout structure -->
                                    <div class="phantom-div"></div>
                                    <!-- BEGIN OF LEFT CONTENT COLUMN -->
                                    <transition name="fade" mode="out-in">
                                        <price-calculator v-if="currentComponent === 'PriceCalculator'"
                                            :baseName="product?.base_name" :slug="product?.slug"
                                            :price="product?.total_price" :version="product?.version"
                                            :type="product?.type" key="price-calculator" />
                                    </transition>

                                    <transition name="fade" mode="out-in">
                                        <help-chat v-if="currentComponent === 'HelpChat'" key="help-chat" />
                                    </transition>

                                    <transition name="fade" mode="out-in">
                                        <help-sidebar v-if="currentComponent === 'HelpSidebar'"
                                            :page_or_slug="product?.slug" key="help-sidebar" />
                                    </transition>
                                </div><!-- wrapper -->
                                <div class="contact-bar">
                                    <span class="open-window" @click="showHelpSidebar"><i
                                            class="bi bi-clipboard-data"></i> {{ $t("contact.bar.quote") }}</span>
                                    &nbsp;&nbsp;
                                    <!-- <span class="open-window" @click="showHelpChat"><i class="bi bi-chat"></i>
                                        Seller</span>
                                    &nbsp;&nbsp; -->
                                    <span class="open-window" @click="shareProduct"><i class="bi bi-share"></i>
                                        {{ $t("contact.bar.share") }}</span>
                                    &nbsp;&nbsp;
                                    <span class="open-window" @click="showPriceCalculator"><i
                                            class="bi bi-calculator"></i> {{ $t("contact.bar.calculator") }}</span>
                                </div>


                                <!-- Video Section -->
                                <div class="video-section">
                                    <div class="video-container" v-for="video in videos" :key="video.id">
                                    <div class="video-thumbnail" @click="playVideo(video.url)">
                                        <img :src="video.thumbnail" alt="Video Thumbnail" />
                                        <div class="play-button">
                                            <i class="bi bi-play-fill"></i>
                                        </div>
                                    </div>
                                    </div>
                                </div>


                            </div> <!-- END OF LEFT CONTENT COLUMN -->
                        </div>
                    </div>
                    <!-- End .content-->
                </div> <!-- END RIGHT CONTNENT COLUMN -->
            </div>
        </div> <!-- END Container -->
    </section>
    <!-- End About Me Section -->
    <!-- <div>
        <fab-button @click="showForm = true" />
        <transition name="slide-in">
            <help-sidebar v-if="showForm" />
        </transition>
    </div> -->

    <CookieBanner v-if="showBanner" @hideBanner="showBanner = false" @showManageBanner="showConfigBanner = true"
        @showPolicyBanner="showPolicyBanner = true" />

    <ManageCookieBanner v-if="showConfigBanner" @hideConfigBanner="showConfigBanner = false"
        @hideBothBanner="showBanner = false, showConfigBanner = false" />

    <PolicyBanner v-if="showPolicyBanner" @hide-policy-banner="showPolicyBanner = false" />
</template>

<style scoped>
.video-section {
  display: flex;
  justify-content: space-between;
  margin-top: 20px;
}

.video-container {
  width: 30%;
}

.video-thumbnail {
  position: relative;
  cursor: pointer;
}

.video-thumbnail img {
  width: 100%;
  height: auto;
  border-radius: 8px;
}

.play-button {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: rgba(0, 0, 0, 0.7);
  border-radius: 50%;
  width: 60px;
  height: 60px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 2em;
}

.columns {
  display: flex;
  justify-content: space-between;
}

.columns ul {
  list-style-type: none;
  padding: 0;
  width: 48%;
}

.list-item {
  line-height: 0.9; /* Reduzierte Zeilenhöhe */
  margin-bottom: 5px; /* Optional: Abstand zwischen den Listenelementen */
}

.modern-title {
  display: inline-block;
  background-color: #cc0926;
  color: white;
  padding: 6px 9px;
  border-radius: 8px;
  font-size: 1.1em;
  font-weight: bold;
  text-align: center;
  width: 100%;
  margin-bottom: 10px;
}


#product-detail {
    background-color: #fbfbfb;
}

.component-wrapper {
    position: relative;
    min-height: 400px;
    /* Same height as the components */
    min-width: 370px;
    /* Same width as the components */
}

.component-wrapper>.card {
    position: absolute;
    width: 100%;
    top: 0;
    left: 0;
}

.contact-bar {
    background-color: #424242;
    background-image: linear-gradient(to bottom, #424242, #161519);
    color: #FFFFFF;
    font-size: 12px;
    font-weight: bold;
    padding: 20px;
    margin-top: 40px;
    margin-left: 20px;
    border-radius: 10px;
    width: 100%;
    display: flex;
    /* Aktiviert Flexbox */
    justify-content: space-between;
    /* Verteilt die Elemente gleichmäßig */
    align-items: center;
    /* Zentriert die Elemente vertikal */
    padding: 10px;
    /* Optional: Innenabstand hinzufügen */
}

.contact-bar i {
    font-size: 18px;
    color: #dce3ee;
}

.phantom-div {
    width: 100%;
    height: 100%;
    visibility: hidden;
    /* Makes it invisible */
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
    position: absolute;
    width: 100%;
}

.fade-enter,
.fade-leave-to

/* .fade-leave-active in <2.1.8 */
    {
    opacity: 0;
}

.pdf-download-link {
    color: #e21414;
    text-decoration: none;
    font-size: 16px;
}
.pdf-download-link i {
    font-size: 31px;
}
.open-window {
    cursor: pointer;
    color: #c4ccd8;
    font-size: 18px;
}

.open-window:hover {
    text-decoration: underline;
}

.product-title {
    font-weight: bold;
    font-size: 18px;
}

.calc {
    margin-top: -23px;
}

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

.for-whom {
    margin-top: 64px;
}

@media (min-width: 992px) {
    .pdf-download-link {
        margin-left: 26px;
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

.product-stats-mobile {
    display: none;
    /* Standardmäßig ausblenden */
    font-size: 11px;
    margin-top: -10px;
    position: absolute;
}

.product-stats {
    font-size: 11px;
    margin-top: -10px;
    position: absolute;
}

.sticky-bar {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: #121313;
    padding: 10px;
    display: flex;
    justify-content: space-around;
    z-index: 1000;
}

.sticky-bar-icon {
    font-size: 20px;
    color: #fff;
}

@media (max-width: 767.98px) {
    .pdf-download-link {
        font-size: 12px;
    }
    .product-stats-mobile {
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

    .section-title {
        font-size: 12px;
    }
    .section-title p {
        font-size: 12px;
        font-weight: normal;
        text-transform: capitalize;
    }

    .service-details.specification {
        margin-top: -15px;
    }



    .component-wrapper>.card {
        position: absolute;
        max-width: 84%;
        left: 0;
        margin-top: 21px;
    }

    .contact-bar {
        display: flex;
        max-width: 88%;
        margin-top: 35px;
        margin-bottom: 30px;
    }

    .contact-bar i {
        font-size: 14px;
        color: #dce3ee;
    }

    .calc {
        width: 99%;
    }



}
</style>
