vue
<script setup>
import LegalLayout from '@/Layouts/LegalLayout.vue';
import HelpSidebar from "@/Components/Layouts/Layout1/Sidebar/HelpSidebar.vue";
import { useI18n } from 'vue-i18n';
const { locale } = useI18n();
</script>

<template>
    <div>
        <LegalLayout title="imprint">
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
                                <h1>{{ $t('imprint.title') }}</h1>
                                <h2>{{ $t('imprint.azm-france') }}</h2>

                                <div class="impressum-content mt-4">
                                    <p>{{ $t('imprint.address') }}</p>
                                    <p>{{ $t('imprint.phone.france') }}</p>
                                    <p>{{ $t('imprint.siret.1') }}</p>
                                    <p>{{ $t('imprint.tva') }}</p>
                                    <hr>
                                    <p>{{ $t('imprint.capital') }}</p>
                                    <p>{{ $t('imprint.headquarter') }}</p>
                                    <p>{{ $t('imprint.phone.headquarter') }}</p>
                                    <p>{{ $t('imprint.nrt') }}</p>
                                    <hr>
                                    <p>{{ $t('imprint.fiscal') }}</p>
                                    <p>{{ $t('imprint.nvotf') }}</p>
                                    <p>{{ $t('imprint.siret.2') }} 509 902 722</p>
                                    <hr>
                                    <p>{{ $t('imprint.ceo') }}</p>
                                    <hr>
                                    <p>{{ $t('imprint.property') }}</p>
                                </div> <!-- END impressum-content -->
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
}
.impressum-content p {
    margin-bottom: 1rem; /* Abstand zwischen den Absätzen */
}

.impressum-content hr {
    margin: 2rem 0; /* Abstand zwischen den Abschnitten */
}
@media screen and (max-width: 767px) {
    h1 {
        margin-top: 20px;
    }
}
</style>
