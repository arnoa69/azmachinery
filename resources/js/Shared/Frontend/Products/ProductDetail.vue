<script setup>
import CategorySidebar from "../../../Components/Layouts/Layout1/Sidebar/CategorySidebar.vue";
import HelpSidebar from "../../../Components/Layouts/Layout1/Sidebar/HelpSidebar.vue";
import { ref, computed } from "vue";
import { useI18n } from 'vue-i18n';
import CookieBanner from '@/Shared/Cookiebanner/CookieBanner.vue';
import ManageCookieBanner from '@/Shared/Cookiebanner/ManageCookieBanner.vue';
import PolicyBanner from '@/Shared/Cookiebanner/PolicyBanner.vue';
import { posthogModule } from '@/plugins/posthog';

const { locale } = useI18n();

const phone_number = ref('');
const props = defineProps({
    product: {
        type: Object,
        required: true,
    }
});


const goBack = () => {
    window.history.back();
}

const formatMessage = (message) => {
    return message.replace(/\*(.*?)\*/g, "<strong>$1</strong>");
};

const showBanner = ref(!(posthogModule.posthog.has_opted_out_capturing() || posthogModule.posthog.has_opted_in_capturing()));
const showConfigBanner = ref(false)
const showPolicyBanner = ref(false)

</script>

