<script setup>
import LegalLayout from '@/Layouts/LegalLayout.vue';
import HelpSidebar from "@/Components/Layouts/Layout1/Sidebar/HelpSidebar.vue";
import { useI18n } from 'vue-i18n';
import { ref, onMounted } from 'vue';
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
        <LegalLayout title="cookie policy">
            <section id="page-title" class="about">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-lg-4 d-flex align-items-stretch justify-content-center justify-content-lg-start">
                            <!-- BEGIN LEFT SIDBAR -->
                            <div class="row categories-list">
                                <div class="service-details">
                                      <HelpSidebar :phone_number="phone_number" />
                                </div>
                            </div>
                        </div> <!-- END LEFT SIDBAR -->
                        <div class="col-lg-8 d-flex flex-column align-items-stretch"> <!-- BEGIN RIGHT SIDBAR -->
                            <div class="container">
                                <h1>Cookie Policy</h1>
                                <h2>AZ Machinery France</h2>

                            </div> <!-- END container -->
                        </div> <!-- END RIGHT SIDBAR -->
                    </div> <!-- END row -->
                </div> <!-- END Container -->
            </section>
            <CookieBanner v-if="showBanner" @hideBanner="showBanner = false" @showManageBanner="showConfigBanner = true"
        @showPolicyBanner="showPolicyBanner = true" />

    <ManageCookieBanner v-if="showConfigBanner" @hideConfigBanner="showConfigBanner = false"
        @hideBothBanner="showBanner = false, showConfigBanner = false" />

    <PolicyBanner v-if="showPolicyBanner" @hide-policy-banner="showPolicyBanner = false" />
        </LegalLayout>
    </div>
</template>

<style scoped></style>
