vue
<script setup>
import LegalLayout from '@/Layouts/LegalLayout.vue';
import HelpSidebar from "@/Components/Layouts/Layout1/Sidebar/HelpSidebar.vue";
import { useI18n } from 'vue-i18n';
const { locale } = useI18n();
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