<template>
    <section id="product-detail" class="about">
        <div class="container">
            <div class="section-links">
                <button @click="goBack" class="btn-back">
                    <i class="bi bi-arrow-left-circle-fill"></i> <span class="back-btn-label">{{
                    $t("products.back_button") }}</span>
                </button>
            </div>
            <div class="row">
                <div class="col-lg-4 d-flex align-items-stretch justify-content-center justify-content-lg-start">
                    <!-- BEGIN LEFT SIDBAR -->
                    <div class="d-flex flex-column">
                        <div class="row">
                            <div class="service-details">
                                <div class=" service-box">
                                    <img class="pic" :src="`/img/products/normal/rampes-star_org.jpg`"
                                        :alt="$t(`products.${product.product_code}.layout1.product_name`)" />
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters mt-2">
                        </div>
                        <div class="row categories-list">
                            <div class="service-details">
                                <CategorySidebar /> <!-- Component CategorySidebar.vue -->
                                <HelpSidebar :product_code="product.product_code" />
                            </div>
                        </div>
                        <div class="row">
                            <div
                                class="col-lg-12 d-flex justify-content-center product-img align-items-stretch position-relative">
                                <a href="https://www.youtube.com/watch?v=K7FVp6UbXi8"
                                    class="glightbox play-btn mb-4">.</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- END LEFT SIDBAR -->
                <!--  end col-lg-4  -->
                <div class="col-lg-8 d-flex flex-column align-items-stretch"> <!-- BEGIN RIGHT CONTNENT COLUMN -->
                    <div class="content ps-lg-4 d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-lg-6"> <!-- BEGIN OF LEFT CONTNENT COLUMN -->
                                <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="left-side left-color-1">
                                        {{ $t("products.weight_capacity", { tonnes: product.weight_capacity }) }}
                                    </div>
                                    <div class="right-side right-color-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-minecart-loaded" viewBox="0 0 16 16">
                                            <path
                                                d="M4 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2m0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4m8-1a1 1 0 1 1 0-2 1 1 0 0 1 0 2m0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4M.115 3.18A.5.5 0 0 1 .5 3h15a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 14 12H2a.5.5 0 0 1-.491-.408l-1.5-8a.5.5 0 0 1 .106-.411zm.987.82 1.313 7h11.17l1.313-7z" />
                                            <path fill-rule="evenodd"
                                                d="M6 1a2.498 2.498 0 0 1 4 0c.818 0 1.545.394 2 1 .67 0 1.552.57 2 1h-2c-.314 0-.611-.15-.8-.4-.274-.365-.71-.6-1.2-.6-.314 0-.611-.15-.8-.4a1.497 1.497 0 0 0-2.4 0c-.189.25-.486.4-.8.4-.507 0-.955.251-1.228.638q-.136.194-.308.362H3c.13-.147.401-.432.562-.545a1.6 1.6 0 0 0 .393-.393A2.5 2.5 0 0 1 6 1" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="left-side left-color-2">
                                        {{ $t("products.width_used", { width_used: product.width_used }) }}
                                    </div>
                                    <div class="right-side right-color-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                            fill="currentColor" class="bi bi-arrows-vertical" viewBox="0 0 16 16">
                                            <path
                                                d="M8.354 14.854a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 13.293V2.707L6.354 3.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 2.707v10.586l1.146-1.147a.5.5 0 0 1 .708.708z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="left-side left-color-3">
                                        {{ $t("products.total_width", { total_width: product.total_width }) }}
                                    </div>
                                    <div class="right-side right-color-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                            fill="currentColor" class="bi bi-arrows-vertical" viewBox="0 0 16 16">
                                            <path
                                                d="M8.354 14.854a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 13.293V2.707L6.354 3.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 2.707v10.586l1.146-1.147a.5.5 0 0 1 .708.708z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="left-side left-color-4">
                                        {{ $t("products.total_length", { total_length: product.total_length }) }}
                                    </div>
                                    <div class="right-side right-color-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                            fill="currentColor" class="bi bi-arrows" viewBox="0 0 16 16">
                                            <path
                                                d="M1.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L2.707 7.5h10.586l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L13.293 8.5H2.707l1.147 1.146a.5.5 0 0 1-.708.708z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="left-side left-color-5">
                                        {{ $t("products.length_inclined_plane", { length: product.length_inclined_plane }) }}
                                    </div>
                                    <div class="right-side right-color-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                            fill="currentColor" class="bi bi-arrows" viewBox="0 0 16 16">
                                            <path
                                                d="M1.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L2.707 7.5h10.586l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L13.293 8.5H2.707l1.147 1.146a.5.5 0 0 1-.708.708z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="left-side left-color-6">
                                        {{ $t("products.length_plateform_horizontal", { length: product.length_plateform_horizontal }) }}
                                    </div>
                                    <div class="right-side right-color-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                            fill="currentColor" class="bi bi-arrows" viewBox="0 0 16 16">
                                            <path
                                                d="M1.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L2.707 7.5h10.586l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L13.293 8.5H2.707l1.147 1.146a.5.5 0 0 1-.708.708z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="left-side left-color-7">
                                        {{ $t("products.length_lip_penetrating", { length: product.length_lip_penetrating }) }}
                                    </div>
                                    <div class="right-side right-color-7">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                            fill="currentColor" class="bi bi-arrows" viewBox="0 0 16 16">
                                            <path
                                                d="M1.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L2.707 7.5h10.586l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L13.293 8.5H2.707l1.147 1.146a.5.5 0 0 1-.708.708z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="left-side left-color-8">
                                        {{ $t("products.exit_lip_length", { length: product.exit_lip_length }) }}
                                    </div>
                                    <div class="right-side right-color-8">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                            fill="currentColor" class="bi bi-arrows" viewBox="0 0 16 16">
                                            <path
                                                d="M1.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L2.707 7.5h10.586l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L13.293 8.5H2.707l1.147 1.146a.5.5 0 0 1-.708.708z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="left-side left-color-9">
                                        {{ $t("products.slope_min_max", { min_slope: product.slope_min, max_slope: product.slope_max }) }}
                                    </div>
                                    <div class="right-side right-color-9">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-slash-lg" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="left-side left-color-10">
                                        {{ $t("products.lifting_height", { min_height: product.min_height, max_height: product.max_height }) }}
                                    </div>
                                    <div class="right-side right-color-10">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-align-top" viewBox="0 0 16 16">
                                            <rect width="4" height="12" rx="1" transform="matrix(1 0 0 -1 6 15)" />
                                            <path d="M1.5 2a.5.5 0 0 1 0-1zm13-1a.5.5 0 0 1 0 1zm-13 0h13v1h-13z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="left-side left-color-11">
                                        {{ $t("products.unloaded_weight", { weight: product.unloaded_weight }) }}
                                    </div>
                                    <div class="right-side right-color-11">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-minecart" viewBox="0 0 16 16">
                                            <path
                                                d="M4 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2m0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4m8-1a1 1 0 1 1 0-2 1 1 0 0 1 0 2m0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4M.115 3.18A.5.5 0 0 1 .5 3h15a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 14 12H2a.5.5 0 0 1-.491-.408l-1.5-8a.5.5 0 0 1 .106-.411zm.987.82 1.313 7h11.17l1.313-7z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="left-side left-color-2">
                                        {{ $t("products.support_feet", { feet: product.amount_feet }) }}
                                    </div>
                                    <div class="right-side right-color-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-align-bottom" viewBox="0 0 16 16">
                                            <rect width="4" height="12" x="6" y="1" rx="1" />
                                            <path d="M1.5 14a.5.5 0 0 0 0 1zm13 1a.5.5 0 0 0 0-1zm-13 0h13v-1h-13z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="left-side left-color-3">
                                        {{ $t("products.side_railings", { height: product.side_railings_height }) }}
                                    </div>
                                    <div class="right-side right-color-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                            fill="currentColor" class="bi bi-arrows-vertical" viewBox="0 0 16 16">
                                            <path
                                                d="M8.354 14.854a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 13.293V2.707L6.354 3.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 2.707v10.586l1.146-1.147a.5.5 0 0 1 .708.708z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="left-side left-color-6">
                                        {{ $t("products.security_chaines") }}
                                    </div>
                                    <div class="right-side right-color-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-shield-check" viewBox="0 0 16 16">
                                            <path
                                                d="M5.338 1.59a61 61 0 0 0-2.837.856.48.48 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.7 10.7 0 0 0 2.287 2.233c.346.244.652.42.893.533q.18.085.293.118a1 1 0 0 0 .101.025 1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56" />
                                            <path
                                                d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                                        </svg>
                                    </div>
                                </div>
                            </div> <!-- END OF LEFT CONTNENT COLUMN -->
                            <div class="col-lg-6"> <!-- BEGIN OF RIGHT CONTNENT COLUMN -->
                                <div class="for-whom mt-2">
                                    <div class="section-title">
                                        <h2>{{ $t("products.target_audience_title") }}</h2>
                                    </div>
                                    <ul>
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
                                    </ul>
                                </div>
                            </div> <!-- END OF RIGHT CONTNENT COLUMN -->
                        </div>
                        <div class="row mt-n3">
                            <div class="col-md-6 mt-5 d-md-flex align-items-md-stretch">
                                <div class="count-box">
                                    <i class="bi bi-emoji-smile" style="color: #20b38e"></i>
                                    <span class="feature-title">{{ $t("products.anti-slip-title") }}</span>
                                    <p v-html="formatMessage($t('products.anti-slip-description'))"></p>
                                </div>
                            </div>

                            <div class="col-md-6 mt-5 d-md-flex align-items-md-stretch">
                                <div class="count-box">
                                    <i class="bi bi-bag-check" style="color: #8a1ac2"></i>
                                    <span class="feature-title">{{ $t("products.rent-title") }}</span>
                                    <p v-html="formatMessage($t('products.rent-description'))"></p>
                                </div>
                            </div>

                            <div class="col-md-6 mt-5 d-md-flex align-items-md-stretch">
                                <div class="count-box">
                                    <i class="bi bi-award" style="color: #ffb459"></i>
                                    <span data-purecounter-start="0" data-purecounter-end="42"
                                        data-purecounter-duration="1" class="purecounter"></span>
                                    <p v-html="formatMessage($t('products.year_experience-description'))"></p>
                                </div>
                            </div>

                            <div class="col-md-6 mt-5 d-md-flex align-items-md-stretch">
                                <div class="count-box">
                                    <i class="bi bi-gem" style="color: #ffb459"></i>
                                    <span class="feature-title">{{
                                        $t("products.tailor_made_title")
                                        }}</span>
                                    <p v-html="formatMessage($t('products.tailor_made_description'))"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .content-->
                </div> <!-- END RIGHT CONTNENT COLUMN -->
            </div>
        </div> <!-- END Container -->
    </section>
    <!-- End About Me Section -->

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

