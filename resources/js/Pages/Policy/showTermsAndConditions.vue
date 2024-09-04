vue
<script setup>
import LegalLayout from '@/Layouts/LegalLayout.vue';
import HelpSidebar from "@/Components/Layouts/Layout1/Sidebar/HelpSidebar.vue";
import { useI18n } from 'vue-i18n';
const { locale } = useI18n();
</script>

<template>
    <div>
        <LegalLayout title="Terms and Conditions">
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
                                <h1>{{ $t('terms.title') }}</h1>
                                <h2>{{ $t('terms.subtitle') }}</h2>
                                <p>{{ $t('terms.content') }}</p>

                                <h2>{{ $t('terms.article.1.title') }}</h2>
                                <ol>
                                    <li>{{ $t('terms.article.1.list.1') }}</li>
                                    <li>{{ $t('terms.article.1.list.2') }}</li>
                                    <li>{{ $t('terms.article.1.list.3') }}</li>
                                    <li>{{ $t('terms.article.1.list.4') }}</li>
                                    <li>{{ $t('terms.article.1.list.5') }}</li>
                                </ol>

                                <h2>{{ $t('terms.article.2.title') }}</h2>
                                <ol>
                                    <li>{{ $t('terms.article.2.list.1') }}</li>
                                    <li>{{ $t('terms.article.2.list.2') }}</li>
                                    <li>{{ $t('terms.article.2.list.3') }}</li>
                                    <li>{{ $t('terms.article.2.list.4') }}</li>
                                    <li>{{ $t('terms.article.2.list.5') }}</li>
                                    <li>{{ $t('terms.article.2.list.6') }}</li>
                                </ol>

                                <h2>{{ $t('terms.article.3.title') }}</h2>
                                <ol>
                                    <li>{{ $t('terms.article.3.list.1') }}</li>
                                    <li>{{ $t('terms.article.3.list.2') }}</li>
                                    <li>{{ $t('terms.article.3.list.3') }}</li>
                                    <li>{{ $t('terms.article.3.list.4') }}</li>
                                </ol>

                                <h2>{{ $t('terms.article.4.title') }}</h2>
                                <ol>
                                    <li>{{ $t('terms.article.4.list.1') }}</li>
                                    <li>{{ $t('terms.article.4.list.2') }}</li>
                                    <li>{{ $t('terms.article.4.list.3') }}</li>
                                    <li>{{ $t('terms.article.4.list.4') }}</li>
                                </ol>

                                <h2>{{ $t('terms.article.5.title') }}</h2>
                                <ol>
                                    <li>{{ $t('terms.article.5.list.1') }}</li>
                                    <li>{{ $t('terms.article.5.list.2') }}</li>
                                    <li>{{ $t('terms.article.5.list.3') }}</li>
                                    <li>{{ $t('terms.article.5.list.4') }}</li>
                                    <li>{{ $t('terms.article.5.list.5') }}</li>
                                    <li>{{ $t('terms.article.5.list.6') }}</li>
                                    <li>{{ $t('terms.article.5.list.7') }}</li>
                                    <li>{{ $t('terms.article.5.list.8') }}</li>
                                    <li>{{ $t('terms.article.5.list.9') }}</li>
                                    <li>{{ $t('terms.article.5.list.10') }}</li>
                                    <li>{{ $t('terms.article.5.list.11') }}</li>
                                    <li>{{ $t('terms.article.5.list.12') }}</li>
                                    <li>{{ $t('terms.article.5.list.13') }}</li>
                                </ol>

                                <h2>{{ $t('terms.article.6.title') }}</h2>
                                <ol>
                                    <li>{{ $t('terms.article.6.list.1') }}</li>
                                    <li>{{ $t('terms.article.6.list.2') }}</li>
                                    <li>{{ $t('terms.article.6.list.3') }}</li>
                                    <li>{{ $t('terms.article.6.list.4') }}</li>
                                </ol>

                                <h2>{{ $t('terms.article.7.title') }}</h2>
                                <ol>
                                    <li>{{ $t('terms.article.7.list.1') }}</li>
                                    <li>{{ $t('terms.article.7.list.2') }}</li>
                                    <li>{{ $t('terms.article.7.list.3') }}</li>
                                    <li>{{ $t('terms.article.7.list.4') }}</li>
                                    <li>{{ $t('terms.article.7.list.5') }}</li>
                                    <li>{{ $t('terms.article.7.list.6') }}</li>
                                    <li>{{ $t('terms.article.7.list.7') }}</li>
                                    <li>{{ $t('terms.article.7.list.8') }}</li>
                                    <li>{{ $t('terms.article.7.list.9') }}</li>
                                    <li>{{ $t('terms.article.7.list.10') }}</li>
                                    <li>{{ $t('terms.article.7.list.11') }}</li>
                                    <li>{{ $t('terms.article.7.list.12') }}</li>
                                </ol>

                                <h2>{{ $t('terms.article.8.title') }}</h2>
                                <ol>
                                    <li>{{ $t('terms.article.8.list') }}</li>
                                </ol>

                                <h2>{{ $t('terms.article.9.title') }}</h2>
                                <ol>
                                    <li>{{ $t('terms.article.9.list.1') }}</li>
                                    <li>{{ $t('terms.article.9.list.2') }}</li>
                                    <li>{{ $t('terms.article.9.list.3') }}</li>
                                    <li>{{ $t('terms.article.9.list.4') }}</li>
                                    <li>{{ $t('terms.article.9.list.5') }}</li>
                                    <li>{{ $t('terms.article.9.list.6') }}</li>
                                    <li>{{ $t('terms.article.9.list.7') }}</li>
                                    <li>{{ $t('terms.article.9.list.8') }}</li>
                                    <li>{{ $t('terms.article.9.list.9') }}</li>
                                    <li>{{ $t('terms.article.9.list.10') }}</li>
                                </ol>

                                <h2>{{ $t('terms.article.10.title') }}</h2>
                                <ol>
                                    <li>{{ $t('terms.article.10.list.1') }}</li>
                                    <li>{{ $t('terms.article.10.list.2') }}</li>
                                    <li>{{ $t('terms.article.10.list.3') }}</li>
                                    <li>{{ $t('terms.article.10.list.4') }}</li>
                                    <li>{{ $t('terms.article.10.list.5') }}</li>
                                    <li>{{ $t('terms.article.10.list.6') }}</li>
                                    <li>{{ $t('terms.article.10.list.7') }}</li>
                                    <li>{{ $t('terms.article.10.list.8') }}</li>
                                    <li>{{ $t('terms.article.10.list.9') }}</li>
                                    <li>{{ $t('terms.article.10.list.10') }}</li>
                                    <li>{{ $t('terms.article.10.list.11') }}</li>
                                </ol>

                                <h2>{{ $t('terms.article.11.title') }}</h2>
                                <ol>
                                    <li>{{ $t('terms.article.11.list.1') }}</li>
                                    <li>{{ $t('terms.article.11.list.2') }}</li>
                                    <li>{{ $t('terms.article.11.list.3') }}</li>
                                </ol>

                                <h2>{{ $t('terms.article.12.title') }}</h2>
                                <ol>
                                    <li>{{ $t('terms.article.12.list.1') }}</li>
                                    <li>{{ $t('terms.article.12.list.2') }}</li>
                                    <li>{{ $t('terms.article.12.list.3') }}</li>
                                    <li>{{ $t('terms.article.12.list.4') }}</li>
                                    <li>{{ $t('terms.article.12.list.5') }}</li>
                                    <li>{{ $t('terms.article.12.list.6') }}</li>
                                </ol>

                                <h2>{{ $t('terms.article.13.title') }}</h2>
                                <ol>
                                    <li>{{ $t('terms.article.13.list.1') }}</li>
                                    <li>{{ $t('terms.article.13.list.2') }}</li>
                                    <li>{{ $t('terms.article.13.list.3.0') }}
                                        <ol><li>{{ $t('terms.article.13.list.3.1') }}</li>
                                        <li>{{ $t('terms.article.13.list.3.2') }}</li>
                                        <li>{{ $t('terms.article.13.list.3.3') }}</li>
                                        <li>{{ $t('terms.article.13.list.3.4') }}</li>
                                        <li>{{ $t('terms.article.13.list.3.5') }}</li>
                                        <li>{{ $t('terms.article.13.list.3.6') }}</li>
                                        </ol>
                                    </li>
                                    <li>{{ $t('terms.article.13.list.4') }}</li>
                                    <li>{{ $t('terms.article.13.list.5') }}</li>
                                    <li>{{ $t('terms.article.13.list.6') }}</li>
                                </ol>

                                <h2>{{ $t('terms.article.14.title') }}</h2>
                                <ol>
                                    <li>{{ $t('terms.article.14.list.1') }}</li>
                                    <li>{{ $t('terms.article.14.list.2') }}</li>
                                    <li>{{ $t('terms.article.14.list.3') }}</li>
                                </ol>

                                <h2>{{ $t('terms.article.15.title') }}</h2>
                                <ol>
                                    <li>{{ $t('terms.article.15.list.1') }}</li>
                                    <li>{{ $t('terms.article.15.list.2') }}</li>
                                    <li>{{ $t('terms.article.15.list.3') }}</li>
                                    <li>{{ $t('terms.article.15.list.4') }}</li>
                                    <li>{{ $t('terms.article.15.list.5') }}
                                    </li>
                                    <li>{{ $t('terms.article.15.list.6') }}</li>
                                </ol>

                                <h2>{{ $t('terms.article.16.title') }}</h2>
                                <ol>
                                    <li>{{ $t('terms.article.16.list.1') }}</li>
                                    <li>{{ $t('terms.article.16.list.2') }}</li>
                                    <li>{{ $t('terms.article.16.list.3') }}</li>
                                    <li>{{ $t('terms.article.16.list.4') }}</li>
                                    <li>{{ $t('terms.article.16.list.5') }}</li>
                                    <li>{{ $t('terms.article.16.list.6') }}</li>
                                    <li>{{ $t('terms.article.16.list.7') }}</li>
                                    <li>{{ $t('terms.article.16.list.8') }}</li>
                                </ol>

                                <h2>{{ $t('terms.article.17.title') }}</h2>
                                <ol>
                                    <li>{{ $t('terms.article.17.list') }}</li>
                                </ol>

                                <h2>{{ $t('terms.article.18.title') }}</h2>
                                <ol>
                                    <li>{{ $t('terms.article.18.list') }}</li>
                                </ol>
                                <h2>{{ $t('terms.article.19.title') }}</h2>
                                <ol>
                                    <li>{{ $t('terms.article.19.list') }}</li>
                                </ol>

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
    margin-top: 15px;
    font-size: 2rem;
    color: #555;
}

ol {
    margin-left: 20px;
    margin-bottom: 1rem;
}

ol li {
    margin-bottom: 0.5rem;
    line-height: 1.6;
    color: #444;
}
@media screen and (max-width: 767px) {
    h1 {
        margin-top: 20px;
    }
}
</style>
