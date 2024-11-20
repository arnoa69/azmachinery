vue
<script setup>
import LegalLayout from '@/Layouts/LegalLayout.vue';
import HelpSidebar from "@/Components/Layouts/Layout1/Sidebar/HelpSidebar.vue";
import { useI18n } from 'vue-i18n';
import { ref, onMounted } from 'vue'
import { posthogModule } from '@/plugins/posthog';
import { hasConsentBeenGiven } from '@/services/cookieConsentService';
import CookieBanner from '@/Shared/Cookiebanner/CookieBanner.vue';
import ManageCookieBanner from '@/Shared/Cookiebanner/ManageCookieBanner.vue';
import PolicyBanner from '@/Shared/Cookiebanner/PolicyBanner.vue';

const { locale } = useI18n();
const phone_number = ref('');
const showBanner = ref(true);
const showConfigBanner = ref(false)
const showPolicyBanner = ref(false)

onMounted(() => {
    showBanner.value = !hasConsentBeenGiven();
    posthogModule.posthog // Initialize PostHog
});
</script>

<template>
    <div>
        <LegalLayout title="Privacy Policy">
            <section id="page-title" class="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 d-flex align-items-stretch justify-content-center justify-content-lg-start">
                            <!-- BEGIN LEFT SIDEBAR -->
                            <div class="row categories-list">
                                <div class="service-details">
                                    <HelpSidebar :phone_number="phone_number" />
                                </div>
                            </div>
                        </div> <!-- END LEFT SIDEBAR -->
                        <div class="col-lg-8 d-flex flex-column align-items-stretch"> <!-- BEGIN RIGHT SIDEBAR -->
                            <div class="container">
                                <h1>{{ $t('privacy.title.1') }}</h1>
                                <h2>{{ $t('privacy.subtitle.1') }}</h2>
                                <p>{{ $t('privacy.content.1') }}</p>

                                <h3>{{ $t('privacy.title.2') }}</h3>
                                <p>{{ $t('privacy.content.2') }}</p>

                                <h3>{{ $t('privacy.title.3') }}</h3>
                                <p>{{ $t('privacy.content.3') }}</p>

                                <h3>{{ $t('privacy.title.4') }}</h3>
                                <p>{{ $t('privacy.content.4') }}</p>

                                <h3>{{ $t('privacy.title.5') }}</h3>
                                <p>{{ $t('privacy.content.5') }}</p>

                                <h3>{{ $t('privacy.title.6') }}</h3>
                                <p>{{ $t('privacy.content.6') }}</p>
                                <p>{{ $t('privacy.email') }}</p>
                                <p>{{ $t('privacy.phone') }}</p>
                            </div> <!-- END container -->
                        </div> <!-- END RIGHT SIDEBAR -->
                    </div> <!-- END row -->
                </div> <!-- END Container -->
            </section>
        </LegalLayout>
        <CookieBanner v-if="showBanner" @hideBanner="showBanner = false" @showManageBanner="showConfigBanner = true"
        @showPolicyBanner="showPolicyBanner = true" />

    <ManageCookieBanner v-if="showConfigBanner" @hideConfigBanner="showConfigBanner = false"
        @hideBothBanner="showBanner = false, showConfigBanner = false" />

    <PolicyBanner v-if="showPolicyBanner" @hide-policy-banner="showPolicyBanner = false" />
    </div>
</template>

<style scoped>
h1 {
    font-size: 33px !important;
    font-weight: 700;
    color: #333;
}

h2 {
    margin-top: 10px;
    font-size: 2rem;
    color: #555;
}

h3 {
    margin-top: 20px;
    font-size: 1.5rem;
    color: #777;
}

p {
    margin-bottom: 1rem;
    line-height: 1.6;
    color: #444;
}
@media screen and (max-width: 767px) {
    h1 {
        margin-top: 20px;
    }
}
</style>