.long-pill {
    display: inline-flex;
    border-radius: 5px;
    overflow: hidden;
    width: 100%;
    /* Set the total width of the long pill */
    margin-bottom: 2px;
}

.left-side,
.right-side {
    display: flex;
    align-items: center;
    color: white;
    font-weight: bold;
    font-size: 12px !important;
    /* Set the font size for the text */
    max-height: 25px;
}

.left-side {
    width: 91%;
    /* Set the width of the left side */
    justify-content: flex-start;
    /* Align text to the left */
    border-top-left-radius: 5px;
    /* Adjust border radius for left side */
    border-bottom-left-radius: 5px;
    /* Adjust border radius for left side */
    padding: 4px 0 4px 9px;
    /* Adjust padding as needed */
}

.right-side {
    width: 9%;
    /* Set the width of the right side */
    justify-content: flex-end;
    /* Align text to the right */
    border-top-right-radius: 5px;
    /* Adjust border radius for right side */
    border-bottom-right-radius: 5px;
    /* Adjust border radius for right side */
    background-color: #f6d0cf;
    color: #f8f2f2;
    padding: 4px 9px 4px 0;
    /* Adjust padding as needed */
}

.number-odd {
    font-weight: normal;
    color: #dbd9d9;
    margin-left: 3px;
}

.number-even {
    font-weight: normal;
    color: #111;
    margin-left: 3px;
}

.left-color-1,
.left-color-3,
.left-color-5,
.left-color-7,
.left-color-9,
.left-color-11 {
    background-color: #e0dfdf;
    /* Dark grey color for the left side */
    color: #111;
    /* Light font color */
}

.left-color-2,
.left-color-4,
.left-color-6,
.left-color-8,
.left-color-10 {
    background-color: #fff;
    /* Brighter grey color for the left side */
    color: #111;
    /* Light font color */
}

.right-color-1,
.right-color-3,
.right-color-5,
.right-color-7,
.right-color-9,
.right-color-11 {
    background-color: #e0dfdf;
    /* Light red color for the right side */
    color: #333333;
    /* Dark font color */
}

.right-color-2,
.right-color-4,
.right-color-6,
.right-color-8,
.right-color-10 {
    background-color: #fff;
    /* Lighter red color for the right side */
    color: #333333;
    /* Dark font color */
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
        font-size: 18px !important;
        margin-bottom: 20px;
    }

    .description {
        font-size: 14px;
    }
}

/* Add more classes for additional colors as needed */

@media (min-width: 992px) and (max-width: 1400px) {

    .left-side,
    .right-side {
        font-weight: normal;
        max-height: 25px;
    }

    .left-side {
        font-size: 10px;
        width: 88%;
    }

    .right-side {
        font-size: 10px;
        width: 12%;
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
}

.chip {
    padding: 5px 10px;
    border-radius: 20px;
    margin-right: 10px;
    font-weight: bold;
    color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-size: 13px;
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
</style>
