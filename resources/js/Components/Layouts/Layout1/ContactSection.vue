<script setup>
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
    formData.append('source', 'layout1.contact.form');

    Inertia.post('/client-request', formData);
}
</script>


<template>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>{{ $t('contact.title') }}</h2>
          <p>{{ $t('contact.subTitle') }}</p>
        </div>
        <div class="row">
          <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>{{ $t('contact.label.place') }}</h4>
                <p>{{ $t('contact.address') }}</p>
              </div>
              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>{{ $t('contact.label.email') }}</h4>
                <p><a href="mailto:contacto@rampas-carga-moviles.es">{{ $t('contact.email') }}</a></p>
              </div>
              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>{{ $t('contact.label.phone') }}</h4>
                <p>{{ $t('contact.number') }}</p>
              </div>
            </div>
          </div>
          <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">
            <form action="" @submit.prevent="submitForm" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" v-model="name" class="form-control" id="name" :placeholder="$t('contact.form.placeholder.name')" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" v-model="company_name" id="company_name" :placeholder="$t('contact.form.placeholder.company')" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" v-model="email" id="email" :placeholder="$t('contact.form.placeholder.email')" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" v-model="phone_number" id="phone_number" :placeholder="$t('contact.form.placeholder.phone')" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" v-model="message" name="message" rows="5" :placeholder="$t('contact.form.placeholder.message')" required></textarea>
              </div>
              <div class="text-center"><button type="submit">{{ $t('contact.form.placeholder.send') }}</button></div>
            </form>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->
</template>

