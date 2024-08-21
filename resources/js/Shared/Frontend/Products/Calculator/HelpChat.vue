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
    <div class="container">
        <form action="" @submit.prevent="submitForm" class="pds_phone">
            AI CHAT HELP
        </form>
    </div>

</template>

<style scoped>
.form-container {
    background-color: #cc0926;
    /* Red background */
    color: #ffffff;
    /* White font */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    min-width: 370px;
}

.form-container h2 {
    margin-bottom: 20px;
}

.form-container label {
    font-weight: bold;
}

.form-container .bi {
    font-size: 1.2rem;
    margin-right: 5px;
    vertical-align: middle;
}

.help-icon {
    font-size: 48px;
}

.active-email {
    color: #2e2903;
    font-weight: bold;
}

.active-phone {
    color: #2e2903;
    font-weight: bold;
}

.toggle-container {
    display: inline-block;
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
    background-color: white;
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
    background-color: red;
    transition: 0.4s;
    border-radius: 50%;
}

.toggle-switch input:checked+.toggle-slider::before {
    transform: translateX(20px);
}

.submit-button {
    margin-top: 15px;
    width: 100%;
    border: none;
    height: 35px;
}
</style>
