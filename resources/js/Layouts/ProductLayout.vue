<script setup>
//import HeaderSection from "../Shared/Frontend/Products/HeaderSection.vue";
import HeaderSection from '@/Components/Layouts/Layout1/HeaderSection.vue';
import HeroSection from "../Shared/Frontend/Products/HeroSection.vue";
//import FooterSection from "../Shared/Frontend/Products/FooterSection.vue";
import FooterSection from '@/Components/Layouts/Layout1/FooterSection.vue';
</script>


<template>
    <HeaderSection />
    <HeroSection />
    <main id="main">
        <slot />
    </main>
    <FooterSection />
</template>

<style scoped>
    #main {
        margin: auto;
        width: 100%;
        padding: 10px;
    }
</style>
