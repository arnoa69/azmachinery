<script setup>
import HeaderSection from '@/Components/Layouts/Layout1/HeaderSection.vue';
import FooterSection from '@/Components/Layouts/Layout1/FooterSection.vue';
import { ref } from 'vue'

const imagePath = ref('/../../../img/header/bg-header-policies.jpg');
const backgroundStyle = ref({
  backgroundImage: `url(${imagePath.value})`
});

const props = defineProps({
  title: String, // Define the title prop
});
</script>


<template>
    <HeaderSection />
    <!-- Page Title -->
    <div class="page-title dark-background" :style="backgroundStyle">
      <div class="container position-relative">
        <h1>{{ props.title }}</h1>
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
