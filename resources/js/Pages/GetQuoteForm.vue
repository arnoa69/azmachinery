<script setup>
import GetQuoteLayout from '@/Layouts/GetQuoteLayout.vue';
import { ref, onMounted } from 'vue'
import { useI18n } from 'vue-i18n';
import { Inertia } from '@inertiajs/inertia';
import { posthogModule } from '@/plugins/posthog';
import { hasConsentBeenGiven } from '@/services/cookieConsentService';
import CookieBanner from '@/Shared/Cookiebanner/CookieBanner.vue';
import ManageCookieBanner from '@/Shared/Cookiebanner/ManageCookieBanner.vue';
import PolicyBanner from '@/Shared/Cookiebanner/PolicyBanner.vue';

const { locale } = useI18n();
const showBanner = ref(true);
const showConfigBanner = ref(false)
const showPolicyBanner = ref(false)

onMounted(() => {
    showBanner.value = !hasConsentBeenGiven();
    posthogModule.posthog // Initialize PostHog
});

const name = ref('');
const email = ref('');
const company_name = ref('');
const phone_number = ref('');
const message = ref('');

const submitForm = () => {
    const formData = new FormData();

    formData.append('name', name.value);
    formData.append('email', email.value);
    formData.append('company_name', company_name.value);
    formData.append('phone_number', phone_number.value);
    formData.append('message', 'locale:' + locale.value + ';contact.form' + ';Client-Message: ' + message.value);
    formData.append('locale', locale.value);
    formData.append('source', 'azm:ch.get.quote.form');

    Inertia.post('/client-request', formData);
}

const imagePath = ref('/../../../img/quote-bg.jpg');
const backgroundStyle = ref({
    backgroundImage: `url(${imagePath.value})`
});
</script>

<template>
    <GetQuoteLayout>
        <!-- Get A Quote Section -->
        <section id="get-a-quote" class="get-a-quote section">

            <div class="container">

                <div class="row g-0" data-aos="fade-up" data-aos-delay="100">

                    <div class="col-lg-5 quote-bg d-none d-md-block" :style="backgroundStyle"></div>

                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
                        <form @submit.prevent="submitForm" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="500">
                            <div class="row gy-4">

                                <h3>{{ $t('contact.form.get-a-quote.title') }}</h3>
                                <p>{{ $t('contact.form.get-a-quote.subTitle') }}</p>

                                <div class="col-lg-12">
                                    <h4>{{ $t('contact.form.get-a-quote.details-title') }}</h4>
                                </div>

                                <div class="col-12">
                                    <input type="text" name="name" v-model="name" class="form-control"
                                        :placeholder="$t('contact.form.get-a-quote.placeholder.name')" required="">
                                </div>

                                <div class="col-12">
                                    <input type="text" name="company_name" v-model="company_name" class="form-control"
                                        :placeholder="$t('contact.form.get-a-quote.placeholder.company')" required="">
                                </div>

                                <div class="col-12 ">
                                    <input type="email" v-model="email" class="form-control" name="email"
                                        :placeholder="$t('contact.form.get-a-quote.placeholder.email')" required="">
                                </div>

                                <div class="col-12">
                                    <input type="text" v-model="phone_number" class="form-control" name="phone"
                                        :placeholder="$t('contact.form.get-a-quote.placeholder.phone')" required="">
                                </div>

                                <div class="col-12">
                                    <textarea class="form-control" v-model="message" name="message" rows="6"
                                        :placeholder="$t('contact.form.get-a-quote.placeholder.message')"
                                        required=""></textarea>
                                </div>

                                <div class="col-12 text-center">
                                    <div class="loading">{{ $t('contact.form.loading') }}</div>
                                    <div class="error-message">{{ $t('contact.form.error') }}</div>
                                    <div class="sent-message">{{ $t('contact.form.success-send') }}</div>

                                    <button type="submit">{{ $t('contact.form.get-a-quote.title') }}</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Quote Form -->
                </div>

            </div>

        </section><!-- /Get A Quote Section -->
        <CookieBanner v-if="showBanner" @hideBanner="showBanner = false" @showManageBanner="showConfigBanner = true"
        @showPolicyBanner="showPolicyBanner = true" />

    <ManageCookieBanner v-if="showConfigBanner" @hideConfigBanner="showConfigBanner = false"
        @hideBothBanner="showBanner = false, showConfigBanner = false" />

    <PolicyBanner v-if="showPolicyBanner" @hide-policy-banner="showPolicyBanner = false" />
    </GetQuoteLayout>
</template>

<style scoped>
/*--------------------------------------------------------------
# Get A Quote Section
--------------------------------------------------------------*/
.get-a-quote .quote-bg {
    min-height: 500px;
    background-size: cover;
    background-position: center;
}

.get-a-quote .php-email-form {
    background: color-mix(in srgb, var(--default-color), transparent 97%);
    padding: 30px;
    height: 100%;
}

@media (max-width: 575px) {
    .get-a-quote .php-email-form {
        padding: 20px;
    }
}

.get-a-quote .php-email-form h3 {
    font-size: 14px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.get-a-quote .php-email-form h4 {
    font-size: 14px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin: 20px 0 0 0;
}

.get-a-quote .php-email-form p {
    font-size: 14px;
    margin-bottom: 20px;
}

.get-a-quote .php-email-form input[type=text],
.get-a-quote .php-email-form input[type=email],
.get-a-quote .php-email-form textarea {
    font-size: 14px;
    padding: 10px 15px;
    box-shadow: none;
    border-radius: 0;
    color: var(--default-color);
    background-color: color-mix(in srgb, var(--background-color), transparent 20%);
    border-color: color-mix(in srgb, var(--default-color), transparent 80%);
}

.get-a-quote .php-email-form input[type=text]:focus,
.get-a-quote .php-email-form input[type=email]:focus,
.get-a-quote .php-email-form textarea:focus {
    border-color: var(--accent-color);
}

.get-a-quote .php-email-form input[type=text]::placeholder,
.get-a-quote .php-email-form input[type=email]::placeholder,
.get-a-quote .php-email-form textarea::placeholder {
    color: color-mix(in srgb, var(--default-color), transparent 70%);
}

.get-a-quote .php-email-form button[type=submit] {
    color: var(--contrast-color);
    background: var(--accent-color);
    border: 0;
    padding: 10px 30px;
    transition: 0.4s;
    border-radius: 4px;
}

.get-a-quote .php-email-form button[type=submit]:hover {
    background: color-mix(in srgb, var(--accent-color), transparent 20%);
}
</style>
