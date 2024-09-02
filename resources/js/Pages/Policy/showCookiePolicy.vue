<script setup>
import LegalLayout from '@/Layouts/LegalLayout.vue';
import HelpSidebar from "@/Components/Layouts/Layout1/Sidebar/HelpSidebar.vue";
import { useI18n } from 'vue-i18n';

const { locale } = useI18n();
</script>

<template>
    <div>
        <LegalLayout title="cookie policy">
            <section id="page-title" class="about">
                <div class="container">
                    <div class="section-title">
                        <h1>{{ $t("products.list.title") }}</h1>
                        <h2>{{ $t("products.details.title") }}</h2>
                    </div>
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
                                lklkhkh

                            </div> <!-- END container -->
                        </div> <!-- END RIGHT SIDBAR -->
                    </div> <!-- END row -->
                </div> <!-- END Container -->
            </section>

        </LegalLayout>
    </div>
</template>

<style scoped></style>
