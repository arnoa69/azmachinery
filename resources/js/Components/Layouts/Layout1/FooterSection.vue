<script setup>
import { useI18n } from "vue-i18n";
import { Inertia } from '@inertiajs/inertia';
import { ref } from "vue";

const { locale, t } = useI18n();

const addressHtml = t('footer.headquarter.address.street') + "<br>" + t('footer.headquarter.address.zip') + "<br>" + t('footer.headquarter.address.country') + "<br><br><strong>" + t('footer.headquarter.address.phoneLabel') + "</strong>" + t('footer.headquarter.address.phone') + "<br><strong>" + t('footer.headquarter.address.emailLabel') + "</strong>" + "<a href=\"mailto:contact@az-machinery.com\">" + t('footer.headquarter.address.email') + "</a>" + "<br>"
const copyRightHtml = t('footer.copyright')
const subscribeButton = t('footer.newsletter.button')

const email = ref('');
const submitForm = () => {
    const formData = new FormData();

    formData.append('email', email.value);
    formData.append('locale', locale.value);
    formData.append('source', 'layout1.newsletter');

    Inertia.post('/client-request', formData);
}

</script>

<template>
    <footer id="footer" class="footer dark-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-12 footer-about">
                    <h3>{{ t('footer.headquarter.name') }}</h3>
                    <p class="pb-3"><em>{{ t('footer.headquarter.description') }}</em></p>
                    <div class="social-links d-flex mt-4">
                        <a href="https://twitter.com/JeromeGuiguet/status/1193134166176649216" _target="_blank"><i
                                class="bi bi-twitter-x"></i></a>
                        <a href="https://www.facebook.com/azmachineryfrance/" _target="_blank"><i
                                class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/azmachinery/" _target="_blank"><i
                                class="bi bi-instagram"></i></a>
                        <a href="https://ar.pinterest.com/jerome_guiguet/" target="_blank" class="pinterest"><i
                                class="bi bi-pinterest"></i></a>
                        <a href="https://www.linkedin.com/company/azmachinery" _target="_blank"><i
                                class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6 footer-links">
                    <h4>{{ t('footer.service.title') }}</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> {{ t('footer.service.customMade') }}</li>
                        <li><i class="bi bi-chevron-right"></i> {{ t('footer.service.delivery') }}</li>
                        <li><i class="bi bi-chevron-right"></i> {{ t('footer.service.production') }}</li>
                        <li><i class="bi bi-chevron-right"></i> {{ t('footer.service.warranty') }}</li>
                        <!-- <li><i class="bx bx-chevron-right"></i> {{ t('footer.service.rental') }}</li> -->
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>{{ t('footer.links.title') }}</h4>
                    <ul>
                        <li><a :href="`/${locale}/imprint`" target="_blank">{{ $t("footer.links.imprint") }}</a></li>
                        <li><a :href="`/${locale}/cookie-policy`" class="policy-link" target="_blank">{{ $t("footer.links.cookie-policy") }}</a></li>
                        <li><a :href="`/${locale}/privacy-policy`" class="policy-link" target="_blank">{{ $t("footer.links.privacy-policy") }}</a></li>
                        <li><a :href="`/${locale}/terms-and-conditions`" class="policy-link" target="_blank">{{ $t("footer.links.terms-and-conditions") }}</a></li>
                    </ul>
                </div>


                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4><span>{{ t('footer.headquarter.title') }}</span></h4>
                    <p v-html="addressHtml"></p>
                </div>

            </div>
        </div>

        <div class="container text-center mt-4">
            <div class="copyright" v-html="copyRightHtml"></div>
        </div>

    </footer>
</template>
