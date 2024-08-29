<script setup>
import HeaderSection from '@/Components/Layouts/Layout1/HeaderSection.vue';
import HeroSection from '@/Components/Layouts/Layout1/HeroSection.vue';
import AboutSection from '@/Components/Layouts/Layout1/AboutSection.vue';
import ClientSection from '@/Components/Layouts/Layout1/ClientSection.vue';
import TabSection from '@/Components/Layouts/Layout1/TabSection.vue';
import FaqSection from '@/Components/Layouts/Layout1/FaqSection.vue';
import FooterSection from '@/Components/Layouts/Layout1/FooterSection.vue';
import TestimonialsSection from '@/Components/Layouts/Layout1/TestimonialsSection.vue';
import CookieBanner from '@/Shared/Cookiebanner/CookieBanner.vue';
import ManageCookieBanner from '@/Shared/Cookiebanner/ManageCookieBanner.vue';
import PolicyBanner from '@/Shared/Cookiebanner/PolicyBanner.vue';
import { posthogModule } from '../plugins/posthog'
import { ref } from "vue";

const isModalOpen = ref(false);
const iframeLink = ref('');

const openModal = (payload) => {
    if (window.location.hostname === 'public.test') {
        iframeLink.value = "http://localhost:8081/?type=" + payload.message;
    } else {
        iframeLink.value = "https://flowform.rampas-carga-moviles.es/?type=" + payload.message;
    }
    isModalOpen.value = true;
}

const closeModal = () => {
    isModalOpen.value = false
};

// show banner depending on posthog opt in or out
const showBanner = ref(!(posthogModule.posthog.has_opted_out_capturing() || posthogModule.posthog.has_opted_in_capturing()));

const showConfigBanner = ref(false)

const showPolicyBanner = ref(false)
</script>

<template>

    <Head>
        <title>{{ $t('meta.title') }}</title>
    </Head>
    <HeaderSection />
    <HeroSection @open-modal="openModal" />
    <main id="main">
        <ClientSection />
        <TabSection />
        <AboutSection />
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

    <div v-if="isModalOpen" class="modal cinematic-modal show" :style="{ display: isModalOpen ? 'block' : 'none' }">
        <div class="modal-header">
         </div>
        <div class="modal-content">
            <iframe :src="iframeLink" frameborder="0" class="modal-iframe"></iframe>
        </div>
        <div class="modal-footer">
            <button @click="closeModal" type="button" class="btn btn-secondary">{{ $t('modal.close-button') }}</button>
        </div>
    </div>
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
