<script setup>
import CategorySidebar from "../../../Components/Layouts/Layout1/Sidebar/CategorySidebar.vue";
import HelpSidebar from "../../../Components/Layouts/Layout1/Sidebar/HelpSidebar.vue";
import { ref, computed } from "vue";
import { useI18n } from 'vue-i18n';
import CookieBanner from '@/Shared/Cookiebanner/CookieBanner.vue';
import ManageCookieBanner from '@/Shared/Cookiebanner/ManageCookieBanner.vue';
import PolicyBanner from '@/Shared/Cookiebanner/PolicyBanner.vue';
import { posthogModule } from '@/plugins/posthog';
import { getLocalizedSlug } from '@/utils/localizedSlugMixin';

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
            {{ product }}
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
    width: 12px; /* 3px width per dot + 1px margin-right per dot */
    height: 3px;
    margin-left: 5px; /* some space between text and dots */
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
    left: 5px; /* 3px width + 2px space */
    animation-delay: 2s;
}

.dot:nth-child(3) {
    left: 10px; /* 3px width * 2 + 2px space * 2 */
    animation-delay: 3s;
}

@keyframes dot-animation {
    0%, 100% {
        opacity: 0;
    }
    20%, 80% {
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
    border-radius: 50px;
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
    border-top-left-radius: 50px;
    /* Adjust border radius for left side */
    border-bottom-left-radius: 50px;
    /* Adjust border radius for left side */
    padding: 4px 0 4px 9px;
    /* Adjust padding as needed */
}

.right-side {
    width: 9%;
    /* Set the width of the right side */
    justify-content: flex-end;
    /* Align text to the right */
    border-top-right-radius: 50px;
    /* Adjust border radius for right side */
    border-bottom-right-radius: 50px;
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
    background-color: #333333;
    /* Dark grey color for the left side */
    color: #dbd9d9;
    /* Light font color */
}

.left-color-2,
.left-color-4,
.left-color-6,
.left-color-8,
.left-color-10 {
    background-color: #bbb1ac;
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
    background-color: #ff6666;
    /* Light red color for the right side */
    color: #333333;
    /* Dark font color */
}

.right-color-2,
.right-color-4,
.right-color-6,
.right-color-8,
.right-color-10 {
    background-color: #ff9999;
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
