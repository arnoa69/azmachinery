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

        </LegalLayout>
    </div>
</template>

<style scoped></style>
