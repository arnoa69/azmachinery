<script setup>
import { Inertia } from '@inertiajs/inertia';
import { ref, computed } from 'vue';
import { useI18n } from 'vue-i18n';

const { locale } = useI18n();

const contactMethod = ref('email');
const name = ref('');
const email = ref('');
const phone_number = ref('');
const company_name = ref('');
const message = ref(':azmch.we-contact-you:language:' + locale.value + ':product_name');

const props = defineProps({
    page_or_slug: {
        type: String,
    },
})

const isPhoneSelectedComputed = computed({
    get() {
        return contactMethod.value === 'phone'
    },
    set(value) {
        contactMethod.value = value ? 'phone' : 'email'
    }
})


const submitForm = () => {
    const formData = new FormData();

    formData.append('name', name.value);
    formData.append('email', email.value);
    formData.append('company_name', company_name.value);
    formData.append('phone_number', phone_number.value);
    formData.append('message','azmch.we-contact-you:' + props.page_or_slug);
    formData.append('locale', locale.value);
    formData.append('source', 'azmch.we-contact-you:' + props.page_or_slug);
    // const formDataJSON = JSON.stringify([...formData.entries()], (key, value) => {
    //     if (value instanceof File) {
    //         return 'File(' + value.name + ')';
    //     }
    //     return value;
    // }, 2);
    // console.log(formDataJSON);
    Inertia.post('/client-request', formData);
};
</script>

<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="flex-grow-1 card-title">
                <h2>{{ $t('contact.helpbox.title') }}</h2>
                <p>{{ $t('contact.helpbox.subTitle') }}</p>
            </div>
        </div>
        <div class="card-body">
            <form @submit.prevent="submitForm">
            <div>
                <i class="bi bi-headset help-icon"></i>
                <label class="me-2">{{ $t('contact.helpbox.preferedContact') }}</label>
            </div>
                <div class="row">
                    <div class="col-12">
                        <span class="label-mail-phone" :class="{ 'active-email': contactMethod === 'email' }" @click="contactMethod = 'email'">
                        <i class="bi bi-envelope-at-fill"></i> {{ $t('contact.form.label.email') }}
                    </span>
                    <label class="toggle-switch">
                        <input type="checkbox" v-model="isPhoneSelectedComputed">
                        <span class="toggle-slider"></span>
                    </label>
                    <span class="label-mail-phone" :class="{ 'active-phone': contactMethod === 'phone' }" @click="contactMethod = 'phone'">
                        <i class="bi bi-telephone-fill"></i> {{ $t('contact.form.label.phone') }}
                    </span>
                    </div>
                    <div class="col-12 mt-3">
                        <div v-if="contactMethod === 'email'">
                        <input type="email" class="mt-1 form-control" v-model="email" :placeholder="$t('contact.form.placeholder.email')">
                    </div>
                    <div v-else-if="contactMethod === 'phone'">
                        <input type="tel" class="mt-1 form-control" v-model="phone_number"
                            :placeholder="$t('contact.form.placeholder.phone')">
                    </div>
                    </div>
                    <div class="col-12 mt-3">
                        <input type="text" class="form-control" id="company_name" v-model="company_name"
                        :placeholder="$t('contact.form.placeholder.company')">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <button class="submit-button" type="submit">{{ $t('products.details.sidebar.submit_button') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>
.about .content p {
    margin-bottom: 10px;
}
.card {
  border: none;
  border-radius: 20px;
  box-shadow: 0 0 10px rgba(109, 11, 11, 0.3);
  min-height: 400px;
}

.card-header {
  background-color: #161519;
  color: #FFFFFF;
  border-radius: 20px 20px 0 0;
  padding: 10px 20px;
  position: relative;
  background-image: linear-gradient(to bottom, #424242, #161519);
  background-size: 100% 100%;
}

.card-title h2 {
  font-size: 24px;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Textschatten hinzufügen */
  margin-left: 5px;
  font-weight: bold;
}

.card-title p {
  font-size: 16px;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5); /* Textschatten hinzufügen */
  margin-left: 5px;
  font-weight: 200;
}

.me-2 {
    margin-bottom: 15px;
    margin-left: 5px;
}

.label-mail-phone {
    cursor: pointer;
    font-size: 16px;
    color: #999;
    margin-left: 5px;
}

.card-header .fw-bold {
  font-size: 24px;
  font-weight: bold;
  color: #FFFFFF;
}

.card-header .description {
  font-size: 18px;
  font-weight: normal;
  color: #FFFFFF;
  position: absolute;
  top: 20px;
  right: 20px;
  background-color: #FF3737;
  padding: 5px 10px;
  border-radius: 10px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.card-body {
  background-color: #FFFFFF;
  border-radius: 0 0 20px 20px;
  padding: 20px;
  margin-top: 5px;
}

.card-body label {
  font-size: 14px;
  color: #666666;
}

.card-body input[type="checkbox"] {
  margin-right: 10px;
}

.card-body label img {
  width: 20px;
  height: 20px;
  margin-right: 10px;
  border-radius: 50%;
}

/* add a dummy picture to the checkbox label */
.card-body label img.dummy-picture {
  background-color: #CCCCCC;
  border: none;
  padding: 5px;
}
.form-container {
    background-color: #FF3737; /* Red background same as PriceCalculator */
    color: #FFFFFF; /* White text for better contrast */
    padding: 20px;
    border-radius: 20px; /* Same border-radius as PriceCalculator */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Same shadow as PriceCalculator */
    min-width: 370px; /* Set minimum width to match PriceCalculator */
    min-height: 400px; /* Set minimum height to match PriceCalculator */
}

.form-container h2 {
    margin-bottom: 20px;
    font-size: 24px; /* Same font size as in PriceCalculator */
    color: #FFFFFF; /* Ensure the header text is white */
}

.form-container label {
    font-size: 14px; /* Match the label size */
    color: #FFFFFF; /* White text for contrast */
    font-weight: bold;
}

.form-container .bi {
    font-size: 1.2rem;
    margin-right: 5px;
    vertical-align: middle;
    color: #FFFFFF; /* Icon color white for consistency */
}

.help-icon {
    font-size: 18px;
    color: #151313; /* Ensure the help icon matches the color scheme */
    margin-left: 5px;
}

.submit-button {
    margin-top: 15px;
    width: 100%;
    border: none;
    height: 35px;
    background-color: #BC0C26; /* Button background same as container */
    color: #FFFFFF; /* Button text white */
    border-radius: 10px;
}

.active-email {
    color: #333;
    font-weight: bold;
}

.active-phone {
    color: #333;
    font-weight: bold;
}

.toggle-switch input {
    opacity: 0;
    width: 0;
    height: 0;
    position: absolute;
}

.toggle-switch {
    position: relative;
    display: inline-block;
    width: 40px;
    height: 20px;
    margin: 0 20px;
}

.toggle-slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgb(7, 6, 6);
    transition: 0.4s;
    border-radius: 20px;
}

.toggle-slider::before {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    left: 2px;
    bottom: 2px;
    background-color: rgb(214, 201, 201);
    transition: 0.4s;
    border-radius: 50%;
}

.toggle-switch input:checked+.toggle-slider::before {
    transform: translateX(20px);
}

</style>
