<script setup>
import ContactFormLayout from '@/Layouts/ContactFormLayout.vue';
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { useI18n } from 'vue-i18n';

const { locale } = useI18n();

const name = ref('');
const email = ref('');
const company_name = ref('');
const phone_number = ref('');
const message = ref('');
const source = ref('');

const submitForm = () => {
    const formData = new FormData();

    formData.append('name', name.value);
    formData.append('email', email.value);
    formData.append('company_name', company_name.value);
    formData.append('phone_number', phone_number.value);
    formData.append('message', message.value);
    formData.append('locale', locale.value);
    formData.append('source', 'azm:ch.contact.form');

    Inertia.post('/client-request', formData);
}
</script>

<template>
    <div>
        <ContactFormLayout>
            <!-- Contact Section -->
            <section id="contact" class="contact section">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>{{ $t('contact.title') }}</h2>
                    <p>{{ $t('contact.subTitle') }}</p>
                </div><!-- End Section Title -->

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row gy-4">
                        <div class="col-lg-6 ">
                            <div class="row gy-4">

                                <div class="col-lg-12">
                                    <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                        data-aos="fade-up" data-aos-delay="200">
                                        <i class="bi bi-geo-alt"></i>
                                        <h3>{{ $t('contact.label.place') }}</h3>
                                        <p>Pratteln, Switzerland</p>
                                    </div>
                                </div><!-- End Info Item -->

                                <div class="col-md-6">
                                    <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                        data-aos="fade-up" data-aos-delay="300">
                                        <i class="bi bi-telephone"></i>
                                        <h3>{{ $t('contact.label.phone') }}</h3>
                                        <p>+41 (0)61 514 88 88</p>
                                    </div>
                                </div><!-- End Info Item -->

                                <div class="col-md-6">
                                    <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                        data-aos="fade-up" data-aos-delay="400">
                                        <i class="bi bi-envelope"></i>
                                        <h3>{{ $t('contact.label.email') }}</h3>
                                        <p><a href="mailto:alexander.arnold@az-machinery.ch" target="_blank">Sales
                                                representative</a></p>
                                    </div>
                                </div><!-- End Info Item -->

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <form @submit.prevent="submitForm" method="post" class="php-email-form" data-aos="fade-up"
                                data-aos-delay="500">
                                <div class="row gy-4">

                                    <div class="col-md-6">
                                        <select name="inquiry_type" class="form-control select" id="inquiry_type">
                                            <option value="">Please select an inquiry type</option>
                                            <option value="specific_needs">Specific needs?</option>
                                            <option value="custom_manufacturing">Special, custom manufacturing?</option>
                                            <option value="transport_quote">Transport quote?</option>
                                            <option value="financing">Do you need financing?</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control"
                                            :placeholder="$t('contact.form.placeholder.name')" required="">
                                    </div>

                                    <div class="col-md-12 ">
                                        <input type="email" class="form-control" name="email"
                                            :placeholder="$t('contact.form.placeholder.email')" required="">
                                    </div>

                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="subject"
                                            :placeholder="$t('contact.form.placeholder.phone')" required="">
                                    </div>

                                    <div class="col-md-12">
                                        <textarea class="form-control" name="message" rows="4"
                                            :placeholder="$t('contact.form.placeholder.message')"
                                            required=""></textarea>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <div class="loading">Loading</div>
                                        <div class="error-message">Error</div>
                                        <div class="sent-message">Your message has been sent. Thank you!</div>

                                        <button type="submit">{{ $t('contact.form.placeholder.send') }}</button>
                                    </div>

                                </div>
                            </form>
                        </div><!-- End Contact Form -->

                    </div>

                </div>

            </section><!-- /Contact Section -->

        </ContactFormLayout>
    </div>
</template>

<style scoped>
.custom {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-color: #f8f9fa;
    border: 1px solid #ced4da;
    border-radius: 4px;
    color: #495057;
    cursor: pointer;
    font-size: 13px;
    height: 50px;
    line-height: 1.5;
    padding: 10px 36px 10px 12px;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    width: 100%;
}

@media screen and (max-width: 767px) {
    .select {
        font-size: 16px !important;
        /* Increase base font size for better readability */
        width: 100%;
    }

    .select option {
        font-size: 36px !important;
        padding: 12px;
        width: 100% !important;
    }

    /* Styles for the dropdown when it's open */
    .select:focus {
        font-size: 16px;
    }

    /* Custom styles for iOS devices */
    @supports (-webkit-touch-callout: none) {
        .select {
            font-size: 16px;
        }

        .select option {
            font-size: 36px !important;
        }
    }
}

.select:focus {
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.fselect:hover {
    border-color: #80bdff;
}

/* Custom arrow */
.select {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23343a40' d='M10.293 3.293 6 7.586 1.707 3.293A1 1 0 0 0 .293 4.707l5 5a1 1 0 0 0 1.414 0l5-5a1 1 0 1 0-1.414-1.414z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 12px center;
    background-size: 12px;
}

/* Remove default arrow in IE */
.select::-ms-expand {
    display: none;
}

/* Optional: Style for when an option is selected */
.select option:checked {
    background-color: #007bff;
    color: white;
}

a {
    text-decoration: none;
    color: red;
}

.contact .info-item {
    background-color: var(--surface-color);
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    padding: 24px 0 30px 0;
}

.contact .info-item i {
    font-size: 20px;
    color: var(--accent-color);
    width: 56px;
    height: 56px;
    font-size: 24px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 4px;
    transition: all 0.3s ease-in-out;
    border-radius: 50%;
    border: 2px dotted color-mix(in srgb, var(--accent-color), transparent 40%);
}

.contact .info-item h3 {
    font-size: 20px;
    color: color-mix(in srgb, var(--default-color), transparent 20%);
    font-size: 18px;
    font-weight: 700;
    margin: 10px 0;
}

.contact .info-item p {
    padding: 0;
    margin-bottom: 0;
    font-size: 14px;
}

.contact .php-email-form {
    background-color: var(--surface-color);
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    height: 100%;
    padding: 30px;
}

@media (max-width: 575px) {
    .contact .php-email-form {
        padding: 20px;
    }
}

.contact .php-email-form input[type=text],
.contact .php-email-form input[type=email],
.contact .php-email-form textarea {
    font-size: 14px;
    padding: 10px 15px;
    box-shadow: none;
    border-radius: 0;
    color: var(--default-color);
    background-color: var(--surface-color);
    border-color: color-mix(in srgb, var(--default-color), transparent 80%);
}

.contact .php-email-form input[type=text]:focus,
.contact .php-email-form input[type=email]:focus,
.contact .php-email-form textarea:focus {
    border-color: var(--accent-color);
}

.contact .php-email-form input[type=text]::placeholder,
.contact .php-email-form input[type=email]::placeholder,
.contact .php-email-form textarea::placeholder {
    color: color-mix(in srgb, var(--default-color), transparent 70%);
}

.contact .php-email-form button[type=submit] {
    color: var(--contrast-color);
    background: var(--accent-color);
    border: 0;
    padding: 10px 30px;
    transition: 0.4s;
    border-radius: 50px;
}

.contact .php-email-form button[type=submit]:hover {
    background: color-mix(in srgb, var(--accent-color), transparent 20%);
}
</style>
