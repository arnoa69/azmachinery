<script setup>
//import HeaderSection from "../Shared/Frontend/Products/HeaderSection.vue";
import HeaderSection from '@/Components/Layouts/Layout1/HeaderSection.vue';
import HeroSection from "../Shared/Frontend/Products/HeroSection.vue";
//import FooterSection from "../Shared/Frontend/Products/FooterSection.vue";
import FooterSection from '@/Components/Layouts/Layout1/FooterSection.vue';
import { ref } from 'vue'

const imagePath = ref('/../../../img/header/bg-header-products2.jpg');
const backgroundStyle = ref({
  backgroundImage: `url(${imagePath.value})`
});
</script>


<template>
    <HeaderSection />
    <!-- Page Title -->
    <div class="page-title dark-background" :style="backgroundStyle">
      <div class="container position-relative">
        <h1>{{ $t('products.details.sidebar.category_list') }}</h1>
      </div>
    </div><!-- End Page Title -->
    <main id="main">
        <slot />
    </main>
    <FooterSection />
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</template>

<style scoped>
    #main {
        margin: auto;
        width: 100%;
        padding: 10px;
    }
</style>
