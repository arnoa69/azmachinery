<script setup>
import HeaderSection from '@/Components/Layouts/Layout1/HeaderSection.vue';
import HeroSection from '@/Components/Layouts/Layout1/HeroSection.vue';
import PresentationSection from '@/Components/Layouts/Layout1/PresentationSection.vue';
import AboutSection from '@/Components/Layouts/Layout1/AboutSection.vue';
import ShortRampsSection from '@/Components/Layouts/Layout1/ShortRampsSection.vue';
import ClientSection from '@/Components/Layouts/Layout1/ClientSection.vue';
import TabSection from '@/Components/Layouts/Layout1/TabSection.vue';
import FaqSection from '@/Components/Layouts/Layout1/FaqSection.vue';
import FooterSection from '@/Components/Layouts/Layout1/FooterSection.vue';
import TestimonialsSection from '@/Components/Layouts/Layout1/TestimonialsSection.vue';
import CookieBanner from '@/Shared/Cookiebanner/CookieBanner.vue';
import ManageCookieBanner from '@/Shared/Cookiebanner/ManageCookieBanner.vue';
import PolicyBanner from '@/Shared/Cookiebanner/PolicyBanner.vue';
import { posthogModule } from '../plugins/posthog';
import { hasConsentBeenGiven } from '../services/cookieConsentService';
import { ref, onMounted } from "vue";

const showBanner = ref(true);
const showConfigBanner = ref(false)
const showPolicyBanner = ref(false)

onMounted(() => {
    showBanner.value = !hasConsentBeenGiven();
    posthogModule.posthog // Initialize PostHog
});

</script>

<template>
    <Head>
        <title>{{ $t('meta.title') }}</title>
    </Head>
    <HeaderSection />
    <HeroSection />
    <main id="main">
        <ClientSection />
        <AboutSection />
        <TabSection />
        <PresentationSection />
        <ShortRampsSection />
        <TestimonialsSection />
        <FaqSection />
    </main>
    <FooterSection />
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Preloader -->
  <!-- <div id="preloader"></div> -->
    <CookieBanner v-if="showBanner" @hideBanner="showBanner = false" @showManageBanner="showConfigBanner = true"
        @showPolicyBanner="showPolicyBanner = true" />

    <ManageCookieBanner v-if="showConfigBanner" @hideConfigBanner="showConfigBanner = false"
        @hideBothBanner="showBanner = false, showConfigBanner = false" />

    <PolicyBanner v-if="showPolicyBanner" @hide-policy-banner="showPolicyBanner = false" />


</template>

<style scoped>
.cinematic-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #000;
}

.cinematic-modal .modal-content {
    position: absolute;
    top: 48%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #000;
    padding: 20px;
    border-radius: 10px;
    width: 89%;
    height: 89%;
}

.modal-iframe {
    width: 100%;
    height: calc(100% - 100px);
    border: 0;
    border-radius: 18px;
    flex: 1;
}

.modal-header {
    position: absolute;
    top: 0;
    width: 100%;
    padding: 10px;
    background-color: #000;
    color: white;
    border: 0;
}

.modal-title {
    font-size: 20px;
    font-weight: bold;
    margin-left: 7%;
}

.modal-footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    background-color: #000;
    padding: 10px;
    text-align: right;
    border: 0;
}

.btn-secondary {
    background-color: #fff;
    color: #000;
    border: none;
}

.leave-icon {
    position: fixed;
    bottom: 10px;
    right: 10px;
    z-index: 999;
    background-color: #000;
    color: #fff;
    border-radius: 50%;
    padding: 10px;
}
</style>
