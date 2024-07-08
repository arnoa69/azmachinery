<script setup>
import { Inertia } from '@inertiajs/inertia';
import { ref } from 'vue';
import { useI18n } from 'vue-i18n';

const { locale } = useI18n();

const props = defineProps({
    product_code: {
        type: String,
    },
})

const name = ref('');
const email = ref('');
const company_name = ref('');
const phone_number = ref('');

const message = ref(':layout1.we-call-you:language:' + locale.value + ':product_name');

const submitForm = () => {
    const formData = new FormData();

    formData.append('name', name.value);
    formData.append('email', email.value);
    formData.append('company_name', company_name.value);
    formData.append('phone_number', phone_number.value);
    formData.append('message', message.value);
    formData.append('locale', locale.value);
    formData.append('source', 'layout1.we-call-you:' + props.product_code);

    Inertia.post('/client-request', formData);
};
</script>

<template>
    <div class="help-box d-flex flex-column justify-content-center align-items-center">
        <i class="bi bi-headset help-icon"></i>
        <h4>{{ $t("products.details.sidebar.have_a_question") }}</h4>
        <p class="d-flex align-items-center mt-2 mb-0 px-4">
            <span>{{ $t("products.details.sidebar.we_call_you") }}</span>
        </p>
        <form action="" @submit.prevent="submitForm" class="pds_phone">
            <div class="mt-5 mt-md-0">
                <input
                    type="text"
                    class="form-control"
                    v-model="phone_number"
                    maxlength="9"
                    id="pds_phone"
                    :placeholder="$t('products.details.sidebar.your_phone')"
                    required
                    autocomplete="tel"
                >
                <input type="text" class=" mt-1 form-control" v-model="company_name" id="company_name" :placeholder="$t('contact.form.placeholder.company')" required>
                <input type="text" v-model="name" class="mt-1 form-control" id="name" :placeholder="$t('contact.form.placeholder.name')" required>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    {{ $t('products.details.sidebar.policy') }}
                </label>
            </div>
            <div class="text-center"><button class="submit-button" type="submit">{{
            $t('products.details.sidebar.submit_button') }}</button></div>
        </form>
    </div>
</template>

<style scoped>
.pds_phone {
    width: 100%;
    padding-left: 15px;
    padding-right: 15px;
    margin-top: -20px;
}

.submit-button {
    margin-top: 15px;
    width: 100%;
    border: none;
    height: 35px;
}

.form-check-label {
    font-size: 12px;
}

.form-check {
    margin-top: 10px;
}

.service-details .help-box .help-icon {
    font-size: 48px;
}
</style>
